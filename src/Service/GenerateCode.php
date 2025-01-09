<?php

namespace App\Service;
 
class GenerateCode{
 
    public static function code($n = 7){
 
        $str = "";
 
        for ($i=0; $i < $n; $i++) {
            $str .= chr( rand(0, 25) + 65 );
        }
        return $str;
    }
}