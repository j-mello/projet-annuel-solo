<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\View;
use secretshop\forms\CategoryAddForm;

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
        //$myView->assign('toto', 'toto');
    }

    public function addProductAction()
    {
        echo'coucou';
    }
}