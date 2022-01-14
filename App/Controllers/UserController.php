<?php

namespace App\Controllers;

use App\Auth;
use App\Models\User;
use App\Validation;

class UserController extends AControllerRedirect
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function createUser()
    {
        $user = new User;
        $users = User::getAll();
        $isDuplicatedEmail = false;
        $isDuplicatedUsername = false;

        $user = $this->setUserValues($user);

        foreach ($users as $userDB)
        {
            if ($userDB->username == $user->username)
            {
                $isDuplicatedUsername = true;
            }
            if ($userDB->email == $user->email)
            {
                $isDuplicatedEmail = true;
            }
        }
        if ($isDuplicatedUsername && $isDuplicatedEmail)
        {
            $this->redirect('auth', 'registrationForm', ['error' => 'Duplicitný email a používateľské meno.']);
        }
        else if ($isDuplicatedUsername && !$isDuplicatedEmail)
        {
            $this->redirect('auth', 'registrationForm', ['error' => 'Duplicitné používateľské meno.']);
        }
        else if (!$isDuplicatedUsername && $isDuplicatedEmail)
        {
            $this->redirect('auth', 'registrationForm', ['error' => 'Duplicitný email.']);
        }
        else
        {
            $user->save();
            Auth::login($user->username, $user->password);
            $this->redirect('home');
        }
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
            $users = User::getAll();
            $isDuplicatedEmail = false;
            $isDuplicatedUsername = false;

            $user = $this->setUserValues($user);

            foreach ($users as $userDB)
            {
                if ($userDB->username == $user->username && $userDB->id != $user->id)
                {
                    $isDuplicatedUsername = true;
                }
                if ($userDB->email == $user->email && $userDB->id != $user->id)
                {
                    $isDuplicatedEmail = true;
                }
            }
            if ($isDuplicatedUsername && $isDuplicatedEmail)
            {
                $this->redirect('user', 'update', ['error' => 'Duplicitný email a používateľské meno.']);
            }
            else if ($isDuplicatedUsername && !$isDuplicatedEmail)
            {
                $this->redirect('user', 'update', ['error' => 'Duplicitné používateľské meno.']);
            }
            else if (!$isDuplicatedUsername && $isDuplicatedEmail)
            {
                $this->redirect('user', 'update', ['error' => 'Duplicitný email.']);
            }
            else
            {
                $user->save();

                $this->redirect('user', 'profile');
            }
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

    public function profile()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        $user = User::getOne($_SESSION["id"]);

        return $this->html(
            [
                'user' => $user
            ]
        );
    }

    public function update()
    {
        if (!Auth::isLogged()) {
            $this->redirect("home");
        }

        $user = User::getOne($_SESSION["id"]);

        return $this->html(
            [
                'user' => $user,
                'error' => $this->request()->getValue('error')
            ]
        );
    }

    private function setUserValues($user)
    {
        $user->username = Validation::test_input($this->request()->getValue('username'));
        $user->name = Validation::test_input($this->request()->getValue('name'));
        $user->surname = Validation::test_input($this->request()->getValue('surname'));
        $user->password = Validation::test_input($this->request()->getValue('password'));
        $user->email = Validation::test_input($this->request()->getValue('email'));

        return $user;
    }

}