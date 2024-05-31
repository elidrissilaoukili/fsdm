<?php
include("vue/haut.php");
?>
<main>
    <h1>Authentification</h1>
    <form action="authentification.php" method="post">
    <pre>
        Login    <input type="text" name="Login" id=""> (indication = moi)

        Password <input type="password" name="Pwd" id=""> (indication = douz)

        <input type="submit" value="Envoyer"> <input type="reset" value="Annuler">
    </pre>
    </form>
</main>
<?php
include("vue/bas.php");