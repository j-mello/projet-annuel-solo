<?php

namespace secretshop\core\exceptions;
use secretshop\core\View;

class ExceptionHandler extends \Exception implements \Throwable
{
    protected $message;
    protected $code;

    public function __construct($message, $code = 0) 
    {
		parent::__construct($message, $code);
		if ($code == 0){
			$vue = new View('lost', 'front');
		}else{
			$vue = new View(strval($code), 'front');
		}
        $vue->assign("error", $message);
    }

    public function to_string()
    {
        return $this->message;
    }

}