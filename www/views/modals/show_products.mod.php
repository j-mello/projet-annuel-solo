<?php foreach($data["fields"] as $categorie => $elements): ?>
    <?php foreach($elements as $key => $fields): ?>
        <div class="col-lg-4 col-md-6">
            <div class="single-product">
                    <img class="img-fluid" src="<?= $fields['image'] ?>" alt="" height="400px" width="400px">
                <div class="product-details">
                    <h6><?= $fields['name'] ?></h6>
                    <p><?= $fields['resume'] ?></p>
                    <div class="price">
                        <h6><s><?= $fields['formerPrice'] ?> €</s></h6>
                    </div>
                    <div class="price">
                        <h6><?= $fields['price'] ?></h6>
                    </div>
                    <div class="prd-bottom d-flex justify-content-around">
                        <form action="#" method="POST">
                            <input type="hidden" name="id" value="<?= $fields['id'] ?>">
                            <input type="hidden" name="name" value="<?= $fields['name'] ?>">
                            <input type="hidden" name="price" value="<?= $fields['price'] ?>">
                            <button type="submit" class='primary-btn'>
                                Ajouter au panier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endforeach; ?>