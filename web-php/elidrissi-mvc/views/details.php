<?php include 'header-footer-side/header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <section class="container">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>Details </h1>
                <?php if ($student) : ?>
                    <p>id: <?= $student->id; ?></p>
                    <p>Code: <?= $student->code; ?></p>
                    <p>Prenom: <?= $student->prenom; ?></p>
                    <p>Nom: <?= $student->nom; ?></p>
                    <p>Note: <?= $student->note; ?></p>
                    <p>Filiere: <?= $student->filiere; ?></p>

                    <div style="display: flex;">
                        <form action="index.php?action=modifie&id=<?= $student->id; ?>&table=etudiant" method="post">
                            <input type="submit" value="Edit" class="btn btn-primary m-1">
                        </form>
                        <form action="index.php?action=delete&id=<?= $student->id; ?>&table=etudiant" method="post">
                            <input type="submit" value="Delete" class="btn btn-danger m-1">
                        </form>
                    </div>
                <?php elseif ($salle) : ?>
                    <p>id: <?= $salle->id; ?></p>
                    <p>Nom: <?= $salle->nom; ?></p>
                    <p>Capacite: <?= $salle->capacite; ?></p>

                    <div style="display: flex;">
                        <form action="index.php?action=modifie&id=<?= $salle->id; ?>&table=salles" method="post">
                            <input type="submit" value="Edit" class="btn btn-primary m-1">
                        </form>
                        <form action="index.php?action=delete&id=<?= $salle->id; ?>&table=salles" method="post">
                            <input type="submit" value="Delete" class="btn btn-danger m-1">
                        </form>
                    </div>
                <?php elseif ($filiere) : ?>
                    <p>id: <?= $filiere->id; ?></p>
                    <p>CodeF: <?= $filiere->codeF; ?></p>
                    <p>intituleF: <?= $filiere->intituleF; ?></p>

                <?php elseif ($prof) : ?>
                    <p>id: <?= $prof->id; ?></p>
                    <p>prenom: <?= $prof->prenom; ?></p>
                    <p>nom: <?= $prof->nom; ?></p>
                    <p>departement: <?= $prof->departement; ?></p>

                    <div style="display: flex;">
                        <form action="index.php?action=modifie&id=<?= $prof->id; ?>&table=professeurs" method="post">
                            <input type="submit" value="Edit" class="btn btn-primary m-1">
                        </form>
                        <form action="index.php?action=delete&id=<?= $prof->id; ?>&table=professeurs" method="post">
                            <input type="submit" value="Delete" class="btn btn-danger m-1">
                        </form>
                    </div>
                <?php endif; ?>

            </div>
    </section>
</body>

</html>
<?php include 'header-footer-side/footer.php'; ?>