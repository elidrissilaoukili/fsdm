<?php
session_start();
if ($_POST["Login"] == "moi" && $_POST["Pwd"] == "douz"){
    $_SESSION["Login"] = ["Login" => $_POST["Login"], "Password" => $_POST["Pwd"]];
    header("location: index.php?action=liste");
}else 
header("location: index.php?action=login");