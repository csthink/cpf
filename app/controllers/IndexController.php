<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/16/2017 4:22 PM
 */

namespace app\controllers;

use framework\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->assign('name', 'Twig');
        $this->assign('age', 18);
        $this->assign('sex', 'male');
        $this->display('test/index');
    }
}
