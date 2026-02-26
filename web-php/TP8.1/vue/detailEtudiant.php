<?php
include("vue/haut.php");
// $etudiant = getEtudiant($code);
?>
<div>
    <h1>Detail de l'etudiant: <?= $etudiant["Code"] ?></h1>
    <div class="Line2"></div>
    <p><b>Code: <?= $etudiant["Code"] ?></b></p>
    <p><b>Nom: <?= $etudiant["Nom"] ?></b></p>
    <p><b>Prenom: <?= $etudiant["Prenom"] ?></b></p>
    <p><b>Filiere: <?= $etudiant["Filiere"] ?></b></p>
    <p><b>Note: <?= $etudiant["Note"] ?></b></p>
    <b><a href="index.php?action=modifier&id=<?= $id ?>" style="margin-right: 20px;">Modifier</a></b>
    <b><a href="index.php?action=supprimer&id=<?= $id ?>">Supprimer</a></b>
</div>
<?php
include("vue/bas.php");
?>