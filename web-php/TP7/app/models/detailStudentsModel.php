<?php
require_once "../../app/configs/db_connect.php";

$conn = connect_db();
function getE($conn)
{
    if (isset($_GET['codeE'])) {
        $codeE = $_GET['codeE'];
        $sql = "SELECT * FROM etudiant WHERE codeE = :codeE";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codeE', $codeE);
        $stmt->execute();
        $student = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $student;
}









function deleteE($conn)
{
    if (isset($_POST['delete'])) {
        $codeE_to_delete = $_POST['codeE_to_delete'];
        $sql = "DELETE FROM etudiant WHERE codeE = :codeE_to_delete";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codeE_to_delete', $codeE_to_delete);
        if ($stmt->execute()) {
            header('Location: listStudents.php');
        } else {
            echo "Query error: " . $stmt->errorInfo()[2];
        }
    }
}
