<?php

namespace secretshop\controllers;

use secretshop\core\Controller;

class ErrorsController extends Controller
{
    public function lostAction()
    {
        echo 'On est perdu !';
    }
}