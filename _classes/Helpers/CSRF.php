<?php 
    namespace Helpers;

    class CSRF {
        static function csrf_token(){
            if(empty($_SESSION['csrf_token'])){
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }

            return $_SESSION['csrf_token'];
        }

        static function verify_csrf($token){
            if(empty($token) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)){
                die("CSRF validation failed!");
            }
        }
    }
