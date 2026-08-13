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

    public function updateWithImage($id, $name, $image, $author){
        try {
            $sql = "UPDATE books SET name = :name, image = :image, author = :author, updated_at = NOW() WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "image" => $image,
                "author" => $author,
                "id" => $id
            ]);
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function updateWithoutImage($id, $name, $author){
        try {
            $sql = "UPDATE books SET name = :name, author = :author, updated_at = NOW() WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "name" => $name,
                "author" => $author,
                "id" => $id
            ]);
            return $stmt->rowCount();
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

    public function getOne($id){
        try {
            $sql = "SELECT * FROM books WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                "id" => $id
            ]);
            return $result = $stmt->fetch();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function delete($id){
        try {
           $sql = "DELETE FROM books WHERE id = :id";
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