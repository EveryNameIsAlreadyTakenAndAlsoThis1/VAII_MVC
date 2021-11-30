<?php

namespace App\Controllers;

use App\Auth;
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
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]

        );
    }
    public function registerForm()
    {
        return $this->html();
    }

    public function login()
    {
        if(Auth::isLogged()){
            $this->redirect('home');
        }

        $login=$this->request()->getValue('login');
        $password=$this->request()->getValue('password');

        $logged=Auth::login($login,$password);

        if($logged){
            $this->redirect('home');

        }else{
            $this->redirect('auth','loginForm',['error'=>'Wrong username or password']);

        }

    }

    public function logout()
    {

        Auth::logout();
        $this->redirect('home');
    }
    public function register()
    {
        if(Auth::isLogged()){
            $this->redirect('home');
        }

    }

    public function profile()
    {
        return $this->html();
    }
}