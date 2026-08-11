<?php 

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\UsersTable;
use Helpers\HTTP;

$usersTable = new UsersTable(new DbConnection());

$id = $_GET['id'];

$usersTable->delete($id);

HTTP::redirect("users.php", "successDeleting=1");

