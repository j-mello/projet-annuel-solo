<?php

namespace secretshop\core\exceptions;

class UnauthorizedException extends ExceptionHandler
{
    public function __construct($message = "Non autorisé", $code = 401)
    {
        parent::__construct($message, $code);
    }
    
}