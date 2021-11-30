<?php

namespace App\Controllers;

use App\Auth;
use App\Models\User;

class UserController extends AControllerRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function createUser()
    {
        $user = new User;

        $user->username = $this->request()->getValue('username');
        $user->name = $this->request()->getValue('name');
        $user->surname = $this->request()->getValue('surname');
        $user->password = $this->request()->getValue('password');
        $user->email = $this->request()->getValue('email');

        $user->save();

        Auth::login($user->email, $user->password);

        $this->redirect('home');
    }

    public function updateUser()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        $userId = $this->request()->getValue('id');
        if ($userId > 0)
        {
            $user = User::getOne($_SESSION["id"]);

            $user->username = $this->request()->getValue('username');
            $user->name = $this->request()->getValue('name');
            $user->surname = $this->request()->getValue('surname');
            $user->password = $this->request()->getValue('password');
            $user->email = $this->request()->getValue('email');

            $user->save();

            $this->redirect('user', 'profile');
        }
    }

    public function deleteUser()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        $user = User::getOne($_SESSION["id"]);
        $user->delete();

        $this->redirect('home');
        Auth::logout();
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    public function profile()
    {
        $user = User::getOne($_SESSION["id"]);

        return $this->html(
            [
                'user' => $user
            ]
        );
    }

    public function update()
    {
        $user = User::getOne($_SESSION["id"]);

        return $this->html(
            [
                'user' => $user
            ]
        );
    }

}