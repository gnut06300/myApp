<?php

namespace App\Models;

use Database\DBConnection;
use stdClass;

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
        return $stmat->fetchAll();
    }

    public function findById(int $id): stdClass
    {
        $stmat = $this->db->getPDO()->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmat->execute([$id]);
        return $stmat->fetch();
    }

}