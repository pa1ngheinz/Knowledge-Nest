<?php 

namespace Helpers;

use Helpers\HTTP;

class Auth {
    public static function check(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }else{
            HTTP::redirect("index.php", "unauthenticated=1");
        }
    }
}