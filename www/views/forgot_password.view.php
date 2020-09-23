<?php 
    use secretshop\core\Helper;
?>
<h1>Mot de passe oublié</h1>
<br>
<?php $this->addModal("form", $configFormUser); ?>
<a href="<?= Helper::getUrl("Home", "default") ?>"  class='btn btn-primary'>Retour à l'accueil</a>