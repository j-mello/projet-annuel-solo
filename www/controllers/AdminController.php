<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;
use secretshop\forms\CategoryAddForm;
use secretshop\forms\ProductAddForm;
use secretshop\managers\CategoryManager;
use secretshop\managers\UserManager;
use secretshop\models\User;

class AdminController extends Controller
{
    public function defaultAction()
    {
        new View('admin/home','admin');
    }

    public function addCategoryAction()
    {
        $configFormCategory = CategoryAddForm::getForm();
        $myView = new View('admin/category', 'admin');
        $myView->assign("configFormCategory", $configFormCategory);
    }

    public function addProductAction()
    {
        $categoriesManager = new CategoryManager();
        $categories = $categoriesManager->getSelect();
        $configFormProduct = ProductAddForm::getForm($categories);
        $myView = new View('admin/addproduct', 'admin');
        $myView ->assign("configFormProduct", $configFormProduct);
    }

    public function deleteProductAction()
    {
        echo 'Voilà';
    }

    public function listUserAction()
    {
        $userManager = new UserManager();
        $users = $userManager->findAll();
        $configTableUser = User::showUserTable($users);
        /*echo '<pre>';
        print_r($configTableUser);
        echo '</pre>';*/
        $myView = new View('admin/listuser','admin');
        $myView->assign("configTableUser", $configTableUser);
    }

}