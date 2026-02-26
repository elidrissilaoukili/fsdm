<?php
require_once '../configs/init.php';;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=<?php echo CSSPATH . "/listStudents.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "/listFiliere.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "/style.css"; ?> />
    <link rel="stylesheet" href=<?php echo CSSPATH . "/add.css"; ?> />

</head>

<body>

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
        <div class="big-line"><?php echo displayDate('ar'); ?></div>


    </header>