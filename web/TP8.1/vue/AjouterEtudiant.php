<?php
include("vue/haut.php");
if(!isset($_SESSION["Login"]["Login"])) header("location: index.php?action=login");
?>
<h1>Ajouter un etudiant</h1>
<div class="Line2"></div>
<br>
<form action="index.php?action=receptionInfo" method="post">
    <pre>
    Entrer le code:           <input type="text" name="Code" id="">

    Entrer le Nom:            <input type="text" name="Nom" id="">
    
    Entrer le Prenom:         <input type="text" name="Prenom" id="">
    
    Entrer la Note:           <input type="number" name="Note" id="">

    Entrer le Mot de passe:   <input type="password" name="Mdp" id="">

    sexe:
    <input type="radio" name="Sexe" value="H"> Homme
    <input type="radio" name="Sexe" value="F"> Femme

    Semestres Validées:
    <input type="checkbox" name="SV[1]" value="S1"> S1
    <input type="checkbox" name="SV[2]" value="S2"> S2
    <input type="checkbox" name="SV[3]" value="S3"> S3
    <input type="checkbox" name="SV[4]" value="S4"> S4
    <input type="checkbox" name="SV[5]" value="S5"> S5
    <input type="checkbox" name="SV[6]" value="S6"> S6

    Filiere:
    <select name="Filiere" id="">
        <?php
        foreach ($filieres as $f) {
        ?>
        <option value="<?= $f["CodeF"] ?>"><?= $f["IntituleF"] ?></option>
        <?php
        }
        ?>
    </select>
    
    Saisissez un commentaire:
    <textarea name="Commentaire" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Envoyer"> <input type="reset" value="Annuler">

</pre>
    <a href="index.php">Revenir a l'acceuil</a>
</form>
<?php
include("vue/bas.php");
?>