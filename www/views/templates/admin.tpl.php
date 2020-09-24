<?php

use secretshop\core\Helper;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://kit.fontawesome.com/b6184cc755.js" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Secret Shop</title>

    <!-- Custom styles for this template -->
    <link href="/script/css/admin/style.css" rel="stylesheet">

</head>
<body>
<header>
      <div class="header header-back">
        <ul>
            <li>Dashboard</li>
        </ul>
      </div>
      </header>

      <div class="sidebar">
        <nav>
          <ul>
            <li><a href="<?= Helper::getUrl('Admin', 'listUser') ?>"  class="linkDashboard "><i class="fas fa-columns"></i>Utilisateurs</a></li></li>
            <li><a href="<?= Helper::getUrl('Admin', 'addProduct') ?>"  class="linkDashboard "><i class="fas fa-columns"></i>Ajout produit</li>
            <li><a href="<?= Helper::getUrl('Admin', 'deleteProduct') ?>" class="linkDashboard "><i class="fas fa-columns"></i>Supprimez produit</li>
            <li><a href="<?= Helper::getUrl('Admin', 'addCategory') ?>"  class="linkDashboard "><i class="fas fa-columns"></i>Ajout catégorie</li>
          </ul>
          <ul>
            <li><a id="button-logout" href="<?= Helper::getUrl('Home','default') ?>"><i class="fas fa-sign-out-alt"></i></a></li>
          </ul>
        </nav>
      </div>
    

    <div id="container-dashboard">
      <?php include "views/".$this->view.".view.php";?>
    </div>

</body>
</html>