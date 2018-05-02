<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:18 PM
 */
include 'Functions.php';

final class CPF
{
    CONST VERSION = '1.0.20171216';

    private static $instance;

    private $request;
    private $response;
    private $router;
    private $logger;

    private $request_class = '\\framework\\Request';
    private $response_class = '\\framework\\Response';
    private $router_class = '\\framework\\Router';

    /**
     * @param string $request_class
     */
    public function setRequestClass($request_class)
    {
        $this->request_class = $request_class;
    }

    /**
     * @param string $response_class
     */
    public function setResponseClass($response_class)
    {
        $this->response_class = $response_class;
    }

    /**
     * @param string $router_class
     */
    public function setRouterClass($router_class)
    {
        $this->router_class = $router_class;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return mixed
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @return mixed
     */
    public function getLogger()
    {
        return $this->logger;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function run()
    {
        $this->request = new $this->request_class();
        $this->response = new $this->response_class();
        $this->router = new $this->router_class();

        $router_file = MODULE_PATH . '/config/Router.php';
        if (file_exists($router_file)) {
            // 加载模块的路由规则
            require_once $router_file;
        } else {
            throw new Exception($router_file . ' is not exist');
        }

        $this->router->dispatch($this);
    }
}
