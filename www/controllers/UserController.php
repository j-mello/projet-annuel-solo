<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Helper;
use secretshop\core\QueryBuilder;
use secretshop\core\tools\Token;
use secretshop\core\tools\Message;
use secretshop\mails\Mail;
use secretshop\mails\ConfirmAccountMail;
use secretshop\mails\ForgotPasswordMail;
use secretshop\core\Validator;
use secretshop\forms\RegisterForm;
use secretshop\managers\UserManager;
use secretshop\models\User;

class UserController extends Controller
{
    
    public function indexAction()
    {
        $id = ['id'=>$_SESSION['id']];
        $userManager = new UserManager();
        $user = $userManager->findBy($id);
        $configFormUser = User::showUserTable($user);
        $myView = new View("profile", "shop");
        $myView->assign('configFormUser', $configFormUser);
    }

    public function listAction()
    {
        $userManager = new UserManager();
        $users = $userManager->findAll();
        $configTableUser = User::showUserTable($users);
        $myView = new View("admin/user/list", "admin");
        $myView->assign("configTableUser", $configTableUser);
    }

    public function registerAction()
    {
        Helper::checkDisconnected();
        $configFormUser = RegisterForm::getForm();
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $validator = new Validator();
            $errors = $validator->checkForm($configFormUser, $_POST);
            if(empty($errors))
            {
                // Enregistrement de l'utilisateur
                $userArray = array_merge($_POST,array("token"=> Token::getToken()));
                $user = new User();
                $user = $user->hydrate($userArray);
                $userManager = new UserManager();
                $userManager-> save($user);

                // Preparation et envoi de l'email

                $this->sendMailAccountConfirmation($user->getEmail(), $user->getToken(),$user->getFirstName());

            }
        }
    }

    public function registerConfirmAction()
    {
        Helper::checkDisconnected();
        if(!empty($_GET['key']) && !empty($_GET['token']))
        {
            // Acces à la page des paramètres
            // Recherche en db d'un utilisateur matchant la key et le token
            $request = new QueryBuilder(User::class, 'user');
            $request->querySelect(['id','idRole']);
            $request->queryWhere("email","=", htmlspecialchars(urldecode($_GET['key'])));
            $request->queryWhere("token","=", htmlspecialchars(urldecode($_GET['token'])));
            $result = $request->queryGget();
            if(!empty($result))
            {
                if ($result['idRole'] == 3)
                {
                    // Si utilisateur trouvé et role 3 (inactif), on le valide en client
                    $userManager = new UserManager();
                    $userManager->manageUserToken($result['id'],0,['idRole'=>2]);
                    $message = Message::mailInscriptionSucess();
                    $view = new View("message","front");
                    $view->assign("message", $message);
                    } else {
                        die ("Votre compte est déjà validé.");
                    }
                } else {
                    die("Le lien n'est pas valide.");
                } else {
                    if (!empty($_SESSION["newUser"]) && $_SESSION["newUser"] == 1)
                    {
                        //acces à la page sans parametres (juste apres l'inscription quand l'email n'est pas encore validé)
                        //new View("registerConfirm", "front");
                        $message = message::InscriptionSucess();
                        $view = new View("message", "front");
                        $view->assign("message",$message);
                        unset($_SESSION["newUser"]);
                    } else {
                        $this->redirectTo("Errors","lost");
                    }
                }
        } 
    }

    public function logoutAction()
    {
        // Destruction de la session et init du token
        $userManager = new UserManager();
        $userManager->manageUserToken($_SESSION['id'], 0);
        session_destroy();
        $this->redirectTo('Home','default');
    }

    public function sendMailAccountConfirmation($key, $value, $name)
    {
        $url = URL_HOST.Helper::getUrl("User","registerConfirm")."?key=".urlencode($key)."&token=".urlencode($value);
        $configMail = ConfirmAccountMail::getMail($key, $name, $url);
        $mail = new Mail();
        $mail->sendMail($configMail);

    }
}