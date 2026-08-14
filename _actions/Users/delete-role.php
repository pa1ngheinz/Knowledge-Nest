<?php 
session_start();

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\RolesTable;
use Helpers\HTTP;
use Helpers\CSRF;

CSRF::verify_csrf($_POST['csrf_token'] ?? '');

$rolesTable = new RolesTable(new DbConnection());

$id = $_POST['id'];

$rolesTable->delete($id);

HTTP::redirect("roles.php", "successDeleting=1");

