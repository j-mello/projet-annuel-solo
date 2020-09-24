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
use secretshop\forms\LoginForm;
use secretshop\forms\RegisterForm;
use secretshop\forms\NewPasswordForm;
use secretshop\forms\ForgotPasswordForm;
use secretshop\managers\UserManager;
use secretshop\models\User;
use secretshop\core\View;

class UserController extends Controller
{
    public function defaultAction()
    {
        echo 'Bouh !';
    }
    
    public function indexAction()
    {
        $id = ['id'=>$_SESSION['id']];
        $userManager = new UserManager();
        $user = $userManager->findBy($id);
        $configFormUser = User::showUserTable($user);
        $myView = new View("profile", "front");
        $myView->assign('configFormUser', $configFormUser);
    }

    public function listAction()
    {
        $userManager = new UserManager();
        $users = $userManager->findAll();
        $configTableUser = User::showUserTable($users);
        $myView = new View("admin/user/", "admin");
        $myView->assign("configTableUser", $configTableUser);
    }

    public function loginAction()
    {
        Helper::checkDisconnected();
        $configFormUser = LoginForm::getForm();
        $myView = new View("login", 'front');
        $myView->assign("configFormUser", $configFormUser);

        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $validator = new Validator();
            $errors = $validator->checkForm($configFormUser, $_POST);
            if(empty($errors))
            {
                // Verification du password en le cryptant
                $_POST['password'] = sha1($_POST['password']);
                $userManager = new UserManager();
                $user = $userManager->findBy($_POST);
                if (count($user) == 1)
                {
                    if($user[0]->getIdRole()!= 3)
                    {
                        // Utilisateur trouvé et validé, on crée une session
                        $_SESSION['id'] = $user[0]->getId();
                        $_SESSION['idRole'] = $user[0]->getIdRole();
                        $_SESSION['prenom'] = $user[0]->getPrenom();
                        $_SESSION['token'] = Token::getToken();
                        $_SESSION['panier'] = [];
                        $userManager = new UserManager();
                        $userManager->manageUserToken($_SESSION['id'], $_SESSION['token']);
                    } else {
                        echo 'Merci de valider votre email afin de vous connecter';
                    }
                } else {
                    echo 'Veuillez valider votre mail';
                }
            } else {
                echo "Identifiant ou/et mot de passe incorrect";
            }
        }
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
                echo '<pre>';
                print_r($userArray);
                echo '</pre>';

                $user = $user->hydrate($userArray);
                $user->setIdRole(3);
                //echo '<pre>';
                //print_r($user);
                //echo '</pre>';
                //die('coucou');
                $userManager = new UserManager();
                $userManager-> save($user);

                // Preparation et envoi de l'email

                $this->sendMailAccountConfirmation($user->getEmail(), $user->getToken(),$user->getPrenom());

                // En attente de la validation du mail
                $_SESSION["newUser"] = 1;
                $this->redirectTo("User", "registerConfirm");

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
                }
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

    public function forgotPasswordAction()
    {
        Helper::checkDisconnected();
        $configFormUser = ForgotPasswordForm::getForm();
        $myView = new View("forgot_password", "front");
        $myView->assign("configFormUser", $configFormUser);

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $validator = new Validator();
            $errors = $validator->checkForm($configFormUser, $_POST);
            if (empty($errors))
            {
                $requete = new QueryBuilder(User::class, 'user');
                $requete->querySelect(["id"]);
                $requete->queryWhere("email", "=", $_POST['email']);
                $result = $requete->queryGget();
                if (!empty($result))
                {

                    $token = Token::getToken();
                    $userManager = new UserManager();
                    $userManager->manageUserToken($result["id"],$token);
                    $url = URL_HOST.Helper::getUrl("User","newPassword")."?id=".urlencode($result["id"])."&token=".urlencode($token);
                    $configMail = ForgotPasswordMail::getMail($_POST['email'],$url);
                    $mail = new Mail();
                    $mail->sendMail($configMail);
                }
            }
            else
                print_r($errors);
        }
    }
    public function newPasswordAction()
    {
        Helper::checkDisconnected();
        $configFormUser = NewPasswordForm::getForm();
        if(!empty($_GET['id']) && !empty($_GET['token']))
        {
            $requete = new QueryBuilder(User::class, 'user');
            $requete->querySelect(["id"]);
            $requete->queryWhere("id", "=", htmlspecialchars(urldecode($_GET['id'])));
            $requete->queryWhere("token", "=", htmlspecialchars(urldecode($_GET['token'])));
            $result = $requete->queryGget();
            if (!empty($result))
            {
                $myView = new View("new_password", "front");
                $myView->assign("configFormUser", $configFormUser);
                $userManager = new UserManager();
                $userManager->manageUserToken($result["id"],0);
                $_SESSION["idPassword"] = $result["id"];
            }
            else
            {
                $message = Message::linkNoValid();
                $view = new View("message", "front");
                $view->assign("message",$message);
            }
        }
        else
        {
            if(empty($_SESSION["idPassword"]))
                die("erreurs");
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_SESSION["idPassword"]))
        {
            $validator = new Validator();
            $errors = $validator->checkForm($configFormUser, $_POST);
            if (empty($errors))
            {
                $user = new User();
                $user->setPassword($_POST["password"]);
                $user->setId($_SESSION["idPassword"]);
                $userManager = new UserManager();
                $userManager->save($user);
                unset($_SESSION["idPassword"]);
                $message = message::newPasswordSucess();
                $view = new View("message", "front");
                $view->assign("message",$message);
            }
            else
            {
                print_r($errors);
                $myView = new View("newPassword", "front");
                $myView->assign("configFormUser", $configFormUser);
            }
        }
    }

    public function deleteAction()
    {
        //la supression du compte d'un utilisateur désactive le compte et le déconnecte
        if(!empty($_SESSION["id"]))
        {
            $userManager = new UserManager();
            $userManager->manageUserToken($_SESSION['id'],0,["idRole"=>3]);
            session_destroy();
            $this->redirectTo("Home","default");
        }
        //la suppresion de compte par un admin permet de supprimer le compte en db
        if(!empty($_SESSION["role"]) && !empty($_GET["idDelete"]) && $_SESSION['role'] == 1)
        {
            $userManager = new UserManager();
            $userManager->delete($_GET["idDelete"]);
        }
    }
}