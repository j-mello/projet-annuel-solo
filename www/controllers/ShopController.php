<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;
use secretshop\managers\ProductManager;

class ShopController extends Controller
{
    public function defaultAction()
    {
        $productManager = new ProductManager;
        $product = $productManager->findAll();
        echo'<pre>';
        print_r($product);
        echo '</pre>';
        echo 'Toto';
        $myView = new View('shop', 'front');
        
    }
}