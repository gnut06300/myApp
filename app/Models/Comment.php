<?php

namespace App\Models;

class Comment extends Model
{
    protected $table = 'comments';

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);
        
        return true;

    }
}