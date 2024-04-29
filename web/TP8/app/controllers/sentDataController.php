<?php
require_once '../../app/configs/sessions.php';
startSession();
require_once '../../app/configs/init.php';



if (isset($_POST['submit'])) {

    if (isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
    } else {
        $first_name = "no data";
    }

    if (isset($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
    } else {
        $last_name = "no data";
    }

    if (isset($_POST['code'])) {
        $code = $_POST['code'];
    } else {
        $code = "no data";
    }

    if (isset($_POST['note'])) {
        $note = $_POST['note'];
    } else {
        $note = "";
    }

    if (isset($_POST['pass'])) {
        $pass = $_POST['pass'];
    } else {
        $pass = "unspecified";
    }

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = "unspecified";
    }

    if (isset($_POST['major'])) {
        $major = $_POST['major'];
    } else {
        $major = "";
    }

    if (isset($_POST['major'])) {
        $comment = $_POST['comment'];
    } else {
        $comment = "";
    }

    if (isset($_POST['semester'])) {
        $semestres = $_POST['semester'];
    }
}

if (isset($_POST['cancel'])) {
    header('Location: add.php');
}
