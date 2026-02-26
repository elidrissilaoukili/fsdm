<?php include 'header-footer-side/header.php';
include './configs/init.php'; ?>


<body>
    <section class="break-to-two">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>filieres</h1>
                <h4>List of Filieres</h4>
                <table id="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>codeF</th>
                            <th>IntituleF</th>
                        </tr>
                    </thead>
                    <?php foreach ($filieres as $filiere) : ?>
                        <tbody>
                            <tr>
                                <td><a href="index.php?action=details&id=<?= htmlspecialchars($filiere->id) ?>&table=filiere"><?= $filiere->id ?></a></td>
                                <td><?= $filiere->codeF ?></td>
                                <td><?= $filiere->intituleF ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

    </section>
</body>

</html>
<?php include 'header-footer-side/footer.php'; ?>