<?php
session_start();

// Check if the login form is submitted
if (isset($_POST['login']) && isset($_POST['pass']) && $_POST['login'] == 'elidrissi' && $_POST['pass'] == 'laoukili') {
    // Set session variable
    $_SESSION['login'] = $_POST['login'];
    // Redirect to index.php
    header("Location: index.php");
    exit; // Stop further execution
}



