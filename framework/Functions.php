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
 * @param $className
 * @throws Exception
 */
function cpf_Autoload($className)
{
    $fileName = str_replace('\\', '/', trim($className, '\\')) . '.php';
    if (is_file(FRAMEWORK_PATH .'/'. $fileName)) {
        require FRAMEWORK_PATH . '/' . $fileName;
    } else {
        if (is_file(CSTHINK_PATH . '/' . $fileName)) {
            require CSTHINK_PATH . '/' . $fileName;
        }
    }

//    $fileName = CSTHINK_PATH . str_replace('\\', '/', trim($className, '\\')) . '.php';
//    if (file_exists($fileName)) {
//        require_once $fileName;
//    } else {
//        throw new Exception($fileName . ' is not exist');
//    }
}
