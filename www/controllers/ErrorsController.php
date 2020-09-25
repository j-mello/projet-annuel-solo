<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;

class ErrorsController extends Controller
{
    public function lostAction()
    {
        $view = new View('lost','front');
    }
}