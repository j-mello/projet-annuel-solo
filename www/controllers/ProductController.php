<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Validator;
use secretshop\core\View;
use secretshop\forms\ProductAddForm;
use secretshop\managers\CategoryManager;
use secretshop\managers\ProductManager;
use secretshop\models\Product;

class ProductController extends Controller
{

    public function addAction()
    {
        //Helper::checkAdmin()
        $categoriesManager = new CategoryManager();
        $categories = $categoriesManager->getSelect();
        $configFormAddCategory = ProductAddForm::getForm($categories);
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $validator = new Validator();
            $errors = $validator->checkForm($configFormAddCategory, $_POST);
            if (empty($errors))
            {
                $productArray = $_POST;
                $files = $_FILES;
                echo "<pre>";
                print_r($productArray);
                echo "</pre>";
                $product = new Product();
                $product = $product->hydrate($productArray, $files);
                $productManager = new ProductManager();
                $productManager->save($product);
            } else {
                print_r($errors);
                die ("ERRORS");
            }
            $this->redirectTo('Admin', 'default');
        }
    }
}