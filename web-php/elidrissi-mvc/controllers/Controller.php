<?php
// Include the model
require './models/model.php';

function indexAction()
{
    $data = "Welcome to the Home Page!";
    include './views/home.php';
}

function studentsAction()
{
    $table = 'etudiant';
    $data = getAll($table);
    // $data = getRow($table, $id = 5);
    include './views/students.php';
}


function sallesAction()
{
    $table = 'salles';
    $data = getAll($table);
    // $data = getRow($table, $id = 5);
    include './views/salles.php';
}


function detailsAction()
{
    $student = $salle = $filiere = $prof = null;
    $table = $_GET['table'];
    if (isset($_GET['id']) && $table === 'etudiant') {
        $id = $_GET['id'];
        $student = getRow($table, $id);
    } elseif (isset($_GET['code']) && $table === 'etudiant') {
        $code = $_GET['code'];
        $student = getRowByCode($table, $code);
    } elseif (isset($_GET['id']) && $table === 'salles') {
        $id = $_GET['id'];
        $salle = getRow($table, $id);
    } elseif (isset($_GET['id']) && $table === 'filiere') {
        $id = $_GET['id'];
        $filiere = getRow($table, $id);
    } elseif (isset($_GET['id']) && $table === 'professeurs') {
        $id = $_GET['id'];
        $prof = getRow($table, $id);
    }


    include './views/details.php';
}


function errors()
{
    return $errors = [
        'code' => '',
        'prenom' => '',
        'nom' => '',
        'note' => '',
        'filiere' => ''
    ];
}

function nouvelleAction()
{
    $code = $prenom = $nom = $note = "";
    $filieres = getAll('filiere');
    $errors = errors();
    include "./views/nouvelle.php";
}

require './controllers/saveAction.php';

function deleteAction()
{
    $id = $_GET['id'];
    $table = $_GET['table'];

    if ($table === 'etudiant') {
        delete($table, $id);
        header('location: index.php?action=students');
    } elseif ($table === 'salles') {
        delete($table, $id);
        header('location: index.php?action=salles');
    } elseif ($table === 'professeurs') {
        delete($table, $id);
        header('location: index.php?action=professeurs');
    }
}

function modifieAction()
{
    $id = $_GET['id'] ?? null;
    $table = $_GET['table'] ?? null;
    $data = null;
    $errors = errors();
    $filieres = getAll('filiere');

    if (isset($_GET['table']) && $table === 'etudiant') {
        $data = getRow($table, $id);
    }
    include './views/modifie.php';
}

require './controllers/savemodifieAction.php';


function filiereAction()
{
    $filieres = getAll('filiere');
    include './views/filieres.php';
}

function professeursAction()
{
    $profs = getAll('professeurs');
    include './views/professeurs.php';
}
