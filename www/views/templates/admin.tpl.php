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
    </header>

    <main class="dashboard-content">
      <?php include "views/".$this->view.".view.php";?>
    </main>

</body>
</html>