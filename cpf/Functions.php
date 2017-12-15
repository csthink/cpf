<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:19 PM
 */

/**
 * 打印函数
 * @param $var
 */
function p($var)
{
    if (is_cli()) {
        if (is_array($var) || is_object($var)) {
            dump($var);
        } else {
            echo PHP_EOL;
            echo "\e[31m" . $var . "\e[37m" . PHP_EOL;
            echo PHP_EOL;
        }
    } else {
        if (is_bool($var)) {
            var_dump($var);
        } else if (is_null($var)) {
            var_dump(NULL);
        } else {
            echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
        }
    }
}

function is_cli()
{
    return PHP_SAPI == 'cli';
}

function redirect($str)
{
    header('Location:' . $str);
}

/**
 * 自动加载类
 * @param $class
 */
function cpf_autoload($class)
{
    $class = str_replace('\\', '/', trim($class, '\\'));
    if (is_file(CPF_PATH . $class . '.php')) {
        include_once CPF_PATH . $class . '.php';
    } else {
        if (is_file(APP_PATH . $class . '.php')) {
            include_once APP_PATH . $class . '.php';
        }
    }
}
