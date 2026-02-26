<?php
include("model/database.php");
$filieres = findAll('filiere');
define("MOY_REUSSITE",10);
function getMax($t,$filiere){
    $max = 0;
    foreach($t as $e){
        if($e["Note"] > $max && strtoupper($e["Filiere"]) == $filiere){
            $max = $e["Note"];
        }
    }
    return $max;
}
function getMension($note){
    if($note < 10){
        return "Ajourné";
    }else if($note >= 10 && $note < 12){
        return "Passable";
    }else if ($note >= 12 && $note < 14){
        return "Assez Bien";
    }else if ($note >= 14 && $note < 16){
        return "Bien";
    }else if ($note >= 16 && $note < 18){
        return "Trés bien";
    }else{
        return "Excellent";
    }
}
// Ajouté
function nbEtudiantReussi($etudiants){
    $nb=0;
    foreach($etudiants as $e){
        if($e["Note"] >= MOY_REUSSITE){
            $nb++;
        }
    }
    return $nb;
}
function getEtudiant($code){
    $etudiants = $GLOBALS["ETUDIANTS"];
    foreach($etudiants as $e){
        if($e["Code"] == $code){
            return $e;
        }
    }
    return false;
}