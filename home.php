<?php 
    session_start();

    include_once("vendor/autoload.php");

    use Helpers\Auth;

    $currentUser = Auth::check();

    var_dump($currentUser);