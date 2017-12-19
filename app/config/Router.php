<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:23 PM
 */

use framework\Router;

Router::get('/', 'app\\controllers\\IndexController@index');

Router::error(function () {
    echo '页面被外星人掳走了...';
});
