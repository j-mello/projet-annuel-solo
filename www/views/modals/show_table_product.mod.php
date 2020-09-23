<table>
    <th>
        <?php
            use secretshop\managers\CategoryManager;
            use secretshop\models\Product;
            use secretshop\core\Helper;

            foreach($data['colonnes'] as $name => $colonnes): ?>
                <?php if ($colonnes != 'Id'): ?>
                    <td><?= $colonnes ?></td>
                <?php else: ?>
                    <td hidden='hidden'><?= $colonnes ?></td>
                <?php endif;?>
        <?php endforeach;?>
    </th>
    <tbody>
    <?php foreach ($data["fields"] as $categorie => $elements):?>
        <?php foreach ($elements as $key => $fields): ?>
            <form method='POST' action='<?= Helper::getUrl('Product', 'deleteProduct') ?>'>
                <tr>
                    <?php foreach ($fields as $key => $field): ?>
                    <?php endforeach; ?>
                </tr>
            </form>
    </tbody>

</table>