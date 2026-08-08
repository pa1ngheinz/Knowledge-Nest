<?php

namespace Database;

use PDO;

class DbConnection
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $db;

    public function __construct($host = "localhost", $username = "root", $password = "", $database = "knowledge_nest")
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->db = null;
    }

    public function connect()
    {
        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);

            echo "Connection successful";
            return $this->db;
        } catch (\Throwable $th) {
            echo "Connection failed: " . $th->getMessage();
        }
    }
}

