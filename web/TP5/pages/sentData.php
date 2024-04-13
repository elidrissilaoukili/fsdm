<?php

include './templates/header.php';
require_once '../configs/init.php';



if (isset($_POST['submit'])) {

    if (isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
    } else {
        $first_name = "no data";
    }

    if (isset($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
    } else {
        $last_name = "no data";
    }

    if (isset($_POST['code'])) {
        $code = $_POST['code'];
    } else {
        $code = "no data";
    }

    if (isset($_POST['note'])) {
        $note = $_POST['note'];
    } else {
        $note = "";
    }

    if (isset($_POST['pass'])) {
        $pass = $_POST['pass'];
    } else {
        $pass = "unspecified";
    }

    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    } else {
        $gender = "unspecified";
    }

    if (isset($_POST['major'])) {
        $major = $_POST['major'];
    } else {
        $major = "";
    }

    if (isset($_POST['major'])) {
        $comment = $_POST['comment'];
    } else {
        $comment = "";
    }

    if (isset($_POST['semester'])) {
        $semestres = $_POST['semester'];
    }
}

if (isset($_POST['cancel'])) {
    header('Location: add.php');
}

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
<<<<<<< HEAD
        <h4>Semester validés: <?php echo $semester; ?> </h4>
=======
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
>>>>>>> 8321304aacd3f7516274024281e46d8ada77599e
        <h4>Filiere: <?php echo $major; ?> </h4>
        <h4>Comment: <?php echo $comment; ?> </h4>
    </div>

    <h3><a href="#Edit">Edit</a> <a href="#Delete">Delete</a></h3>
</section>

<?php include './templates/footer.php' ?>