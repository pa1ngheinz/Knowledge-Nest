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

    public function insert($name, $email, $password)
    {
        try {
            $sql = "INSERT INTO users (name,email,password,created_at) VALUES (:name,:email,:password,NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "email" => $email,
                "password" => $password,
            ]);
            return $this->db->lastInsertId();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getByEmailAndPassword($email, $password)
    {
        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "email" => $email,
                "password" => $password
            ]);
            return $result = $stmt->fetch();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
