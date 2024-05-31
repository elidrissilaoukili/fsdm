<?php include 'header-footer-side/header.php'; ?>

<body>
    <section class="container">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>Modifie etudiant</h1>
                <?php if ($data) : ?>
                    <form action="index.php?action=savemodifie&id=<?= htmlspecialchars($data->id); ?>&table=etudiant" method='post'>
                        <div>ID:</div>
                        <input type="text" name='id' value="<?= htmlspecialchars($data->id); ?>" disabled>

                        <div>Code:</div>
                        <input type="text" name='code' value="<?= htmlspecialchars($data->code); ?>">
                        <p class="text-danger"><?= htmlspecialchars($errors['code'] ?? ''); ?></p>

                        <div>Prenom:</div>
                        <input type="text" name='prenom' value="<?= htmlspecialchars($data->prenom); ?>">
                        <p class="text-danger"><?= htmlspecialchars($errors['prenom'] ?? ''); ?></p>

                        <div>Nom:</div>
                        <input type="text" name='nom' value="<?= htmlspecialchars($data->nom); ?>">
                        <p class="text-danger"><?= htmlspecialchars($errors['nom'] ?? ''); ?></p>

                        <div>Note:</div>
                        <input type="text" name='note' value="<?= htmlspecialchars($data->note); ?>">
                        <p class="text-danger"><?= htmlspecialchars($errors['note'] ?? ''); ?></p>

                        <div>Filiere:</div>
                        <select name="filiere" id="">
                            <?php foreach ($filieres as $filiere) : ?>
                                <option value="<?= $filiere->codeF; ?>" <?= $filiere->codeF == $data->filiere ? 'selected' : ''; ?>><?= htmlspecialchars($filiere->intituleF); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br><br>
                        <input type="submit" value="Modifie" class="btn btn-success">
                    </form>
                <?php else : ?>
                    <h3>No data</h3>
                <?php endif; ?>
            </div>
    </section>
</body>

</html>
<?php include 'header-footer-side/footer.php'; ?>