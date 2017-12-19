<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/19/2017 5:21 PM
 */

namespace app\controllers;

class Controller
{
    protected $request;
    protected $response;

    public function __construct(\CPF $cpf)
    {
        $this->request = $cpf->getRequest();
        $this->response = $cpf->getResponse();
    }
}
