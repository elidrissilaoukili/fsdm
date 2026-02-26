<?php
include("vue/haut.php");
if(!isset($_SESSION["Login"]["Login"])) header("location: index.php?action=login");
?>

<div class="main">
    <h1>liste des etudiants de la filiere: <?php
                                            echo $filiere; ?></h1>
    <div class="Line2"></div>
    <p><b>Nombre des etudiants réussis: <?= $nbrReussi ?><br>Meilleur note : <?= $max ?></b></p>
    <div class="Line2"></div>
    <div id="tab">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Note</th>
                    <th>Mension</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listeFiliere as $e) {
                ?>
                    <tr>
                        <td><a href="index.php?action=details&id=<?= $e["id"] ?>"><?= $e["Nom"] ?></a></td>
                        <td><a href="index.php?action=details&id=<?= $e["id"] ?>"><?= $e["Prenom"] ?></a></td>
                        <td><a href="index.php?action=details&id=<?= $e["id"] ?>"><?= $e["Note"] ?></a></td>
                        <td><a href="index.php?action=details&id=<?= $e["id"] ?>"><?= getMension($e["Note"]) ?></a></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="4" style="text-align: center;"><b><a href="index.php?action=ajouter">Ajouter un etudiant</a></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
include("vue/bas.php");
?>

</html>