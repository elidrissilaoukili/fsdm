<?php include 'templates/header.view.php';?>
<section>

    <h1>Click on one of the following filieres for getting result:</h1>

    <div class='listeFiliere'>
        <form method="POST">
            <ol>
                <li>
                    <input type="submit" name="SMI" value="Sciences Mathématiques et Informatique (SMI)" />
                </li>
                <li>
                    <input type="submit" name="SMA" value="Sciences Mathématiques et Applications (SMA)" />
                </li>
                <li>
                    <input type="submit" name="SMP" value="Sciences de la Matière Physique (SMP)" />
                </li>
                <li>
                    <input type="submit" name="SMC" value="Sciences de la Matière Chimie (SMC)" />
                </li>
            </ol>
        </form>
    </div>

</section>

<?php include 'templates/footer.view.php';?>