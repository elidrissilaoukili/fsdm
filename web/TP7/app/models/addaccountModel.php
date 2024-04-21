<?php
require_once "../../app/configs/db_connect.php";

function insertData($E)
{
    try {
        $conn = connect_db();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO etudiant(codeE, nom, prenom, filiere, note) 
                        VALUES (:codeE, :nom, :prenom, :filiere, :note)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':codeE', $E['codeE']);
        $stmt->bindParam(':nom', $E['nom']);
        $stmt->bindParam(':prenom', $E['prenom']);
        $stmt->bindParam(':filiere', $E['filiere']);
        $stmt->bindParam(':note', $E['note']);

        // Execute the statement
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Connection error <br>" . $e->getMessage();
    }

    $conn = null;
}


    // insertData($E);
