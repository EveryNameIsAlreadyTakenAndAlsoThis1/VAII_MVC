<?php

namespace App;

class Auth
{
    const LOGIN = "a@a.sk";
    const PASSWORD = "aaa";

    public static function login($login,$password)
    {
        if ($login == self::LOGIN && $password ==self::PASSWORD){
            $_SESSION['name']=$login;
            return true;
        }else{

            return false;
        }

    }

    public static function isLogged()
    {
        return isset($_SESSION['name']);
    }

    public static function getName()
    {
        if (Auth::isLogged()){
            return $_SESSION['name'];
        }else{

            return "";
        }

    }

    public static function logout()
    {
        unset($_SESSION['name']);
    }

}