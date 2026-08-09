<?php

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\UsersTable;
use Helpers\HTTP;

$usersTable = new UsersTable(new DbConnection());

$email = $_POST['email'];
$password = md5($_POST['password']);

$user = $usersTable->getByEmailAndPassword($email, $password);

if($email === $user->email and $password === $user->password){
    $_SESSION['user'] = $user;

    HTTP::redirect("home.php");
}else{
    HTTP::redirect("index.php", "error=1");
}
