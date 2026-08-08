<?php

namespace Helpers;

class HTTP
{
    public static $base = "http://localhost/knowledge-nest/";

    public static function redirect($path, $query = "")
    {
        $url = static::$base . $path;

        if ($query) {
            $url .= "?$query";
        }

        header("Location: $url");
        exit();
    }
}
