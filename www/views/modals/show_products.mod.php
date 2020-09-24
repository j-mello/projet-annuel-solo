<?php

use secretshop\core\Helper;

foreach($data["fields"] as $categorie => $elements): ?>
    <?php foreach($elements as $key => $fields): ?>
        <div class="card mx-5 mb-5" style="width: 18rem;">
            <img class="card-img-top" src="<?= $fields['image'] ?>" style="width: 18rem; height: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Nom du produit : <?= $fields['name'] ?></h5>
                <p class="card-text">Description : <?= $fields['resume'] ?></p>
                <p class="card-text">Ancien prix : <s><?= $fields['formerPrice'] ?> €</s></p>
                <p class="card-text">Prix exclusif : <?= $fields['price'] ?></p>
                <?php if (!Helper::productInCart($fields['id'])): ?>
                <form action="<?= Helper::getUrl('Cart','addToCart') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $fields['id'] ?>">
                    <button type="submit" class='primary-btn'>
                        Ajouter au panier
                    </button>
                </form>
                <?php else:?>
                    <span>Un seul exemplaire peut-être acheté.</span>
                <?php endif; ?>
            </div>
        </div>

    <?php endforeach; ?>
<?php endforeach; ?>