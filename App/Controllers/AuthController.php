<?php

namespace App\Controllers;

use App\Core\Responses\Response;

class AuthController extends AControllerRedirect
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        // TODO: Implement index() method.
    }

    public function loginForm()
    {
        return $this->html();
    }
    public function registerForm()
    {
        return $this->html();
    }

    public function login()
    {
        
    }
    public function register()
    {

    }
}