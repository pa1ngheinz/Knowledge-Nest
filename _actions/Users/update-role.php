<?php 
session_start();

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\RolesTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$id = $_POST['id'];
$name = $_POST['name'];
$value = $_POST['value'];

$rolesTable = new RolesTable(new DbConnection());
$rolesTable->update($id, $name, $value);

HTTP::redirect("roles.php", "successUpdating=1");
