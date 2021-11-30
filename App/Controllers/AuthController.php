<?php

namespace App\Controllers;

use App\Auth;
use App\Core\Responses\Response;
use App\Models\User;

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
        if (Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function changePasswordForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function profile()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html();
    }

    public function changeNicknameForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }
    public function deleteAccountForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    public function login()
    {
        if (Auth::isLogged()) {
            $this->redirect('home');
        }

        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');

        $logged = Auth::login($login, $password);

        if ($logged) {
            $this->redirect('home');

        } else {
            $this->redirect('auth', 'loginForm', ['error' => 'Wrong username or password']);

        }

    }

    public function logout()
    {

        Auth::logout();
        $this->redirect('home');
    }

    public function register()
    {
        if (Auth::isLogged()) {
            $this->redirect('home');
        }

        $login = $this->request()->getValue('login');
        $password = $this->request()->getValue('password');
        $email = $this->request()->getValue('email');
        $passwordRepeat = $this->request()->getValue('passwordRepeat');

        $result = Auth::register($login, $password, $email, $passwordRepeat);
        if ($result == 1) {
            $this->redirect('auth', 'registerForm', ['error' => 'Username already exists']);
        } elseif ($result == 2) {
            $this->redirect('auth', 'registerForm', ['error' => 'Email already exists']);
        } elseif ($result == 3) {
            $this->redirect('auth', 'registerForm', ['error' => 'Wrong password']);
        } else {
            $this->redirect('auth', 'loginForm');
        }


    }
    public function deleteAccount()
    {
        $password=$this->request()->getValue('password');

        $result=Auth::deleteAccount($password);
        if($result==1){
            $this->redirect('auth', 'deleteAccountForm', ['error' => 'Wrong password']);
        }else{
            $this->redirect('home');
        }

    }


    public function changeFullName()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $fullName = $this->request()->getValue('fullName');
        Auth::changeFullName($fullName);

        $this->redirect('auth', 'profile');
    }

    public function changeEmail()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $email = $this->request()->getValue('email');
        $result = Auth::changeEmail($email);
        if ($result == 1) {
        //TODO chybova hlaska
        }
        $this->redirect('auth', 'profile');
    }

    public function changeNickname()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $newNickname = $this->request()->getValue('newNickname');
        $password = $this->request()->getValue('password');
        $result = Auth::changeNickname($newNickname,$password);

        if ($result == 1) {
            $this->redirect('auth', 'changeNicknameForm', ['error' => 'Name already taken']);
        }elseif($result==2){
            $this->redirect('auth', 'changeNicknameForm', ['error' => 'Wrong password']);
        }else{
            $this->redirect('auth', 'profile');
        }

    }

    public function changePassword()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $oldPassword = $this->request()->getValue('oldPassword');
        $newPassword = $this->request()->getValue('newPassword');
        $newPasswordRepeat = $this->request()->getValue('newPasswordRepeat');
        $result = Auth::changePassword($oldPassword, $newPassword, $newPasswordRepeat);

        if ($result == 3) {
            $this->redirect('auth', 'profile');
        } else {
            if ($result == 1) {
                $this->redirect('auth', 'changePasswordForm', ['error' => 'Wrong new password']);
            } else {
                $this->redirect('auth', 'changePasswordForm', ['error' => 'Wrong old password']);
            }
        }

    }

    public function changeMobile()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $mobile = $this->request()->getValue('mobile');
        Auth::changeMobile($mobile);

        $this->redirect('auth', 'profile');
    }

    public function changeAdress()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $adress = $this->request()->getValue('adress');
        Auth::changeAdress($adress);

        $this->redirect('auth', 'profile');
    }
}