<?php
function startSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['login'])) {
        header("location: login.php");
        exit;
    }
}

function endSession()
{
    session_start();
    $_SESSION = array();
    session_destroy();

    header("location: index.php");
    exit;
}
