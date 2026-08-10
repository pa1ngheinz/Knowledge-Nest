<?php 

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\BooksTable;
use Helpers\HTTP;

$booksTable = new BooksTable(new DbConnection());

$name = $_POST['name'];
$author = $_POST['author'];
$imageName = $_FILES['image']['name'];
$imageType = $_FILES['image']['type'];
$imageTmpName = $_FILES['image']['tmp_name'];
$imageError = $_FILES['image']['error'];

if($imageError){
    HTTP::redirect("add-book.php", "errorFile=1");
}

if($imageType === "image/jpeg" or $imageType === "image/png"){
    $booksTable->insert($name,$imageName,$author);

    move_uploaded_file($imageTmpName,"../../images/$imageName");

    HTTP::redirect("admin.php", "successAdding=1");
}else{
    HTTP::redirect("add-book.php", "errorFile=1");
}

