<?php 
session_start();

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\UsersTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$userTable = new UsersTable(new DbConnection());
$userTable->update($id, $name, $email);

HTTP::redirect("users.php", "successUpdating=1");
