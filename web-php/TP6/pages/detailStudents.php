<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
include './templates/header.php';


$conn = connect_db();
function getE($conn) {
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

function deleteE($conn) {
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

$student = getE($conn);
deleteE($conn);


?>

<section>
    <h1>Student Details:</h1>
    <div>
        <h4>
            <?php if ($student) : ?>
            <p>Student Code: <?php echo htmlspecialchars($student['codeE']); ?></p>
            <p>Student First Name: <?php echo htmlspecialchars($student['prenom']); ?></p>
            <p>Student Last Name: <?php echo htmlspecialchars($student['nom']); ?></p>
            <p>Student Filiere: <?php echo htmlspecialchars($student['filiere']); ?></p>
            <p>Student Note: <?php echo htmlspecialchars($student['note']); ?></p>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> <!-- Added echo before $_SERVER -->
                <input type="hidden" name="codeE_to_delete" value="<?php echo $student['codeE']; ?>"> <!-- Changed name attribute to match with POST parameter name -->
                <input type="submit" name="delete" value="Delete" class="btn">
                <input type="submit" name="edit" value="Edit" class="btn">
            </form>

            <?php else : ?>
                <h5>No such user exist!</h5>
            <?php endif; ?>           
        </h4>
    </div>
</section>

<?php include './templates/footer.php' ?>