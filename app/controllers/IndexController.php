<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:22 PM
 */

namespace app\controllers;

use app\models\User;
use framework\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $user = new User();
        p($user->getData());
//        p($this->request->get('name', 'jack'));
//        p($this->request->get());
//        echo 'welcome to CPF';
//        $this->assign('name', 'Twig');
//        $this->assign('age', 18);
//        $this->assign('sex', 'male');
//        $this->display('test/index');
    }
}
