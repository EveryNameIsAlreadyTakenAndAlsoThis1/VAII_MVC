<?php

namespace App;

use App\Models\User;

class Auth
{
    const LOGIN = "a@a.sk";
    const PASSWORD = "aaa";

    public static function login($login, $password)
    {
        $user = \App\Models\User::getAll('nickname=? AND pssword =?', [$login, $password]);
        if (count($user) > 0) {
            $userOne = $user[0];
            $_SESSION['user'] = serialize($userOne);
            return true;
        } else {

            return false;
        }

    }

    public static function isLogged()
    {
        return isset($_SESSION['user']);
    }

    public static function getName()
    {
        if (Auth::isLogged()) {
            $user = unserialize($_SESSION['user']);
            $nickname = $user->nickname;
            return $nickname;
        } else {

            return "";
        }

    }

    public static function logout()
    {
        unset($_SESSION['user']);
    }

    public static function changeFullName($fullName)
    {
        $user = unserialize($_SESSION['user']);
        $user->fullName = $fullName;
        $user->save();
        $_SESSION['user'] = serialize($user);

    }

    public static function changeMobile($mobile)
    {
        $user = unserialize($_SESSION['user']);
        $user->mobile = $mobile;
        $user->save();
        $_SESSION['user'] = serialize($user);
    }

    public static function changePassword($oldPassword, $newPassword, $newPasswordRepeat)
    {
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
        $user = unserialize($_SESSION['user']);
        $user->adress = $adress;
        $user->save();
        $_SESSION['user'] = serialize($user);

    }

    public static function changeEmail($email)
    {
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
        $user = unserialize($_SESSION['user']);
        if ($user->pssword == $password) {
            $user->delete();
            unset($_SESSION['user']);

        }else{
            return 1;
        }


    }
}