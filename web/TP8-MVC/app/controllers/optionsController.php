<?php
require_once '../../app/configs/sessions.php';
startSession();

if (isset($_POST["submitoption"])) {
    setcookie("langue", $_POST['langua'], time() + 3600 * 24, "/");
    setcookie("color", $_POST['color'], time() + 3600 * 24, "/");
    setcookie("bgcolor", $_POST['bgcolor'], time() + 3600 * 24, "/");
    header("location: index.php");
}


if (isset($_POST["annuler"])) {
    header("location: index.php");
}