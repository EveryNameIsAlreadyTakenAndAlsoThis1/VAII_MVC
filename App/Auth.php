<?php

namespace App;

use App\Models\User;

class Auth
{

    public static function login($login, $password)
    {
        if(!preg_match("/^[a-zA-Z0-9]+$/",$login)){
            return 1;
        }
        if(!preg_match("/[a-z]/i",$password) ||!preg_match("/[A-Z]/i",$password)||!preg_match("/[0-9]/i",$password) || strlen($password)<8){
            return 2;
        }

        $user = \App\Models\User::getAll('nickname=? AND pssword =?', [$login, $password]);
        if (count($user) > 0) {
            $userOne = $user[0];
            $_SESSION['user'] = serialize($userOne);
            return 3;
        } else {

            return 4;
        }

    }

    public static function isLogged()
    {
        return isset($_SESSION['user']);
    }

    public static function logout()
    {
        unset($_SESSION['user']);
    }

    public static function changeFullName($fullName)
    {
        if(preg_match_all("/^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/i",$fullName)==0){
        return 1;
        }else{
            $user = unserialize($_SESSION['user']);
            $user->fullName = $fullName;
            $user->save();
            $_SESSION['user'] = serialize($user);
            return 2;
        }


    }

    public static function changeMobile($mobile)
    {
        if(preg_match_all("/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/",$mobile)==0){
            return 1;
        }
        $user = unserialize($_SESSION['user']);
        $user->mobile = $mobile;
        $user->save();
        $_SESSION['user'] = serialize($user);
    }

    public static function changePassword($oldPassword, $newPassword, $newPasswordRepeat)
    {
        if(!preg_match("/[a-z]/i",$newPassword) ||!preg_match("/[A-Z]/i",$newPassword)||!preg_match("/[0-9]/i",$newPassword) || strlen($newPassword)<8){
            return 4;
        }
        $user = unserialize($_SESSION['user']);
        if ($user->pssword == $oldPassword) {

            if ($newPassword == $newPasswordRepeat) {
                $user->pssword = $newPassword;
                $user->save();
            } else {
                return 1;
            }

        } else {
            return 2;
        }
        $_SESSION['user'] = serialize($user);
        return 3;
    }

    public static function changeAdress($adress)
    {
        if(preg_match_all("/^[a-zA-Z0-9\s,.'-]{3,}$/",$adress)==0){
            return 1;
        }
        $user = unserialize($_SESSION['user']);
        $user->adress = $adress;
        $user->save();
        $_SESSION['user'] = serialize($user);

    }

    public static function changeEmail($email)
    {
        if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
            return 2;
        }
        $user = unserialize($_SESSION['user']);
        $usersEmail = \App\Models\User::getAll('email = ? ', [$email]);
        if (count($usersEmail) > 0) {
            return 1;
        } else {
            $user->email = $email;
            $user->save();
            $_SESSION['user'] = serialize($user);
        }


    }

    public static function register($login, $password, $email, $passwordRepeat)
    {
        if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
            return 5;
        }elseif (!preg_match("/[a-z]/i",$password) ||!preg_match("/[A-Z]/i",$password)||!preg_match("/[0-9]/i",$password) || strlen($password)<8){
            return 6;
        }elseif (!preg_match("/^[a-zA-Z0-9]+$/",$login)){
            return 7;
        }



        $users = \App\Models\User::getAll('nickname = ? ', [$login]);
        if (count($users) > 0) {
            return 1;
        } else {
            $usersEmail = \App\Models\User::getAll('email = ? ', [$email]);
            if (count($usersEmail) > 0) {
                return 2;
            } else if ($password != $passwordRepeat) {
                return 3;
            } else {
                $user = new User();
                $user->nickname = $login;
                $user->email = $email;
                $user->pssword = $password;
                $user->save();

                return 4;
            }
        }
    }

    public static function changeNickname($newNickname, $password)
    {
        if(preg_match_all("/^[a-zA-Z0-9]+$/",$newNickname)==0){
            return 3;
        }

        $user = unserialize($_SESSION['user']);
        if ($user->pssword == $password) {
            $users = \App\Models\User::getAll('nickname = ? ', [$newNickname]);
            if (count($users) > 0) {
                return 1;
            }

            $user->nickname = $newNickname;
            $user->save();
            $_SESSION['user'] = serialize($user);


        } else {
            return 2;

        }


    }

    public static function deleteAccount($password)
    {
        if(!preg_match("/[a-z]/i",$password) ||!preg_match("/[A-Z]/i",$password)||!preg_match("/[0-9]/i",$password) || strlen($password)<8){
            return 2;
        }
        $user = unserialize($_SESSION['user']);
        if ($user->pssword == $password) {
            $user->delete();
            unset($_SESSION['user']);

        }else{
            return 1;
        }


    }
}