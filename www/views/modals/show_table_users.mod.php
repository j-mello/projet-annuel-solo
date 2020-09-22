<table class='dashboard'>
    <th>
        <?php   use secretshop\managers\RoleManager;
                use secretshop\models\User;
                use secretshop\core\Helper;

        foreach ($data["colonnes"] as $name => $colonnes):?>
            <?php if($colonnes != "Id"): ?>
                <td><?= $colonnes ?></td>
            <?php else: ?>
                <td hidden="hidden"><?= $colonnes ?></td>
            <?php endif; ?>
        <?php endforeach; ?>
    </th>
    <tbody>
    <?php foreach ($data["fields"] as $categorie => $elements):?>
        <?php foreach ($elements as $key => $fields): ?>
            <form method="POST" action="<?= Helper::getUrl('Admin', 'listUser') ?>">
                <tr>
                    <?php foreach ($fields as $key => $field):
                        if($fields['idRole'] != 3):
                        $user = new User();
                        $roleManager = new RoleManager();
                        $user = $user->hydrate($fields);
                        $role = $roleManager->find($user->getIdRole()); ?>

                    <?php if($key != "id" && $key != "idRole"): ?>
                        <td><?= $field ?></td>
                        <?php elseif ($key == "id"): ?>
                        <td><input hidden="hidden" type="number" value="<?= $fields[$key] ?>" name="<?= $key ?>"/></td>
                        <?php else : ?>
                        <td><?= $role->getCaption() ?></td>
                      <?php endif;
                      endif;
                            endforeach; ?>


                        <?php if($fields['idRole'] == 1): ?>
                            <td><input type="radio" value="2" name="role"/>Client</td>
                            <td><input type="radio" value="3" name="role"/>Inactif</td>
                            <td><input type="submit" value="Enregistrer"/></td>
                        <?php elseif($fields['idRole'] == 2): ?>
                            <td><input type="radio" value="1" name="role">Admin</input></td>
                            <td><input type="radio" value="3" name="role">Inactif</input></td>
                            <td><input type="submit" value="Enregistrer"/></td>
                        <?php elseif($fields['idRole'] == 3): ?>
                            <td><input type="radio" value="1" name="role">Admin</input></td>
                            <td><input type="radio" value="2" name="role">Client</button></td>
                            <td><input type="submit" value="Enregistrer"/></td>
                        <?php endif; ?>
                </tr>
            </form>
        <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
</table>