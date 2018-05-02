<?php
/**
 * @desc Created by PhpStorm.
 * @author: csthink
 * @since: 12/20/2017 2:08 PM
 */

namespace framework;

class Controller
{
    use View;

    protected $request;
    protected $response;

    public function __construct(\CPF $cpf)
    {
        $this->request = $cpf->getRequest();
        $this->response = $cpf->getResponse();
    }
}
