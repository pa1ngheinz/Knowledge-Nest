<?php 
    session_start();

    include_once("../../vendor/autoload.php");

    use Helpers\HTTP;

    unset($_SESSION['user']);

    HTTP::redirect("index.php", "successLogout=1");

