<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>
<body>
    <header>
        <img src="./fsdm.jpg" alt="">
        <div id="SMI6">
            <h3>SMI6</h3>
            <p>faculté de science dhar lmehrez</p>
        </div>
        <div id="Line1">
            <p id="date"></p>
        </div>
    </header>
    <form>
        <h1>Ajouter un etudiant</h1>
        <div class="Line2"></div>
        <label>Entrer le code:</label>
        <br>
        <input type="text" id="Code" name="Code">
        <br>
        <label>Entrer le nom:</label>
        <br>
        <input type="text" id="Nom" name="Nom">
        <br>
        <label>Entrer le prenom:</label>
        <br>
        <input type="text" id="Prenom" name="Prenom">
        <br>
        <label>Entrer la note:</label>
        <br>
        <input type="number" id="Note" name="Note">
        <label>Entrer le mot de passe:</label>
        <br>
        <input type="number" id="Note" name="Note">
        <div class="filiere">
            <label for="Filiere">filiere</label>
            <br>
            <select name="Filiere" id="">
                <option value="SMI">Science mathematiques et informatiques</option>
                <option value="SMP">Science de la matiere physique</option>
            </select>
        </div>
        <div class="buttons">
            <input type="submit" value="Envoyer" onclick=verification()>
            <input type="reset" value="Annuler">
        </div>
        <?php
        include("vue/bas.php");
        ?>
</body>
</html>