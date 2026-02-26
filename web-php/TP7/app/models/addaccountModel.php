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


function editE($E)
{
    try {
        // Assuming $E is fetched from somewhere, maybe from a form
        $E = [
            'codeE' => $_POST['codeE'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'filiere' => $_POST['filiere'],
            'note' => $_POST['note']
        ];

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
    } catch (PDOException $e) {
        echo "Connection error <br>" . $e->getMessage();
    }

    $conn = null;
}
