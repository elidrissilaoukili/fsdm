<?php
include('./templates/header.php');

include './configs/listStudents.config.php';
include './configs/listFiliere.config.php';
?>

<section>

    <h1>Click on one of the following filieres for getting result:</h1>

    <div class='listeFiliere'>
        <form action="./listStudents.php" method="POST">
            <ol>
                <li>
                    <input 
                    type="submit" 
                    name="SMI" 
                    value="Sciences Mathématiques et Informatique (SMI)" />
                </li>
                <li>
                    <input 
                    type="submit" 
                    name="SMA" 
                    value="Sciences Mathématiques et Applications (SMA)" />
                </li>
                <li>
                    <input 
                    type="submit" 
                    name="SMP" 
                    value="Sciences de la Matière Physique (SMP)" />
                </li>
                <li>
                    <input 
                    type="submit" 
                    name="SMC" 
                    value="Sciences de la Matière Chimie (SMC)" />
                </li>
            </ol>
        </form>
    </div>

</section>

<?php include('./templates/footer.php'); ?>