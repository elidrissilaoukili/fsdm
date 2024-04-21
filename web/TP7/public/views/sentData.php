<?php
require_once '../../app/configs/sessions.php';
include './templates/header.php';
require_once '../../app/configs/init.php';
require_once '../../app/controllers/sentDataController.php';


?>

<section>
    <h1>Student Entered Details:</h1>
    <div>
        <h4>First Name: <?php echo $first_name; ?></h4>
        <h4>Last Name: <?php echo $last_name; ?> </h4>
        <h4>Code: <?php echo $code; ?> </h4>
        <h4>Note: <?php echo $note; ?> </h4>
        <h4>Pass: <?php echo $pass; ?> </h4>
        <h4>Gender: <?php echo $gender; ?> </h4>
        <h4>Semester validés: <br>
            <div>
                <ol>
                    <?php
                    if (!$semestres) {
                        echo "<h3 style='color: red'>vous n'avez entrer aucune filiere !</h3>";
                    }
                    foreach ($semestres as $semestre) {
                        echo "<li>" . $semestre . "</li>";
                    }
                    ?>
                </ol>
        </h4>
        <h4>Filiere: <?php echo $major; ?> </h4>
        <h4>Comment: <?php echo $comment; ?> </h4>
    </div>

    <h3><a href="#Edit">Edit</a> <a href="#Delete">Delete</a></h3>
</section>

<?php include './templates/footer.php' ?>