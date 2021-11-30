<?php

namespace App;
// prerobit s tabulkou users kde sa to bude kontrolovat
use App\Models\User;

class Auth
{

    public static function login($login, $password)
    {
        $users = User::getAll();
        foreach ($users as $user) {
            if ($login == $user->email && $password == $user->password) {
                $_SESSION["name"] = $login;
                $_SESSION["id"] = $user->id;
                return true;
            }
        }
        return false;
    }

    public static function logout()
    {
        unset($_SESSION["name"]);
        session_destroy();
    }

    public static function isLogged()
    {
        return isset($_SESSION["name"]);
    }

    public static function getName()
    {
        return (Auth::isLogged() ? $_SESSION["name"] : "");
    }

}