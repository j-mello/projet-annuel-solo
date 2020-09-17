<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;

class AdminController extends Controller
{
    public function defaultAction()
    {
        new View('home','admin');
    }
}