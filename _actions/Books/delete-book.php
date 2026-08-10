<?php 

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\BooksTable;
use Helpers\HTTP;

$booksTable = new BooksTable(new DbConnection());

$id = $_GET['id'];

$booksTable->delete($id);

HTTP::redirect("admin.php", "successDeleting=1");

