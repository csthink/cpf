<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:18 PM
 */

namespace framework;

/**
 * @method static CPFRouter get(string $route, Callable $callback)
 * @method static CPFRouter post(string $route, Callable $callback)
 * @method static CPFRouter put(string $route, Callable $callback)
 * @method static CPFRouter delete(string $route, Callable $callback)
 * @method static CPFRouter options(string $route, Callable $callback)
 * @method static CPFRouter head(string $route, Callable $callback)
 */
class Router
{
    public static $routeList = array();
    public static $requestMethods = array();
    public static $callbacks = array();
    public static $errorCallback;

    public static $controller = null;
    public static $action = null;

    public static function __callStatic($name, $arguments)
    {
        $uri = strpos($arguments[0], '/') === 0 ? $arguments[0] : '/' . $arguments[0]; // URI 名
        $callback = $arguments[1]; // 回调规则

        array_push(self::$routeList, $uri);
        array_push(self::$requestMethods, strtoupper($name));
        array_push(self::$callbacks, $callback);
    }

    public static function error($callback)
    {
        self::$errorCallback = $callback;
    }

    public function dispatch(\CPF $cpf)
    {
        // 获取当前URI
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        // 获取当前请求类型
        $method = $_SERVER['REQUEST_METHOD'];

        // 检查路由配置中已有配置
        if (in_array($uri, self::$routeList)) { // 路由已配置
            // 获取匹配的所有路由
            $hitRoutes = array_keys(self::$routeList, $uri);
            foreach ($hitRoutes as $routeName) {
                if ($method == self::$requestMethods[$routeName]) {
                    $rules = self::$callbacks[$routeName]; // 回调规则
                    if (is_object($rules)) { // 如果使用的闭包函数，则直接执行闭包
                        call_user_func($rules);
                    } else { // 解析出控制器和方法
                        $data = explode('@', $rules);
                        self::$controller = $data[0];
                        self::$action = $data[1];
                    }
                }
            }
        }

        if ((null != self::$controller) && (null != self::$action)) {
            $controller = new self::$controller($cpf);
            $controller->{self::$action}();
        } else {
            if (!self::$errorCallback) { // 未设置错误页面
                header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
                echo '404';
            } else { // 设置了错误页面
                if (is_object(self::$errorCallback)) {
                    call_user_func(self::$errorCallback);
                } else {
                    self::get($_SERVER['REQUEST_URI'], self::$errorCallback);
                    self::$errorCallback = null;
                    self::dispatch();
                    return;
                }
            }
        }
    }
}
