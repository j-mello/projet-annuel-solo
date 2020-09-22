<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;
use secretshop\forms\CategoryAddForm;
use secretshop\forms\ProductAddForm;
use secretshop\managers\CategoryManager;

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
        $categories = $categoriesManager->findAll();
        $configFormProduct = ProductAddForm::getForm($categories);
        $myView = new View('admin/addProduct', 'admin');
        $myView ->assign("configFormProduct", $configFormProduct);
    }

    public function deleteProductAction()
    {
        echo 'Voilà';
    }

    public function listUserAction()
    {
        echo 'Coucou';
    }

}