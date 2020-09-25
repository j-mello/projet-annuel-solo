<?php

use secretshop\core\Helper;

?>
<h1 class="text-center"> Panier </h1>
<br>
<div class="container row">
    <?php $this->addModal('show_cart', $products); ?>
</div>
<div class='text-center'>
<a href="<?= Helper::getUrl('Checkout','default') ?>" class='btn btn-warning'>Paiement</a>
</div>