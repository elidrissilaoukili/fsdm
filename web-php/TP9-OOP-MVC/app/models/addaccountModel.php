<?php
require_once "../../app/configs/db_connect.php";

/*
    addaccountModel.php
*/

class EtudiantModel {
    private $conn;

    public function __construct() {
        $this->conn = $this->connect_db();
    }

    public function connect_db() {
        // Assuming you have the correct credentials and DSN
        $dsn = 'mysql:host=localhost;dbname=smi2020';
        $username = 'root';
        $password = '';
        
        try {
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
            exit();
        }
    }

    public function insertData($E) {
        try {
            $sql = "INSERT INTO etudiant(codeE, nom, prenom, filiere, note) 
                    VALUES (:codeE, :nom, :prenom, :filiere, :note)";

            // Prepare the statement
            $stmt = $this->conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':codeE', $E['codeE']);
            $stmt->bindParam(':nom', $E['nom']);
            $stmt->bindParam(':prenom', $E['prenom']);
            $stmt->bindParam(':filiere', $E['filiere']);
            $stmt->bindParam(':note', $E['note']);

            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error inserting data: " . $e->getMessage();
        }
    }

    public function editE($E) {
        try {
            $sql = "UPDATE etudiant SET nom = :nom, prenom = :prenom, filiere = :filiere, note = :note 
                    WHERE codeE = :codeE";

            // Prepare the statement
            $stmt = $this->conn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':codeE', $E['codeE']);
            $stmt->bindParam(':nom', $E['nom']);
            $stmt->bindParam(':prenom', $E['prenom']);
            $stmt->bindParam(':filiere', $E['filiere']);
            $stmt->bindParam(':note', $E['note']);

            // Execute the statement
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error updating data: " . $e->getMessage();
        }
    }


    public function getE($conn) {
        if (isset($_GET['codeE'])) {
            $codeE = $_GET['codeE'];
            $sql = "SELECT * FROM etudiant WHERE codeE = :codeE";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':codeE', $codeE); // Bind parameter
            $stmt->execute();
            $student = $stmt->fetch(PDO::FETCH_ASSOC);
            return $student;
        }
        return null;
    }

    public function deleteE($conn) {
        if (isset($_POST['delete'])) {
            $codeE_to_delete = $_POST['codeE_to_delete'];
            $sql = "DELETE FROM etudiant WHERE codeE = :codeE_to_delete";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':codeE_to_delete', $codeE_to_delete); // Bind parameter
            if ($stmt->execute()) {
                header('Location: listStudents.php');
            } else {
                echo "Query error: " . $stmt->errorInfo()[2];
            }
        }
    }
}
