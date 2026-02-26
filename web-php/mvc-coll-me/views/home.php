<?php include 'header-footer-side/header.php';
include './configs/init.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?> . /assets/css/style.css">
</head>

<body>
    <section class="break-to-two">
        <div class="break-to-two">
            <div class="side">
                <?php include 'header-footer-side/side.php'; ?>
            </div>

            <div class="main-content">
                <h1>Home</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, excepturi consectetur labore autem culpa maiores ad laudantium repellendus molestiae alias ab illum porro ipsa quasi voluptates optio! Numquam, minus laborum.</p>
                <h3><?= $data; ?></h3>
            </div>
    </section>
</body>

</html>




<?php include 'header-footer-side/footer.php'; ?>