<?php 

include_once("../../vendor/autoload.php");

use Database\DbConnection;
use Database\RolesTable;
use Helpers\HTTP;

$rolesTable = new RolesTable(new DbConnection());

$id = $_GET['id'];

$rolesTable->delete($id);

HTTP::redirect("roles.php", "successDeleting=1");

