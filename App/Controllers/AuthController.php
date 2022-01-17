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
                'error' => $this->request()->getValue('error'),
                'success' => $this->request()->getValue('success')
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
                'error' => $this->request()->getValue('error'),
                'success' => $this->request()->getValue('success')
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
                'error' => $this->request()->getValue('error'),
                'success' => $this->request()->getValue('success')
            ]
        );
    }

    public function profile()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'success' => $this->request()->getValue('success')
            ]
        );
    }

    public function changeNicknameForm()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }
        return $this->html(
            [
                'error' => $this->request()->getValue('error'),
                'success' => $this->request()->getValue('success')
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
                'error' => $this->request()->getValue('error'),
                'success' => $this->request()->getValue('success')
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

        if($logged==1){
            $this->redirect('auth', 'loginForm', ['error' => 'Bad name format']);
        }elseif ($logged==2){
            $this->redirect('auth', 'loginForm', ['error' => 'Bad password format']);
        }elseif($logged==3){
            $this->redirect('auth',"profile",['success' => 'Successfully logged-in']);
        }elseif ($logged==4){
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
        }elseif ($result == 5){
            $this->redirect('auth', 'registerForm', ['error' => 'Wrong email format']);
        }elseif ($result == 6){
            $this->redirect('auth', 'registerForm', ['error' => 'Wrong password format']);
        }elseif ($result == 7){
            $this->redirect('auth', 'registerForm', ['error' => 'Wrong username format']);
        } else {
            $this->redirect('auth', 'loginForm',['success'=>'Successfully registered']);
        }


    }
    public function deleteAccount()
    {
        $password=$this->request()->getValue('password');

        $result=Auth::deleteAccount($password);
        if($result==1){
            $this->redirect('auth', 'deleteAccountForm', ['error' => 'Wrong password']);
        }elseif($result==2){
            $this->redirect('auth', 'deleteAccountForm', ['error' => 'Wrong password format']);
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
        $result=Auth::changeFullName($fullName);
        if($result==1){
            $this->redirect('auth',"profile",['error' => 'Wrong name format']);
        }else{
            $this->redirect('auth',"profile",['success' => 'Successfully changed name']);
        }

    }

    public function changeEmail()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $email = $this->request()->getValue('email');
        $result = Auth::changeEmail($email);
        if ($result == 1) {
            $this->redirect('auth',"profile",['error' => 'Email already taken']);
        }elseif($result==2){
            $this->redirect('auth',"profile",['error' => 'Wrong format']);
        }else{
            $this->redirect('auth',"profile",['success' => 'Successfully changed email']);
        }

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
        }elseif($result==3){
            $this->redirect('auth', 'changeNicknameForm', ['error' => 'Wrong name format']);
        }else{
            $this->redirect('auth',"profile",['success' => 'Successfully changed nickname']);
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
            $this->redirect('auth',"profile",['success' => 'Successfully changed password']);
        } else {
            if ($result == 1) {
                $this->redirect('auth', 'changePasswordForm', ['error' => 'Wrong new password']);
            } elseif($result==2) {
                $this->redirect('auth', 'changePasswordForm', ['error' => 'Wrong old password']);
            } elseif ($result==4){
                $this->redirect('auth', 'changePasswordForm', ['error' => 'Wrong password format']);
            }
        }

    }

    public function changeMobile()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $mobile = $this->request()->getValue('mobile');
        $result=Auth::changeMobile($mobile);
        if($result==1){
            $this->redirect('auth',"profile",['error' => 'Wrong mobile format']);
        }
        $this->redirect('auth',"profile",['success' => 'Successfully changed mobile']);
    }

    public function changeAdress()
    {
        if (!Auth::isLogged()) {
            $this->redirect('home');
        }

        $adress = $this->request()->getValue('adress');
        $result=Auth::changeAdress($adress);
        if($result==1){
            $this->redirect('auth',"profile",['error' => 'Wrong address format']);
        }
        $this->redirect('auth',"profile",['success' => 'Successfully changed address']);
    }
}