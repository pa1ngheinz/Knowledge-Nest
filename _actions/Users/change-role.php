<?php 
    session_start();

    include_once("../../vendor/autoload.php");

    use Database\DbConnection;
    use Database\UsersTable;
    use Helpers\HTTP;
    use Helpers\CSRF;

    CSRF::verify_csrf($_POST['csrf_token'] ?? '');

    $currentUser = $_SESSION['user'];

    $usersTable = new UsersTable(new DbConnection());

    $id = (int)$_POST['id'];
    $value = (int)$_POST['value'];

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

