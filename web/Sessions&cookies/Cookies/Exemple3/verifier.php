<?php

if (!isset($_POST["login"]) || !isset($_POST["pass"]) || $_POST["login"] != "moi" || $_POST["pass"] != "douz") {

    include("form.php");
    exit();
}

//session_start();
//$_SESSION["login"]=$_POST["login"];

$_COOKIE["login"] = $_POST["login"];
setcookie("login", $_POST["login"], time() + 3600 * 24 * 10); //10 jours;

?>
<html>

<body>
    <div style="color:white; background-color:#993300; text-align: right">
        Vous êtes connecté en tant que: <?= $_COOKIE["login"] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="deconnexion.php">Déconnexion</a>
    </div>
    <hr />

    <h1 align="center">Cookies: Menu</h1>

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