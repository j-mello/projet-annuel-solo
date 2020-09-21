<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Validator;
use secretshop\core\View;
use secretshop\forms\MailForm;
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

    public function emailAction()
    {
        $configFormMail = MailForm::getForm();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $validator = new Validator();
            $errors = $validator->checkForm($configFormMail, $_POST);
            if(empty($errors))
            {
                $mailArray = array($_POST);
                $mail = new Mail();
                $mail = $mail->hydrate($mailArray);
                $mailManager = new MailManager();
                $mailManager->save($mail);
            }
        }
    }
}