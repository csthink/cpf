<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:18 PM
 */

use CPF\Router;

final class CPF
{
    CONST VERSION = '1.0.20171216';

    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new CPF();
        }

        return self::$instance;
    }

    public static function run()
    {
        $router_file = MODULE_PATH . 'config/Router.php';
        if (is_file($router_file)) {
            /** @noinspection PhpIncludeInspection */
            // 加载模块的路由规则
            include $router_file;
        }

        Router::dispatch();
    }
}
