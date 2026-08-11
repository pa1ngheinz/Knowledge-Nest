<?php

namespace Database;

class RolesTable{
    private $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db->connect();
    }

    public function getAll(){
        try {
            $sql = "SELECT * FROM roles";
            $stmt = $this->db->query($sql);
            return $result = $stmt->fetchAll();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}