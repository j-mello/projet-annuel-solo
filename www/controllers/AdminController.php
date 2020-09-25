<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;
use secretshop\forms\CategoryAddForm;
use secretshop\forms\ProductAddForm;
use secretshop\managers\CategoryManager;
use secretshop\managers\ProductManager;
use secretshop\managers\UserManager;
use secretshop\models\Product;
use secretshop\models\User;
use secretshop\core\Helper;

class AdminController extends Controller
{
    public function defaultAction()
    {
        if ($_SESSION['idRole'] == 1)
        {
            new View('admin/home','admin');
        } else {
            Helper::redirectTo('Home','default');
        }
    }

    public function addCategoryAction()
    {
        if ($_SESSION['idRole'] == 1)
        {
            $configFormCategory = CategoryAddForm::getForm();
            $myView = new View('admin/category', 'admin');
            $myView->assign("configFormCategory", $configFormCategory);
        } else {
            Helper::redirectTo('Home','default');
        }

    }

    public function addProductAction()
    {
        if ($_SESSION['idRole'] == 1)
        {
            $categoriesManager = new CategoryManager();
            $categories = $categoriesManager->getSelect();
            $configFormProduct = ProductAddForm::getForm($categories);
            $myView = new View('admin/addproduct', 'admin');
            $myView ->assign("configFormProduct", $configFormProduct);
        } else {
            Helper::redirectTo('Home','default');
        }

    }

    public function deleteProductAction()
    {
        if ($_SESSION['idRole'] == 1)
        {
            $productManager = new ProductManager();
            $products = $productManager->findAll();
            $configTableProduct = Product::showProductTable($products);
            $myView = new View('admin/deleteproduct', 'admin');
            $myView->assign("configTableProduct", $configTableProduct);
        } else {
            Helper::redirectTo('Home','default');
        }

    }

    public function listUserAction()
    {
        if ($_SESSION['idRole'] == 1)
        {
            $userManager = new UserManager();
            $users = $userManager->findAll();
            $configTableUser = User::showUserTable($users);
            $myView = new View('admin/listuser','admin');
            $myView->assign("configTableUser", $configTableUser);
        } else {
            Helper::redirectTo('Home','default');
        }
    }

}