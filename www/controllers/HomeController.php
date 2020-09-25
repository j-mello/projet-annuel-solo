<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Helper;
use secretshop\core\Validator;
use secretshop\core\View;
use secretshop\forms\MailForm;
use secretshop\forms\RegisterForm;
use secretshop\managers\MailManager;
use secretshop\models\Mail;

class HomeController extends Controller
{
    public function defaultAction()
    {
        $configFormMail = MailForm::getForm();
        $myView = new View('home','front');
        $myView->assign("configFormMail", $configFormMail);
    }

    public function registerAction()
    {
        $configFormRegister = RegisterForm::getForm();
        $myView = new View('register', 'front');
        $myView->assign("configFormRegister", $configFormRegister);
    }

    public function emailAction()
    {
        $configFormMail = MailForm::getForm();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $validator = new Validator();
            if (!isset($_SESSION['errors'])) {
                $_SESSION['errors'] = [];
            }
            $_SESSION['errors'][$configFormMail['config']['actionName']] = $validator->checkForm($configFormMail, $_POST, $_FILES);
            if(empty($_SESSION['errors'][$configFormMail['config']['actionName']]))
            {
                $mailArray = $_POST;
                $mail = new Mail();
                $mail = $mail->hydrate($mailArray);

                $mailManager = new MailManager();
                $mailManager->save($mail);
            } else {
                Helper::redirectTo('Home', 'default');
                exit();
            }
            $this->redirectTo('Home','default');
        }
    }
}