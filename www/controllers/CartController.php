<?php

namespace secretshop\controllers;

use secretshop\core\Controller;
use secretshop\core\Helper;
use secretshop\core\View;
use secretshop\managers\ProductManager;
use secretshop\models\Product;

class CartController extends Controller
{

    public function defaultAction()
    {

        if ($_SESSION['idRole'] == 1 || $_SESSION['idRole'] == 2)
        {
            $view = new View('cart','front');
            $productManager = new ProductManager();
            $products = [];
            foreach($_SESSION['panier'] as $productId) {
                $product = $productManager->find($productId);
                $products[] = $product;
            }
            $productsTable = Product::showProductTable($products);
            $view->assign('products',$productsTable);
        } else {
            Helper::redirectTo('Home','default');
        }
    }

    public function addToCartAction()
    {
        if ($_SESSION['idRole'] == 1 || $_SESSION['idRole'] == 2)
        {
            $error = false;
            if (!isset($_POST['id'])) {
                $error = "Aucun id renseigné";
            }
            if (!$error) {
                $id = $_POST['id'];
                $productManager = new ProductManager();
                $product = $productManager->find($id);
                if ($product == null) {
                    $error = "Ce produit n'existe pas";
                }
            }
            if (!$error) {

                if (Helper::productInCart($id)) $error = "Ce produit est déjà dans le panier";
            }
            if ($error) {
                die($error);
            }
            $_SESSION['panier'][] = $id;
            Helper::redirectTo('Cart', 'default');
        } else {
            Helper::redirectTo('Home','default');
        }



    }

    public function removeFromCartAction()
    {
        if ($_SESSION['idRole'] == 1 || $_SESSION['idRole'] == 2)
        {
            $error = false;
            if (!isset($_POST['id'])) {
                $error = "Aucun id renseigné";
            }
            if (!$error) {
                $id = $_POST['id'];
                $deleted = false;
                for($i=0;$i<count($_SESSION['panier']);$i++) {
                    if ($id == $_SESSION['panier'][$i]) {
                        array_splice($_SESSION['panier'],$i,1);
                        $deleted = true;
                        break;
                    }
                }
                if (!$deleted) {
                    $error = "Cet élément n'existe pas dans le panier";
                }
            }
    
            if ($error) {
                die ($error);
            }
            Helper::redirectTo('Cart', 'default');
        } else {
            Helper::redirectTo('Home','default');
        }
    }
}