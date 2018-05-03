<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:21 PM
 */

namespace framework;

class Response
{
    public function json(array $array)
    {
        header('Content-Type:application/json; charset=utf-8');
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
