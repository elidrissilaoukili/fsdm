<?php
include("./templates/header.php");
?>

<h2>Authentification</h2>
<div class="line"></div>
<form action="verify.php" method="post" class="formu">
    <div class="divform">
        <label for="log">login : </label><input type="text" id="log" name="login" style="width: 150px;">
        <p style="font-size: 14px;font-weight: bold;">(indication: moi)</p>
    </div>
    <div class="divform">
        <label for="pas">password : </label><input type="password" id="pas" name="pass" style="width: 150px;">
        <p style="font-size: 14px;font-weight: bold;">(indication: motdepasse)</p>
    </div>

    <input type="submit" name="ok" value="valider">
</form>


<?php
include("./templates/footer.php");
?>