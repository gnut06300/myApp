<?php

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;


class UserController extends Controller
{

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);

        // var_dump($errors); die();
        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: ' . REPERT . '/login');
            exit;
        }

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        //var_dump($user); die();// we check if the password is correct
        if ($user) {
            if (password_verify($_POST['password'], $user->password)) {
                //var_dump($user->admin); die(); //$ user-> admin returns a string we add (int) to transform it into int           
                $_SESSION['auth'] = (int) $user->admin;
                return header('Location: ' . REPERT . '/admin/posts?success=true');
            } else {
                $_SESSION['errors'][] = [0 => ['Mauvais nom d\'utilisateur ou mot de passe']];
                var_dump($_SESSION['errors']);
                return header('Location: ' . REPERT . '/login');
            }
        } else {
            $_SESSION['errors'][] = [0 => ['Mauvais nom d\'utilisateur ou mot de passe']];
            //var_dump($_SESSION['errors']);
            return header('Location: ' . REPERT . '/login');
        }
    }

    public function logout()
    {
        session_destroy();

        return header('Location: ' . REPERT . '/');
    }
}
