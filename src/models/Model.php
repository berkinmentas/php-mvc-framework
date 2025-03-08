<?php

namespace App\src\models;

use App\lib\Database;

abstract class Model
{
    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function all()
    {
        return $this->db->select("SELECT * FROM {$this->table}");
    }

    public function find($id)
    {
        return $this->db->selectOne(
            "SELECT * FROM {$this->table} WHERE id = :id",
            ['id' => $id]
        );
    }

    public function create($data)
    {
        $filteredData = [];
        foreach ($this->fillable as $field) {
            if (isset($data[$field])) {
                $filteredData[$field] = $data[$field];
            }
        }

        return $this->db->insert($this->table, $filteredData);
    }
}