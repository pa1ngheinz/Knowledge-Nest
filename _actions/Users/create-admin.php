<?php 

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\UsersTable;
use Helpers\HTTP;
    
$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$usersTable = new UsersTable(new DbConnection());
$usersTable->insertAdmin($name, $email, $password);

HTTP::redirect("index.php", "success=1");

