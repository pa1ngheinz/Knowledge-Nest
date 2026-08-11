<?php 

include("../../vendor/autoload.php");

use Database\DbConnection;
use Database\RolesTable;
use Helpers\HTTP;

$rolesTable = new RolesTable(new DbConnection());

$name = $_POST['name'];
$value = $_POST['value'];

$rolesTable->insert($name,$value);


HTTP::redirect("roles.php", "successAdding=1");