<?php
include 'templates/header.php';

if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
else
    $username = '';
?>

<html>

<body>

    <div class="welcome">
        <h1>welcome <?= htmlspecialchars($username); ?></h1>
    </div>

    <section class="container">
        <div class="break-to-two">
            <div class="side">
                <?php include 'templates/menu.php'; ?>
            </div>

            <div class="main-content">
                <?= $view; ?>
            </div>
    </section>
</body>

</html>
<?php include 'templates/footer.php'; ?>