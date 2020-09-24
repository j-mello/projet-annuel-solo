
<style>
    table {
        border-width:1px; 
        border-style:solid; 
        border-color:black;
        width:50%;
    }
    td { 
        border-width:1px;
        border-style:solid; 
        border-color:red;
        width:50%;
    }
</style>
<table>
    <tr>
        <?php
            use secretshop\managers\CategoryManager;
            use secretshop\models\Product;
            use secretshop\core\Helper;

            foreach($data['colonnes'] as $name => $colonnes): ?>
                <?php if ($colonnes != 'Id'): ?>
                    <th><?= $colonnes ?></th>
                <?php else: ?>
                    <th hidden='hidden'><?= $colonnes ?></th>
                <?php endif;?>
            <?php endforeach;?>
            <th></th>
    </tr>
    <tbody>
    <?php foreach ($data["fields"] as $categorie => $elements):?>
        <?php foreach ($elements as $key => $fields): ?>
                <tr>
                    <?php foreach ($fields as $key => $field): ?>
                        <?php if ($key != "id"): ?>
                        <td><?= $field ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td>
                        <form method='POST' action='<?= Helper::getUrl("Product", 'deleteProduct') ?>'>
                            <input name="id" type="hidden" value="<?= $fields['id'] ?>"/>
                            <input type="submit" value="Supprimer"/>
                        </form>
                    </td>
                </tr>
    </tbody>
    <?php endforeach; ?>
<?php endforeach; ?>

</table>