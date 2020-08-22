<?php

namespace secretshop\core\tools;

class Token
{
    public static function getToken()
    {
        $token = '';
        for($i = 0; $i < 15; $i++)
        {
            $token .= mt_rand(0,9);
        }
        return sha1($token);
    }
}