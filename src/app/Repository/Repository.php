<?php

namespace AndersonLucas\HomeStock\Repository;

use AndersonLucas\HomeStock\Config\Database;

abstract class Repository
{
   private $table;
   private $conn;

    public function __construct($table)
    {
         $this->table = $table;
         $db = new Database();
         $this->conn = $db->getConnection();
    }

    public function all()
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        $result = $stmt->fetchAll();
        return $result;
    }

    public function find($id)
    {
        $stmt = $this->conn->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        $result = $stmt->fetch();
        return $result;
    }

    public function create($data)
    {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $stmt = $this->conn->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$values})");

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        $stmt->execute();
    }

    public function update($id, $data)
    {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "{$key} = :{$key}, ";
        }

        $fields = rtrim($fields, ', ');

        $stmt = $this->conn->prepare("UPDATE {$this->table} SET {$fields} WHERE id = {$id}");

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function __destruct()
    {
        $this->conn = null;
    }

}