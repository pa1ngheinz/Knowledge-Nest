<?php 
session_start();

include("../../vendor/autoload.php");

use Database\DbConnection;
use Database\UsersTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$role = (int)$_POST['role'];

$UsersTable = new UsersTable(new DbConnection());
$UsersTable->insert($name,$email,$password, $role);

HTTP::redirect("users.php", "successAdding=1");
