<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:23 PM
 */

use framework\Router;

Router::get('/', 'IndexController@index');
Router::get('aa', 'IndexController@index');

// 404 设置方式一
//Router::error(function () {
//    echo '页面被外星人掳走了...';
//});

// 404 设置方式二
Router::error('ErrorController@index');