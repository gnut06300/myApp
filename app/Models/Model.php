<?php

namespace App\Models;

use Database\DBConnection;
use PDO;

abstract class Model
{
    protected $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        $stmat = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        $stmat->setFetchMode(PDO::FETCH_CLASS, get_class($this),[$this->db]);
        return $stmat->fetchAll();
    }

    public function findById(int $id): Model
    {
        $stmat = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmat->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $stmat->execute([$id]);
        return $stmat->fetch();
    }

}