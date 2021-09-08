<?php

namespace App\Models ;

class User extends Model{

    protected $table = 'users';

    public function getByUsername(string $username)//:User // if no user and find returns false else User
    {
        return $this->query("SELECT * FROM {$this->table} WHERE username = ?", [$username], true);
    }
}