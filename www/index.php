<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
session_start();

use secretshop\core\ConstantLoader;
use secretshop\core\MiddleWareManager;
use secretshop\core\Router;

function myAutoloader($class)
{
    $class = str_replace('secretshop','',$class);
    $class = str_replace('\\','/', $class).'.php';
    if($class[0] == '/')
        $class = substr($class, 1);
    if (file_exists($class))
        include ($class);
}

spl_autoload_register('myAutoloader');

new ConstantLoader();

$uri = $_SERVER["REQUEST_URI"];
MiddleWareManager::launch('onRequest');
new Router();