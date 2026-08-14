<?php
session_start();

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\BooksTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$booksTable = new BooksTable(new DbConnection());

$id = $_POST["id"];
$name = $_POST["name"];
$author = $_POST["author"];

if($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE){
    $booksTable->updateWithoutImage($id, $name, $author);
}else{
    $imageName = $_FILES['image']['name'];
    $booksTable->updateWithImage($id, $name, $imageName, $author);
}

HTTP::redirect("admin.php", "successUpdating=1");
