<?php

namespace App\Controllers;

use App\Models\User;
use App\Validation\Validator;
use App\Exceptions\NotFoundException;


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
        }
        if((new User($this->getDB()))->getByUsername($_POST['username'])){
            $_SESSION['errors'][] = ['username' => ['Ce nom d\'utilisateur existe déjà']];
            header('Location: ' . REPERT . '/registration');
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

    public function checked(int $id)
    {
        $user = (new User($this->getDB()))->findById($id);

        if($user){
            $token=sha1($user->id.$user->username.$user->email);
           
            if(isset($_GET['token'])  && $_GET['token'] == $token){
    
                //$user1 = new User($this->getDB());          
                $data=['checked' => 1];
        
                $result = $user->update($id, $data);
        
                if($result) {
                    $_SESSION['errors'][] = ['email' => ['Merci, votre email à bien été vérifié, votre inscription est finie']];
                    return header('Location: ' . REPERT . '/login');
                }
    
            }else{
                
                $_SESSION['errors'][] = ['email' => ['Votre lien n\'est pas valide, veuillez contacter l\'administrateur']];
                return header('Location: ' . REPERT . '/login');
            }

        }
        $exception = new NotFoundException();
        return $exception->error404();
    
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
                if($user->checked == 1){
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
                }else{
                    $_SESSION['errors'][] = ['email' => ['Vous devez valider le lien de vérification de votre email avant de pouvoir vous connecter']];
                
                    return header('Location: ' . REPERT . '/login');
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
