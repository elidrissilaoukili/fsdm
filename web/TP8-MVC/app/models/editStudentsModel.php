<?php
require_once "../../app/configs/db_connect.php";

function editE($E)
{
    try {
        $conn = connect_db();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE etudiant SET nom = :nom, prenom = :prenom, filiere = :filiere, note = :note 
                WHERE codeE = :codeE";


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

        // Close the connection
        $conn = null;

        return true; // Indicate success
    } catch (PDOException $e) {
        // If an error occurs, return false
        echo "Connection error <br>" . $e->getMessage();
        return false;
    }
}
