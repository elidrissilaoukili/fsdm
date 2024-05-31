<?php include 'header-footer-side/header.php';
include './configs/init.php'; ?>


<body>
    <section class="break-to-two">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>Salles</h1>
                <h4>List of Salles</h4>
                <table id="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nom</th>
                            <th>capacite</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <?php foreach ($data as $salle) : ?>
                        <tbody>
                            <tr>
                                <td><a href="index.php?action=details&id=<?= htmlspecialchars($salle->id) ?>&table=salles"><?= $salle->id ?></a></td>
                                <td><?= $salle->nom ?></td>
                                <td><?= $salle->capacite ?></td>
                                <td>
                                    <div style="display: flex;">
                                        <form action="index.php?action=modifie&id=<?= $salle->id; ?>&table=salles" method="post">
                                            <input type="submit" value="Edit" class="btn btn-primary m-1">
                                        </form>
                                        <form action="index.php?action=delete&id=<?= $salle->id; ?>&table=salles" method="post">
                                            <input type="submit" value="Delete" class="btn btn-danger m-1">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>

    </section>
</body>

</html>
<?php include 'header-footer-side/footer.php'; ?>