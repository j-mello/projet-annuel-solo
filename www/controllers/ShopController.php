<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;
use secretshop\managers\ProductManager;
use secretshop\models\Product;

class ShopController extends Controller
{
    public function defaultAction()
    {
        $productManager = new ProductManager;
        $products = $productManager->findAll();
        $productTable = Product::showProductTable($products);
        $myView = new View('shop', 'front');
        $myView->assign('productTable', $productTable);
        
    }
}