<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
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
            $errors = $validator->checkForm($configFormMail, $_POST);
            if(empty($errors))
            {
                $mailArray = $_POST;
                //var_dump($mailArray);
                //echo '<br>';
                //echo $mailArray['email'];
                //echo '<br>';
                $mail = new Mail();
                $mail = $mail->hydrate($mailArray);
                //var_dump($mail);
                $mailManager = new MailManager();
                $mailManager->save($mail);
            }
            $this->redirectTo('Home','default');
        }
    }
}