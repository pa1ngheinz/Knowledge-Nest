<?php
    session_start();

    include_once("../../vendor/autoload.php");

    use Database\DbConnection;
    use Database\BorrowingsTable;
    use Database\BooksTable;
    use Helpers\HTTP;
    use Helpers\CSRF;

    CSRF::verify_csrf($_POST['csrf_token'] ?? '');

    $borrowingsTable = new BorrowingsTable(new DbConnection());
    $booksTable = new BooksTable(new DbConnection());

    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user']->id;

    $borrowingsTable->insert($user_id, $book_id);

    $booksTable->updateStatus($book_id, "Borrowed");

    HTTP::redirect("home.php");



