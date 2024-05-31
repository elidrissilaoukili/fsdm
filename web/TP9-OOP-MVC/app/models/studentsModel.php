<?php

require_once '../../app/configs/db_connect.php';

$conn = connect_db();

// SQL query to select data from the 'etudiant' table
$sql = "SELECT codeE, nom, prenom, filiere, note FROM etudiant";
$stmt = $conn->query($sql);

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
