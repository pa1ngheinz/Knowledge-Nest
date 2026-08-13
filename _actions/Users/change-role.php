<?php 
    session_start();

    include_once("../../vendor/autoload.php");

    use Database\DbConnection;
    use Database\UsersTable;
    use Helpers\HTTP;

    $currentUser = $_SESSION['user'];

    $usersTable = new UsersTable(new DbConnection());

    $id = (int)$_GET['id'];
    $value = (int)$_GET['value'];

    if($id === $currentUser->id && $value === 1){
        HTTP::redirect("users.php", "risk=1");
    }

    $usersTable->updateRole($id, $value);

    if($id === $currentUser->id){
        $result = $usersTable->getOne($id);

        $currentUser->role = $result->role;

        var_dump($result);
    }

    HTTP::redirect("users.php", "successRoleChange=1");

