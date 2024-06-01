<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit;
}

include 'templates/header.php'; 
?>


<html>
<body>

    <div class="welcome">
        <h1>welcome <?= htmlspecialchars($_SESSION['username']);?></h1>
    </div>

    <section class="container">
        <div class="break-to-two">
            <div class="side">
                <?php include 'templates/menu.php'; ?>
            </div>

            <div class="main-content">
                <?= $view;?>
            </div>
    </section>
</body>
</html>
<?php include 'templates/footer.php'; ?>