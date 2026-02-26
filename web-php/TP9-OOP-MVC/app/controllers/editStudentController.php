<?php
require_once '../../app/configs/sessions.php';
startSession();
require_once "../../app/models/addaccountModel.php";



$student = new EtudiantModel();

if (isset($_POST['save'])) {

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $filiere = $_POST['filiere'];
    $codeE = $_POST['codeE'];
    $note = $_POST['note'];

    $E = array('prenom' => $prenom, 'nom' => $nom, 'filiere' => $filiere, 'codeE' => $codeE, 'note' => $note);

    $student->editE($E);


    header('location: listStudents.php');
}
