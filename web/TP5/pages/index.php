<?php
<<<<<<< HEAD

require_once '../configs/init.php';

=======
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

require_once '../configs/init.php';
>>>>>>> 8321304aacd3f7516274024281e46d8ada77599e
include('./templates/header.php');
?>

<section>
    <h1>Gestion des étudiants</h1>

    <div class="sec-main"></div>
    <div class="a-c">
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Velit aperiam accusamus odit ipsa, dolores quo dolorem
            impedit iusto dicta natus commodi corrupti, sint architecto.
            Eius voluptates corrupti corporis dicta nobis!
        </p>
    </div>
</section>

<?php include('./templates/footer.php');
?>