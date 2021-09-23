<?php

namespace App\Models ;

class User extends Model{

    protected $table = 'users';

    public function getByUsername(string $username)//:User // if no user and find returns false else User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);
        
        $id = $this->db->getPDO()->lastInsertId();
        $user = $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
        $_SESSION['username_created'] = $user->username;
        $token=sha1($user->id.$user->username.$user->email);
        
        //@ permet de masquer le message d'erreur
        if (@mail($user->email,'Demande de vérification de votre email',"<p>Vérification de votre email, veuillez cliquer sur le lien : <a href='". URL_HOST . REPERT ."/checked/". $user->id."?token=".$token."'>Lien de vérification de votre email</a></p>",'Content-Type: text/html; charset="utf-8"')) {
            return true;
        }
        else{
            $_SESSION['errors'][] = ['email' => ['un probléme est survenu lors de l`\'envoi du mail de confirmation contacter l\'administrateur']];
            header('Location: ' . REPERT . '/registration');
            exit;
        }

    }
}