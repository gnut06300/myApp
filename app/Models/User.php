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
        $_SESSION['username'] = $user->username;
        return true;

    }
}