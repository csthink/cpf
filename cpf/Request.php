<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:20 PM
 */

namespace cpf;

class Request
{
    /**
     * 请求参数
     * @var array $parameter
     */
    protected $parameters = array();

    /**
     * 获取请求类型
     * @return mixed
     */
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
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
    public function getCookies()
    {
        return $_COOKIE;
    }

    /**
     * 获取指定cookie
     * @param $name
     * @return mixed
     */
    public function getCookie($name)
    {
        return $_COOKIE[$name];
    }

    public function loadParameters()
    {
        return array_merge($_GET, $_POST);
    }

    public  function getParameter($name = '')
    {
        if (!isset($this->parameters)) {
            $this->parameters = $this->loadParameters();
        }

        if (isset($this->parameters[$name])) {
            return $this->parameters[$name];
        } else {
            return NULL;
        }
    }
}
