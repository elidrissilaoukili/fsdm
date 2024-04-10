<?php
//session_start();
//$_SESSION["connecte"]= true;
//$v = (isset($_SESSION["connecte"]))? "OK":"KO";

//$_COOKIE["connecte"]= true;
setcookie("connecte", "true", time() + 60 * 5);
setcookie("textColor", "red", time() + 60 * 5);
setcookie("bgColor", "yellow", time() + 60 * 5);
setcookie("lang", "EN", time() + 60 * 5);

$v = (isset($_COOKIE["connecte"])) ? "OK" : "KO";
$textColor = (isset($_COOKIE["textColor"])) ? $_COOKIE["textColor"] : "black";
$bgColor = (isset($_COOKIE["bgColor"])) ? $_COOKIE["bgColor"] : "white";
$lang = (isset($_COOKIE["lang"])) ? $_COOKIE["lang"] : "AR";
?>

<html>
<style>
body {
    color: <?=$textColor ?>;
    background: <?=$bgColor ?>
}
</style>

<body>
    <h1 align="center">Cookies: Page 5</h1>
    les variables sont maintenant :
    <ul>
        <li>Connecté: <?php echo $v ?></li>
        <li>Couleur du Texte: <?= $textColor ?></li>
        <li>Couleur arrière plan: <?= $bgColor ?></li>
        <li>Langue: <?= $lang ?></li>
    </ul>
    <hr />
    <a href="page1.php">Page1</a><br />
    <a href="page2.php">Page2</a><br />
    <a href="page3.php">Page3</a><br />
    <a href="page4.php">Page4</a><br />
    <a href="page5.php">Page5</a><br />
    <a href="page6.php">Page6</a><br />
    <a href="page7.php">Page7</a><br />
    <a href="page8.php">Page8</a><br />
    <a href="page9.php">Page9</a><br />
    <a href="page10.php">Page10</a><br />

</body>

</html>