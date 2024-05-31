<?php include 'templates/header.php'; ?>

<html>
<body>
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