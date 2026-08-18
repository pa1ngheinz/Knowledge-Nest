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

        public function getAll(){

        }
    }