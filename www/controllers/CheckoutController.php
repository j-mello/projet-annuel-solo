<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Helper;
use secretshop\core\View;
use secretshop\managers\ProductManager;

class CheckoutController extends Controller
{
    public function defaultAction()
    {
        if ($_SESSION['idRole'] == 1 || $_SESSION['idRole'] == 2)
        {
            $view = new View('payment','front');
            
            $productManager = new ProductManager();
            $totalPrice = 0;
            $products = [];
            foreach($_SESSION['panier'] as $id) {
                $product = $productManager->find($id);
                $products[] = $product;
                $totalPrice += $product->getPrice();
            }

            $view->assign("products", $products);
            $view->assign("totalPrice", $totalPrice);
        } else {
            Helper::redirectTo('Home','default');
        }
    }


    public function paymentAction()
    {

        require_once('./www/config.php');
        if($_SERVER['REQUEST_METHOD']== 'POST')
        {
            $token = $_POST['stripeToken'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];

            $customer = \Stripe\Customer::create([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'source' => $token,
            ]);

            $charge = \Stripe\Charge::create([
                'customer' => $customer->id,
                'amount' => $_POST['price']*100,
                'currency' => 'eur',
            ]);

        } else {
            Helper::redirectTo('Home','default');
        }
    }

    public function successAction()
    {
        if ($_SESSION['idRole'] == 1 || $_SESSION['idRole'] == 2)
        {
            $view = new View('success','front');
        } else {
            Helper::redirectTo('Home','default');
        }
    }
}