<?php
include("vue/haut.php");
?>
<div>
    <h1>Modifier l'etudiant : <?= $etudiant["Code"] ?></h1>
    <div class="Line2"></div>
    <br>
    <br>
    <form action="index.php">
        <input type="checkbox" name="action" value="modification" hidden checked>
        <input type="checkbox" name="id" value="<?= $etudiant["id"] ?>" hidden checked>
        <pre>

        Nom:    <input type="text" name="Nom" value="<?= $etudiant["Nom"] ?>">

        Prenom: <input type="text" name="Prenom" value="<?= $etudiant["Prenom"] ?>">

        Note:   <input type="number" name="Note" value="<?= $etudiant["Note"] ?>">

                <input type="submit"     value="Envoyer"> <input type="reset" value="Annuler">
    </pre>
    </form>
</div>
<?php
include("vue/bas.php");
