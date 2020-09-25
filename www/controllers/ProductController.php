<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Helper;
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
        if ($_SESSION['idRole'] == 1)
        {
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
        } else {
            Helper::redirectTo('Home','default');
        }
    }

    public function deleteProductAction()
    {
        if ($_SESSION['idRole'] == 1)
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $error = false;
                if(!isset($_POST['id']))
                {
                    $error = "Aucun id renseigné";
                }
                if (!$error) {
                    $id = $_POST['id'];
                    $productManager = new ProductManager();
                    $product = $productManager->find($id);
                    if ($product == null) {
                        $error = "Ce produit n'existe pas";
                    }
                }
                if (!$error) {
                    $productManager->delete($id);
                }

                if ($error) 
                {
                    die($error);
                }
            }
            Helper::redirectTo('Admin','default');
        } else {
            Helper::redirectTo('Home','default');
        }
    }
}