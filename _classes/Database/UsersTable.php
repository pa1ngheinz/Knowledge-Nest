<?php

namespace Database;

use Database\DbConnection;

class UserTable
{
    private $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db->connect();
    }

    public function insert($name, $email, $password)
    {
        $sql = "INSERT INTO users (name,email,password,created_at) VALUES (:name,:email,:password,NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            "name" => $name,
            "email" => $email,
            "password" => $password,
        ]);
        return $this->db->lastInsertId();
    }
}
