<?php 

include("../../vendor/autoload.php");

use Database\DbConnection;
use Database\UsersTable;

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$UsersTable = new UsersTable(new DbConnection());
$UsersTable->insert($name,$email,$password);

header("Location: ../../index.php");