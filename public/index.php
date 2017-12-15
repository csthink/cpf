<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:24 PM
 */
// TODO 待改进
$defaultModuleNmae = 'app';
$moduleName = '';
if ('admin.csthink.com' == $_SERVER['SERVER_NAME'] || 'www.admin.csthink.com' == $_SERVER['SERVER_NAME']) {
    $moduleName = 'admin';
}
$moduleName = $moduleName ? $moduleName : $defaultModuleNmae;

define('DEBUG', true); // 调式模式
define('APP_PATH', realpath(__DIR__ . '/../') . '/'); // 根目录
define('CPF_PATH', APP_PATH . 'cpf/'); // 框架基础核心目录
define('PUBLIC_PATH', APP_PATH . '/public/'); // 公共资源目录
define('MODULE_PATH', APP_PATH . $moduleName . '/'); // 模块目录
define('MODULE_NAME', $moduleName); // 模块名

// Composer 自动加载
require APP_PATH . '/vendor/autoload.php';
