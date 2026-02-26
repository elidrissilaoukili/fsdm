<?php
function getCn() {
    $user = 'root';
    $pass = '';
    $dbinfo = 'mysql:host=localhost;port=3306;dbname=smi2020';
    try {
        return $db = new PDO($dbinfo, $user, $pass);
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
}
function findOne($table, $id) {
    $sql = "select * from $table where id = $id";
    return getCn()->query($sql)->fetch();
}
function findAll($table) {
    $sql = "select * from $table";
    return getCn()->query($sql)->fetchAll();
}
function delete($table, $id) {
    return getCn()->exec("delete from $table where id = $id");
}
function save($table, $info) {
    $id = $info['id'] ?? null;
    unset($info['id']);
    $keys = array_keys($info);
    $values = array_values($info);
    if (!isset($id)) {
        $chapms = array_fill_keys($keys, "?");
        $sql = "insert into $table (" . join(",", $keys) . ") values (" . join(",", $chapms) . ")";
        return getCn()->prepare($sql)->execute($values);
    } else {
        $values[] = $id;
        $sql = "update $table set " . join("=?, ", $keys) . "=? where id = ?";
        return getCn()->prepare($sql)->execute($values);
    }
}

function getListeFiliere() {
    $sql = 'select * from filiere';
    return getCn()->query($sql)->fetchAll();
}

function getListeEtudiants($filiere) {
    $sql = "select * from etudiant where Filiere = '" . $filiere . "'";
    return getCn()->query($sql)->fetchAll();
}

function getDetailEtudiant($code) {
    $sql = "select * from etudiant where Code = '" . $code . "'";
    return getCn()->query($sql)->fetch();
}

function AjouterEtudiant($e) {
    getCn()->prepare('insert into etudiant values (null,?,?,?,?,?)')->execute([$e["Code"], $e["Nom"], $e["Prenom"], $e["Filiere"], $e["Note"]]);
}

function SupprimerEtudiant($c) {
    $sql = "delete from etudiant where Code = '" . $c . "'";
    getCn()->exec($sql);
}
