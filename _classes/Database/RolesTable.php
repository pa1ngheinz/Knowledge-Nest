<?php

namespace Database;

class RolesTable{
    private $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db->connect();
    }

    public function insert($name, $value){
        try {
            $sql = "INSERT INTO roles (name, value, created_at) VALUES (:name, :value, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "value" => $value
            ]);
            return $this->db->lastInsertId();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function update($id, $name, $value){
        try {
            $sql = "UPDATE roles SET name = :name, value = :value, updated_at = NOW() WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "value" => $value,
                "id" => $id
            ]);
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function delete($id){
        try {
            $sql = "DELETE FROM roles WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "id" => $id
            ]);
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getOne($id){
        try {
            $sql = "SELECT * FROM roles WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "id" => $id
            ]);
            return $stmt->fetch();
        } catch (\Throwable $th) {
           echo $th->getMessage();
        }
    }

    public function getAll(){
        try {
            $sql = "SELECT * FROM roles";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}