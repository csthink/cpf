<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:20 PM
 */

namespace framework;

class Request
{
    /**
     * 所有请求参数
     * @var array $parameter
     */
    private $requestParams = array();

    /**
     * GET 参数
     * @var array
     */
    private $getParams = array();

    /**
     * POST 参数
     * @var array
     */
    private $postParams = array();

    /**
     * $_SERVER 参数
     * @var array
     */
    private $serverParams = array();

    /**
     * 请求方法
     * @var string
     */
    private $method = '';

    /**
     * 请求模块
     * @var string
     */
    private $module = '';

    /**
     * 请求控制器
     * @var string
     */
    private $controller = '';

    /**
     * 请求操作
     * @var string
     */
    private $action = '';

    /**
     * 服务IP
     * @var string
     */
    private $serverIp = '';

    /**
     * 客户端IP
     * @var string
     */
    private $clientIp = '';

    /**
     * 请求开始时间
     * @var string
     */
    private $beginTime = '';

    /**
     * 请求结束时间
     * @var string
     */
    private $endTime = '';

    /**
     * 请求用时
     * @var string
     */
    private $usedTime = '';

    /**
     * 请求身份id
     * @var string
     */
    private $requestId = '';

    public function getMethod()
    {
        return $this->method;
    }

    public function __construct()
    {
        $this->serverParams = $_SERVER;
        $this->method = isset($_SERVER['REQUEST_METHOD']) ? strtolower($_SERVER['REQUEST_METHOD']) : 'get';
        $this->serverIp = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
        $this->clientIp = isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : '';
        $this->beginTime = isset($_SERVER['REQUEST_TIME_FLOAT']) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime(true);

        if (is_cli()) {
            $this->requestParams = isset($_REQUEST['argv']) ? $_REQUEST['argv'] : array();
            $this->getParams = isset($_REQUEST['argv']) ? $_REQUEST['argv'] : array();
            $this->postParams = isset($_REQUEST['argv']) ? $_REQUEST['argv'] : array();
        } else {
            $this->requestParams = $_REQUEST;
            $this->getParams = $_GET;
            $this->postParams = $_POST;
        }
    }

    /**
     * 判断是否是GET请求类型
     * @return bool
     */
    public function isGet()
    {
        return $this->getMethod() == 'GET';
    }

    /**
     * 判断是否是POST请求类型
     * @return bool
     */
    public function isPost()
    {
        return $this->getMethod() == 'POST';
    }

    /**
     * 获取全部cookie
     * @return mixed
     */
    public function cookies()
    {
        return $_COOKIE;
    }

    /**
     * 获取指定cookie
     * @param $name
     * @return mixed
     */
    public function cookie($name)
    {
        return $_COOKIE[$name];
    }

    /**
     * 获取GET参数，默认返回全部的GET参数，也可获取GET类型的指定参数值
     * @param string $name
     * @param string $default
     * @return array|string
     */
    public function get($name = '', $default = '')
    {
        if (!empty($name)) {
            if (!isset($this->getParams[$name])) {
                return '';
            }
            if (empty($this->getParams[$name])) {
                return $default;
            }

            return htmlspecialchars($this->getParams[$name]);
        }

        $result = $this->getParams;
        foreach ($result as &$v) {
            $v = htmlspecialchars($v);
        }

        return $result;
    }

    /**
     * 获取POST参数，默认返回全部的POST参数，也可获取POST类型的指定参数值
     * @param string $name
     * @param string $default
     * @return array|string
     */
    public function post($name = '', $default = '')
    {
        if (!empty($name)) {
            if (!isset($this->postParams[$name])) {
                return '';
            }
            if (empty($this->postParams[$name])) {
                return $default;
            }

            return htmlspecialchars($this->postParams[$name]);
        }

        $result = $this->postParams;
        foreach ($result as &$v) {
            $v = htmlspecialchars($v);
        }
        return $result;
    }

    /**
     * 获取REQUEST参数，默认返回全部的REQUEST参数，也可获取REQUEST类型的指定参数值
     * @param string $name
     * @param string $default
     * @return array|string
     */
    public function request($name = '', $default = '')
    {
        if (!empty($name)) {
            if (!isset($this->requestParams[$name])) {
                return '';
            }
            if (empty($this->requestParams[$name])) {
                return $default;
            }

            return htmlspecialchars($this->requestParams[$name]);
        }

        $result = $this->requestParams;
        foreach ($result as &$v) {
            $v = htmlspecialchars($v);
        }

        return $result;
    }

    /**
     * 获取所有参数
     * @return array
     */
    public function all()
    {
        $result = $this->requestParams;
        foreach ($result as &$v) {
            $v = htmlspecialchars($v);
        }

        return $result;
    }

    public function server($name = '')
    {
        if (!empty($name)) {
            if (isset($this->serverParams[$name])) {
                return $this->serverParams[$name];
            }

            return '';
        }

        return $this->serverParams;
    }


}
