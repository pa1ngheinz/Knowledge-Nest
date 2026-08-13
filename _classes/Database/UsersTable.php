<?php

namespace Database;

use Database\DbConnection;

class UsersTable
{
    private $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db->connect();
    }

    public function insert($name, $email, $password, $role)
    {
        try {
            $sql = "INSERT INTO users (name,email,password,role_id,created_at) VALUES (:name,:email,:password,:role_id,NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "role_id" => $role
            ]);
            return $this->db->lastInsertId();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function insertAdmin($name, $email, $password)
    {
        try {
            $sql = "INSERT INTO users (name,email,password,role_id,created_at) VALUES (:name,:email,:password,:role_id,NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "email" => $email,
                "password" => $password,
                "role_id" => 2,
            ]);
            return $this->db->lastInsertId();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function update($id, $name, $email){
        try {
           $sql = "UPDATE users SET name = :name, email = :email, updated_at = NOW() WHERE id = :id";
           $stmt = $this->db->prepare($sql);
           $stmt->execute([
            "name" => $name,
            "email" => $email,
            "id" => $id
           ]);
           return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function updateRole($id, $value){
        try {
            $sql = "UPDATE users SET role_id = :role_id, updated_at = NOW() WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "role_id" => $value,
                "id" => $id
            ]);
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function updatePhoto($id, $image){
        try {
            $sql = "UPDATE users SET image = :image WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "image" => $image,
                "id" => $id
            ]);
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT users.*, roles.name as role FROM users LEFT JOIN roles ON users.role_id = roles.value WHERE email = :email AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "email" => $email,
                "password" => $password
            ]);
            return $stmt->fetch();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getOne($id){
        try {
            $sql = "SELECT users.*, roles.name as role FROM users LEFT JOIN roles ON users.role_id = roles.value WHERE users.id = :id";
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
            $sql = "SELECT users.*, roles.name as role FROM users LEFT JOIN roles ON users.role_id = roles.value";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function delete($id){
        try {
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "id" => $id
            ]);
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
