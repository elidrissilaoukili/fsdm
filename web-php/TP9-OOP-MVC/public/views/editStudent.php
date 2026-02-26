<?php
require_once '../../app/controllers/editStudentController.php';
require_once '../../app/controllers/detailStudentsController.php';

include './templates/header.php';

?>

<section>
    <h1>Student Details:</h1>
    <div>
        <h4>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                <?php if (isset($student) && $student) : ?>
                    <p>Student Code: <input readonly name="codeE" value="<?php echo isset($student['codeE']) ? htmlspecialchars($student['codeE']) : ''; ?>"></p>
                    <p>Student First Name: <input type="text" name="prenom" value="<?php echo isset($student['prenom']) ? htmlspecialchars($student['prenom']) : ''; ?>"></p>
                    <p>Student Last Name: <input type="text" name="nom" value="<?php echo isset($student['nom']) ? htmlspecialchars($student['nom']) : ''; ?>"></p>
                    <p>Student Note: <input type="text" name="note" value="<?php echo isset($student['note']) ? htmlspecialchars($student['note']) : ''; ?>"></p>
                    <div class="flex-selectors">
                        <div>
                            <label for="">Filiere:</label>
                            <select name="filiere" id="" class="filiere">
                                <option value="SMI" <?php if (isset($student['filiere']) && $student['filiere'] == "SMI") echo "selected"; ?>>Science Math Informatique</option>
                                <option value="SMA" <?php if (isset($student['filiere']) && $student['filiere'] == "SMA") echo "selected"; ?>>Science Math Application</option>
                                <option value="SMP" <?php if (isset($student['filiere']) && $student['filiere'] == "SMP") echo "selected"; ?>>Science Matiere Physique</option>
                                <option value="SMC" <?php if (isset($student['filiere']) && $student['filiere'] == "SMC") echo "selected"; ?>>Science Matiere chimique</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="codeE_to_delete" value="<?php echo isset($student['codeE']) ? htmlspecialchars($student['codeE']) : ''; ?>">
                    <input type="submit" name="save" value="Save" class="btn">
                    <a href="detailStudents.php?codeE=<?php echo isset($student['codeE']) ? htmlspecialchars($student['codeE']) : ''; ?>"><input type="button" value="Back" class="btn"></a>
                <?php else : ?>
                    <h5>No such user exists!</h5>
                <?php endif; ?>

            </form>
        </h4>
    </div>
</section>

<?php include './templates/footer.php' ?>