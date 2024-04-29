<?php


require_once '../../app/configs/init.php';

$date = isset($_COOKIE["langue"]) ? $_COOKIE["langue"] : "ar";
$clr = isset($_COOKIE["color"]) ? $_COOKIE["color"] : "black";
$bgclr = isset($_COOKIE["bgcolor"]) ? $_COOKIE["bgcolor"] : "white";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=<?php echo CSSPATH . "listStudents.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "listStudents.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "listFiliere.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "style.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "add.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "bootstrap.min.css"; ?> />
    <script src="script.js"></script>

    <style>
        a,
        h1,
        h2,
        h3,
        h4,
        p,
        table,
        td,
        th {
            color: <?= $clr ?>;
            background-color: <?= $bgclr ?>;
        }



        .connexion-option {
            text-align: right;
        }
    </style>
</head>


<body style="color: <?= $clr ?>; background-color: <?= isset($_COOKIE["bgcolor"]) ? $_COOKIE["bgcolor"] : "white" ?>;">

    <header>
        <div class="header-main">
            <img src=<?php echo IMGPATH . "/f.jpeg"; ?> alt="" />
            <div class="header-txt">
                <h1>SMI6</h1>
                <h3>Faculte des science Dhar el Mahraz, Fés</h3>
            </div>
        </div>

        <!-- <div class="big-line">Lundi 5 Avril 2021</div> -->
        <!-- <div class="big-line"><?php // echo date('l/m/Y'); 
                                    ?></div> -->
        <div class="big-line"><?php echo displayDate($date); ?></div>


        <div class="connexion-option">
            <?php if (isset($_SESSION["login"])) {
                echo "<h2>Bonjour " . $_SESSION["login"] . "</h2>";
            }
            ?>

            <style>
                .btn-brown {
                    background-color: brown;
                    color: white;
                    padding: 0.2rem 0.4rem;
                }
            </style>
            <div class="mt-2">
                <a href="addaccount.php" class="btn btn-brown">Add Student</a>
                <a href="login.php" class="btn btn-brown">Log in</a>
                <a href="logout.php" class="btn btn-brown">Log out</a>
                <a href="options.php" class="btn btn-brown">Options</a>
            </div>
        </div>
    </header>