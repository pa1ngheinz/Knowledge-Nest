<?php 
    namespace Database;

    class BorrowingsTable {
        private $db;

        public function __construct(DbConnection $db)
        {
            $this->db = $db->connect();
        }

        public function insert($user_id, $book_id){
            try {
                $sql = "INSERT INTO borrowings(user_id, book_id, borrowed_at) VALUES(:user_id, :book_id, NOW())";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    "user_id" => $user_id,
                    "book_id" => $book_id
                ]);
                return $this->db->lastInsertId();
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }

        public function getAllByUser($user_id){
            try {
                $sql = "SELECT borrowings.*, books.name, books.image, books.author, users.name AS user FROM borrowings INNER JOIN books ON borrowings.book_id = books.id INNER JOIN users ON borrowings.user_id = users.id WHERE borrowings.user_id = :user_id";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    "user_id" => $user_id
                ]);
                return $stmt->fetchAll();
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }

        public function getAll(){
            try {
                $sql = "SELECT borrowings.*, books.name, books.image, books.author, users.name AS user FROM borrowings INNER JOIN books ON borrowings.book_id = books.id INNER JOIN users ON borrowings.user_id = users.id";
                $stmt = $this->db->query($sql);
                return $stmt->fetchAll();
            } catch (\Throwable $th) {
                echo $th->getMessage();
            }
        }

        public function delete($id){
            try {
                $sql = "DELETE FROM borrowings WHERE id = :id";
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