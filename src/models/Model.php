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
    public function update($id, $data)
    {
        $setClause = '';
        $params = [];

        foreach ($data as $key => $value) {
            if (!empty($setClause)) {
                $setClause .= ', ';
            }
            $setClause .= "{$key} = :{$key}";
            $params[$key] = $value;
        }

        $params['id'] = $id;

        $sql = "UPDATE {$this->table} SET {$setClause} WHERE id = :id";

        return $this->db->query($sql, $params)->rowCount() > 0;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";

        return $this->db->query($sql, ['id' => $id])->rowCount() > 0;
    }
}