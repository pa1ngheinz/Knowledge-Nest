<?php 
    namespace Helpers;

    class XSS {
        static function prevent($value){
            return htmlspecialchars($value, ENT_QUOTES);
        }
    }