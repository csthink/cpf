<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:22 PM
 */

namespace app\controllers;

//use app\models\User;

class IndexController extends Controller
{
    public function index()
    {
//        $user = new User();
//        p($user->getData());
//        p($this->request->get('name', 'jack'));
        echo 'welcome to CPF';
    }
}
