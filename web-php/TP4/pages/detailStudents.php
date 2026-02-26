<?php include './templates/header.php' ?>

<section>
    <h1>Student Details:</h1>
    <div>
        <h4>
            <?php
            // Retrieve information from URL parameters
            $code = $_GET['code'];
            $fname = $_GET['fname'];
            $lname = $_GET['lname'];
            $major = $_GET['major'];
            $note = $_GET['note'];

            // Output the received information
            echo "<p>Student Code: $code</p>";
            echo "<p>Student First Name: $fname</p>";
            echo "<p>Student Last Name: $lname</p>";
            echo "<p>Student Filiere: $major</p>";
            echo "<p>Student Note: $note</p>";
            ?>
        </h4>
    </div>

    <h3><a href="#Edit">Edit</a> <a href="#Delete">Delete</a></h3>
</section>

<?php include './templates/footer.php' ?>