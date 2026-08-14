<?php 
session_start();

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\UsersTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$usersTable = new UsersTable(new DbConnection());

$id = $_POST['id'];

$usersTable->delete($id);

HTTP::redirect("users.php", "successDeleting=1");

