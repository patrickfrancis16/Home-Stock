<?php

namespace AndersonLucas\HomeStock\Repository;

use AndersonLucas\HomeStock\Config\Database;
use PDO;

abstract class Repository {
    private $table;
    public function __construct($table) {
        $this->table = $table;
    }

    public function all() {
        $stmt = Database::getConnection()->query("SELECT * FROM {$this->table}");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        Database::closeConnection();
        return $result;
    }

    public function find($id) {
        $stmt = Database::getConnection()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        Database::closeConnection();
        return $result;
    }

    public function create($data) {
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $stmt = Database::getConnection()->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$values})");

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        $stmt->execute();
        Database::closeConnection();
    }

    public function update($id, $data) {
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "{$key} = :{$key}, ";
        }

        $fields = rtrim($fields, ', ');

        $stmt = Database::getConnection()->prepare("UPDATE {$this->table} SET {$fields} WHERE id = :id");
        $stmt->bindValue(':id', $id);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        $stmt->execute();
        Database::closeConnection();
    }

    public function delete($id) {
        $stmt = Database::getConnection()->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        Database::closeConnection();
    }
}
