<?php
include("utils/functions.php");

function index() {
    $filieres = findAll('filiere');
    include("vue/acceuil.php");
}

function liste() {
    $filiere = $_GET["codeF"] ?? "SMI";
    $ETUDIANTS = getListeEtudiants($filiere);
    $nbrReussi = nbEtudiantReussi($ETUDIANTS, $filiere);
    $max = getMax($ETUDIANTS, $filiere);
    $listeFiliere = getListeEtudiants($filiere);
    include("vue/liste.php");
}
function ajouter() {
    $filieres = findAll('filiere');
    include("vue/AjouterEtudiant.php");
}

function details() {
    $id = $_GET["id"] ?? "1";
    $etudiant = findOne("etudiant", $id);
    include("vue/detailEtudiant.php");
}

function supprimer() {
    $id = $_GET["id"];
    delete("etudiant", $id);
    header("location: index.php?action=liste");
}
function modifier() {
    $id = $_GET["id"];
    $etudiant = findOne("etudiant", $id);
    require("vue/modifierEtudiant.php");
}
function modification() {
    unset($_GET["action"]);
    save("etudiant", $_GET);
    header("location: index.php");
}
function login() {
    require("vue/login.php");
}
function deconnexion() {
    session_start();
    session_destroy();
    header("location: index.php?action=login");
}
function option() {
    require("vue/option.php");
}
function receptionInfo() {
    $etudiant = ["Code" => $_POST["Code"], "Nom" => $_POST["Nom"], "Prenom" => $_POST["Prenom"], "Filiere" => $_POST["Filiere"], "Note" => $_POST["Note"]];
    save("etudiant", $etudiant);
    require("vue/ReceptionInfo.php");
}
function setCouleur() {
    setcookie("color", $_POST["color"], time() + 10 * 3600);
    setcookie("bg", $_POST["bg"], time() + 10 * 3600);
    setcookie("lang", $_POST["lang"], time() + 10 * 3600);

    header("location: index.php");
}
function authentification() {
    session_start();
    if ($_POST["Login"] == "moi" && $_POST["Pwd"] == "douz") {
        $_SESSION["Login"] = ["Login" => $_POST["Login"], "Password" => $_POST["Pwd"]];
        header("location: index.php?action=liste");
    } else
        header("location: index.php?action=login");
}
