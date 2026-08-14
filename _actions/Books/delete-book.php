<?php 
session_start();

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\BooksTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$booksTable = new BooksTable(new DbConnection());

$id = $_POST['id'];

$booksTable->delete($id);

HTTP::redirect("admin.php", "successDeleting=1");

