<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Helper;
use secretshop\core\Validator;
use secretshop\forms\CategoryAddForm;
use secretshop\managers\CategoryManager;
use secretshop\models\Category;

class CategoryController extends Controller
{
    public function addAction()
    {
        if ($_SESSION['idRole'] == 1)
        {
            $configFormAddCategory = CategoryAddForm::getForm();
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $validator = new Validator();
                $errors = $validator->checkForm($configFormAddCategory, $_POST);
                if (empty($errors))
                {
                    $categoryArray = $_POST;
                    $category = new Category();
                    $category = $category->hydrate($categoryArray);
                    $categoryManager = new CategoryManager();
                    $categoryManager->save($category);
                }
                $this->redirectTo('Admin', 'default');
            }
        } else {
            Helper::redirectTo('Home','default');
        }
    }
}
