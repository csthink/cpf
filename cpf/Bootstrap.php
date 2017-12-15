<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:16 PM
 */

use Illuminate\Database\Capsule\Manager as Capsule;


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

// 加载类库
require_once(CPF_PATH . 'Functions.php');

// 加载框架核心文件
include CPF_PATH . 'CPF.php';

// 注册自动加载
spl_autoload_register('cpf_autoload');

// 加载数据库ORM
$capsule = new Capsule;
$capsule->addConnection(include MODULE_PATH . 'config/Database.php');
$capsule->setAsGlobal();
$capsule->bootEloquent();
//$results = Capsule::select('select * from user where Host = ?', array('localhost'));
//p($results);
//exit;
// 运行框架
\CPF::getInstance()->run();
