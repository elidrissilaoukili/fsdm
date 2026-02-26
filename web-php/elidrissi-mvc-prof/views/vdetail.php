<h1>Details <?= $element["id"] ?> la table <?= $module ?> </h1>

<hr /><br /><br />
<div>
    <?php foreach ($element as $key => $val): ?>
        <b><?= $key ?> : </b><?= $val ?> <br/>
    <?php endforeach; ?>

    <div>
        <a href="index.php?module=<?= $module ?>&action=edit&id=<?= $element["id"] ?>">
            Modifier
        </a>
        <a href="index.php?module=<?= $module ?>&action=delete&id=<?= $element["id"] ?>">
            Supprimer
        </a>
    </div>
</div>