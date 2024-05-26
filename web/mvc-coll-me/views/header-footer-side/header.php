<?php include './configs/date.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style.css" />
    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css" /> -->


</head>


<body>
    <div>
        <form action="" method="post">
            <select name="langs" id="">
                <option value="en">en</option>
                <option value="ar">ar</option>
                <option value="fr">fr</option>
            </select>
            <input type="submit">
        </form>
        <?php
        if (isset($_POST["langs"])) {
            $lang = $_POST["langs"];
        } else {
            $lang = 'ar';
        }
        ?>
    </div>
    <header>
        <div class="header-main">
            <img src="./assets/images/f.jpeg" alt="" />
            <div class="header-txt">
                <h1>SMI6</h1>
                <h3>Faculte des science Dhar el Mahraz, Fés</h3>
            </div>
        </div>
        <div class="big-line"><?= displayDate($lang); ?></div>
    </header>