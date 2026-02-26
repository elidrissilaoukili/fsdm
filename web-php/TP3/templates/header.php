<?php
include './configs/date.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/listStudents.css" />
    <link rel="stylesheet" href="./style/listFiliere.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="./style/add.css" />

    <title>FSDM</title>
</head>

<body>

    <header>
        <div class="header-main">
            <img src="./images/f.jpeg" alt="" />
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