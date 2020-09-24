<?php

use secretshop\core\Helper;

foreach($data['fields'] as $categorie => $elements): ?>
    <?php foreach($elements as $key => $fields): ?>
        </pre>
        <div class="card mx-5 mb-5" style="width: 18rem;">
            <img class="card-img-top" src="<?= $fields['image'] ?>" style="width: 18rem; height: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Nom du produit : <?= $fields['name'] ?></h5>
                <p class="card-text">Prix : <?= $fields['price'] ?> €</p>
                <form action="<?= Helper::getUrl('Cart','removeFromCart') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $fields['id'] ?>">
                    <button type="submit" class='primary-btn'>
                        Enlever du panier   
                    </button>
                </form>
            </div>
        </div>

    <?php endforeach; ?>
<?php endforeach; ?>