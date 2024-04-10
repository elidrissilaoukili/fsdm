<?php
session_start();
if (!isset($_POST['login']) || !isset($_POST['pass']) || $_POST['login'] != 'moi' || $_POST['pass'] != 'motdepasse') {
    header("Location: login.php");
    exit;
}

$_SESSION['login'] = $_POST['login'];
header("Location: index.php");