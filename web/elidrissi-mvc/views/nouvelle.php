<?php include 'header-footer-side/header.php'; ?>

<body>
    <section class="container">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>add new student</h1>
                <form action="index.php?action=save&table=etudiant" method='post'>
                    <div>code:</div>
                    <input type="text" name='code' value="<?= $code ?>" placeholder="code:00000">
                    <p class="text-danger"><?= htmlspecialchars($errors['code']); ?></p>

                    <div>Prenom:</div>
                    <input type="text" name='prenom' value="<?= $prenom ?>" placeholder="prenom: Mohammed">
                    <p class="text-danger"><?= htmlspecialchars($errors['prenom']); ?></p>

                    <div>nom:</div>
                    <input type="text" name='nom' value="<?= $nom ?>" placeholder="nom: EL IDRISSI LAOUKILI">
                    <p class="text-danger"><?= htmlspecialchars($errors['nom']); ?></p>

                    <div>note:</div>
                    <input type="text" name='note' value="<?= $note ?>" placeholder="Note: 0-20">
                    <p class="text-danger"><?= htmlspecialchars($errors['note']); ?></p>

                    <div>filiere:</div>
                    <select name="filiere" id="">
                        <?php foreach ($filieres as $filiere) : ?>
                            <option value="<?= $filiere->codeF; ?>"><?= $filiere->intituleF; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <input type="submit" value="add" class="btn btn-success">
                </form>
            </div>
    </section>
</body>

</html>
<?php include 'header-footer-side/footer.php'; ?>