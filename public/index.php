<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:24 PM
 */
// TODO 待改进
$defaultModuleName = 'app';
$moduleName = '';
if ('admin.csthink.com' == $_SERVER['SERVER_NAME'] || 'www.admin.csthink.com' == $_SERVER['SERVER_NAME']) {
    $moduleName = 'admin';
}
$moduleName = $moduleName ? $moduleName : $defaultModuleName;

//define('DEBUG', false); // 生产模式
define('DEBUG', true); // 调式模式
define('CSTHINK_PATH', realpath(__DIR__ . '/../')); // 根目录
define('FRAMEWORK_PATH', CSTHINK_PATH . '/framework'); // 根目录
define('PUBLIC_PATH', CSTHINK_PATH . '/public'); // 公共资源目录
define('MODULE_PATH', CSTHINK_PATH . '/' . $moduleName); // 模块目录
define('MODULE_NAME', $moduleName); // 模块名

try {
    // Composer 自动加载
    require CSTHINK_PATH . '/vendor/autoload.php';

    if (DEBUG && PHP_SAPI != 'cli') {
        // 开启PHP错误提示
        ini_set('display_errors', true);
        error_reporting(E_ALL);
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    } else {
        ini_set('display_errors', false);
    }

    // 加载框架核心文件
    include FRAMEWORK_PATH . '/CPF.php';
    // 框架注册自动加载
    spl_autoload_register('cpf_Autoload');
    // 运行框架
    CPF::getInstance()->run();
} catch (Exception $e) {
    exit($e->getMessage());
}
