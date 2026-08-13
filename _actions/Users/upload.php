<?php
    session_start();
    include_once("../../vendor/autoload.php");

    use Database\DbConnection;
    use Database\UsersTable;

    $usersTable = new UsersTable(new DbConnection());

    $id = $_POST['id'];
    $name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if($error !== UPLOAD_ERR_NO_FILE){
        if($type === "image/jpeg" or $type === "image/png"){
            $usersTable->updatePhoto($id,$name);

            $result = $usersTable->getOne($id);

            $_SESSION['user']->image = $result->image;
            
            move_uploaded_file($tmp_name, "../../images/$name");
        }
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
    
    
    
    

