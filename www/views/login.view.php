<h1> Connexion </h1>

<div class='container-fluid'>
<?php

use secretshop\core\Helper;

$this->addModal("form", $configFormUser); 
?>
</div>


</br>
<a href="<?= Helper::getUrl('User','forgotPassword')?>" class='btn btn-primary justify-content-center'>Mot de passe oublié</a>
</br></br>
<a href="<?= Helper::getUrl('Home', 'default') ?>" class='btn btn-primary justify-content-center'>Retour à l'accueil</a>
<br>