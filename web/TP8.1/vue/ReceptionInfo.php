<?php
include("utils/functions.php");
include("vue/haut.php");
if(!isset($_SESSION["Login"]["Login"])) header("location: index.php?action=login");
?>
<main>
    <h1>Reception Informations</h1>
    <div class="Line2"></div>
    <b>Bonjour <?= $etudiant["Nom"] ?> <?= $etudiant["Prenom"] ?></b><br>
    <b>Votre mot de passe est <?= $etudiant["Mdp"] ?> </b><br>
    <b>Votre Sexe est : <?= $etudiant["Sexe"] ?></b><br>
    <b>Semestres Validés</b><br>
    <ul>
        <?php
        foreach ($etudiant["SV"] as $sv) {
        ?>
            <li><?= $sv ?></li>
        <?php
        }
        ?>
    </ul>
    <b>Vous avez entré le commentaire Suivant</b><br>
    <b><?= $etudiant["Commentaire"] ?></b><br>
    <h1>Informations d'environnement</h1>
    <b>Votre Adresse($_SERVER["REMOTE_ADDR"]):<?= $_SERVER["REMOTE_ADDR"] ?></b><br>
    <b>Votre Navigateur($_SERVER["HTTP_USER_AGENT"]):<?= $_SERVER["HTTP_USER_AGENT"] ?></b><br>
    <b>Vous etiez sur la page($_SERVER["HTTP_REFERER"]):<?= $_SERVER["HTTP_REFERER"] ?></b><br>
    <b>vous etes actuellement dans le script($_SERVER["PHP_SELF"]):<?= $_SERVER["PHP_SELF"] ?></b><br>
    <b>vous etes actuellement dans le script(__FILE__):<?= __FILE__ ?></b><br>
    <b>A la ligne(__LINE__):<?= __LINE__ ?></b><br>
    <b>Repertoire(__DIR__):<?= __DIR__ ?></b><br>
    <b>La version PHP retournée par le serveur(PHP_VERSION):<?= PHP_VERSION ?></b><br>
    <b>Le systeme d'exploitation du serveur(PHP_OS):<?= PHP_OS ?></b>
    <div class="Line2" style="margin-top: 10px;"></div>
    <div style="margin: 10px 0;">
        <a href="AjouterEtudiant.php">Revenir au formulaire d'ajout</a>
        <a href="AjouterEtudiant.php">Revenir a l'acceuil</a>
    </div>
</main>
<?php
include("vue/bas.php");
?>