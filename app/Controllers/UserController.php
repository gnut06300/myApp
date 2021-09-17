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

    public function registration()
    {
        return $this->view('user.registration');
    }
    
    public function creationUser()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'validUsername'],
            'email' => ['required', 'validEmail'],
            'password' => ['required', 'validPassword'],
            'password_confirm' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: ' . REPERT . '/registration');
            exit;
        }
        if((new User($this->getDB()))->getByUsername($_POST['username'])){
            $_SESSION['errors'][] = ['username' => ['Ce nom d\'utilisateur existe déjà']];
            header('Location: ' . REPERT . '/registration');
            exit;
        }

        $data = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        //var_dump($data); die();
        $user = new User($this->getDB());
        $result = $user->create($data);

        if($result) {
            return header('Location: ' . REPERT . '/');
        }
    }

    public function loginPost()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required', 'min:6']
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
                $_SESSION['username'] = $user->username;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['user_id'] = (int) $user->id;
                $_SESSION['auth'] = (int) $user->admin;
                if ($_SESSION['auth'] === 1){
                    return header('Location: ' . REPERT . '/admin/posts?success=true');
                }
                elseif($_SESSION['auth'] === 0){
                    return header('Location: ' . REPERT . '/');
                }
            } else {
                $_SESSION['errors'][] = [0 => ['Mauvais nom d\'utilisateur ou mot de passe']];
                //var_dump($_SESSION['errors']);
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
