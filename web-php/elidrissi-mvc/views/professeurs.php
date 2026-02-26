<?php include 'header-footer-side/header.php';
include './configs/init.php'; ?>


<body>
    <section class="break-to-two">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>profs</h1>
                <h4>List of profs</h4>
                <table id="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>prenom</th>
                            <th>nom</th>
                            <th>departement</th>
                        </tr>
                    </thead>
                    <?php foreach ($profs as $prof) : ?>
                        <tbody>
                            <tr>
                                <td><a href="index.php?action=details&id=<?= htmlspecialchars($prof->id) ?>&table=professeurs"><?= $prof->id ?></a></td>
                                <td><?= $prof->prenom ?></td>
                                <td><?= $prof->nom ?></td>
                                <td><?= $prof->departement ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

    </section>
</body>

</html>
<?php include 'header-footer-side/footer.php'; ?>