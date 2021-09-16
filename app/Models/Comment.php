<?php

namespace App\Models;

use DateTime;

class Comment extends Model
{
    protected $table = 'comments';

    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);
        
        return true;

    }

    public function getCreatedAt(): string
    {
        return (new DateTime($this->created_at))->format('d/m/Y à H:i');
    }

    public function getAuthor()
    {
        return $this->query("
        SELECT * FROM users
        WHERE id = ?
        ", [$this->user_id], true);
    }

    public function getExcerpt(): string
    {
        return substr($this->content, 0, 50) . '...';
    }

}