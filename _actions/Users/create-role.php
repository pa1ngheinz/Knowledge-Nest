<?php 
session_start();

include("../../vendor/autoload.php");

use Database\DbConnection;
use Database\RolesTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$rolesTable = new RolesTable(new DbConnection());

$name = $_POST['name'];
$value = $_POST['value'];

$rolesTable->insert($name,$value);


HTTP::redirect("roles.php", "successAdding=1");
