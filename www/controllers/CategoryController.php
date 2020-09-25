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
                if (!isset($_SESSION['errors'])) {
                    $_SESSION['errors'] = [];
                }
                $_SESSION['errors'][$configFormAddCategory['config']['actionName']] = $validator->checkForm($configFormAddCategory, $_POST, $_FILES);
                if (empty($_SESSION['errors'][$configFormAddCategory['config']['actionName']]))
                {
                    $categoryArray = $_POST;
                    $category = new Category();
                    $category = $category->hydrate($categoryArray);
                    $categoryManager = new CategoryManager();
                    $categoryManager->save($category);
                } else {
                    $this->redirectTo('Admin', 'addCategory');
                    exit();
                }
                $this->redirectTo('Admin', 'default');
            }
        } else {
            Helper::redirectTo('Home','default');
        }
    }
}
