<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;

class HomeController extends Controller
{
    public function defaultAction()
    {
        new View('home','front');
    }
}