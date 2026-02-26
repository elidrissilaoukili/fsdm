<?php 
require_once '../../app/controllers/detailStudentsController.php';

include './templates/header.php';

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
                <?php 
                    echo "<a href='editStudent.php?codeE={$student['codeE']}'>
                    <input type='button' value='Edit' class='btn'></a>";
                ?>
            </form>

            <?php else : ?>
                <h5>No such user exist!</h5>
            <?php endif; ?>           
        </h4>
    </div>
</section>

<?php include './templates/footer.php' ?>