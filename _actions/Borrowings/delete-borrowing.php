<?php 
    session_start();
    include_once("../../vendor/autoload.php");

    use Database\DbConnection;
    use Database\BorrowingsTable;
    use Database\BooksTable;
    use Helpers\CSRF;
    use Helpers\HTTP;

    CSRF::verify_csrf($_POST['csrf_token'] ?? '');

    $borrowingsTable = new BorrowingsTable(new DbConnection());
    $booksTable = new BooksTable(new DbConnection());

    $id = $_POST['id'];
    $book_id = $_POST['book_id'];
    $csrf_token = $_POST['csrf_token'];
    $session_csrf = $_SESSION['csrf_token'];

    $borrowingsTable->delete($id);
    $booksTable->updateStatus($book_id, "Available");

    HTTP::redirect("borrowings.php");


    