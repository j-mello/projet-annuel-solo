<div>
    <h1><?= $data['title'] ?></h1>
    <p>
        <?php foreach($data['body'] as $sentence): ?>
            <?= $sentence?> <br>
        <?php endforeach; ?>
    </p>
</div>