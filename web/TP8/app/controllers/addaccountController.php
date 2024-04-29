<?php
require_once '../../app/configs/sessions.php';
startSession();
require_once "../../app/models/addaccountModel.php";

$prenom = $nom = $filiere = $codeE = $note = "";
$errors = array('prenom' => '', 'nom' => '', 'filiere' => '', 'codeE' => '', 'note' => '');

if (isset($_POST['submit'])) {

    // check name -1
    if (empty($_POST['prenom'])) {
        $errors['prenom'] = "First Name is required!";
    } else {
        $prenom = $_POST['prenom'];
    }

    if (empty($_POST['nom'])) {
        $errors['nom'] = "Last Name is required!";
    } else {
        $nom = $_POST['nom'];
    }


    if (empty($_POST['filiere'])) {
        $errors['filiere'] = "Filiere is required!";
    } else {
        $filiere = $_POST['filiere'];
    }

    // check email -2
    if (empty($_POST['codeE'])) {
        $errors['codeE'] = "Code is required!";
    } else {
        $codeE = $_POST['codeE'];
    }

    // check phone -3
    if (empty($_POST['note'])) {
        $errors['note'] = "Number password is required!";
    } else {
        $note = $_POST['note'];
    }

    // If there are errors, don't redirect, display errors instead
    if (array_filter($errors)) {
        // foreach ($errors as $error) {
        //     if (!empty($error)) {
        //         echo "<p>Error: $error</p>";
        //     }
        // }
    } else {
        // No errors, insert data and redirect
        insertData($E);
        header('location: listStudents.php');
    }
}
