<?php 

namespace Database;

use Database\DbConnection;

class BooksTable{
    private $db;

    public function __construct(DbConnection $db)
    {
        $this->db = $db->connect();
    }

    public function insert($name, $image, $author){
        try {
            $sql = "INSERT INTO books (name, image, author, created_at) VALUES (:name, :image, :author, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "image" => $image,
                "author" => $author
            ]);
            return $this->db->lastInsertId();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function getAll(){
        try {
            $sql = "SELECT * FROM books";
            $stmt = $this->db->query($sql);
            return $result = $stmt->fetchAll();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}