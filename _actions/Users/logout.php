<?php 
    session_start();

    include_once("../../vendor/autoload.php");

    use Helpers\HTTP;
    use Helpers\CSRF;

    CSRF::verify_csrf($_POST['csrf_token'] ?? '');

    unset($_SESSION['user']);

    HTTP::redirect("index.php", "successLogout=1");

