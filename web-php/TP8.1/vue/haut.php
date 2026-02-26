<?php
session_start();
// $lang = "FR";
$lang = $_COOKIE["lang"] ?? "FR";
$color = $_COOKIE["color"] ?? "black";
$bg = $_COOKIE["bg"] ?? "white";
function genererDate($lang){
    $jours["FR"] = ["Dimanche","Lundi","Mardi","Merecredi","Jeudi","Vendredi","Samedi"];
    $jours["EN"] = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    $jours["AR"] = ["الأحد","الاثنين","الثلاثاء ","الأربعاء","الخميس","الجمعة","السبت"];

    $mois["FR"] = ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"];
    $mois["EN"] = ["January","Febuary","March","April","Mau","June","July","August","September","October","November","December"];
    $mois["AR"] = ["يناير","فبراير","مارس","أبريل","ماي","يونيو","يوليوز ","غشت","شتنبر","أكتوبر","نونبر","دجنبر"];
    
    $d = getdate();
    $jour = $d["wday"];
    $jourNum = $d["mday"];
    $moisNum = $d["mon"];
    $annee= $d["year"];
    return $jours[$lang][$jour]." ".$jourNum ." ". $mois[$lang][$moisNum -  1] ." ". $annee;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
</head>

<body style="color: <?=$color?>;background-color: <?=$bg?>;">
    <header>
        <img src="./fsdm.jpg" alt="">
        <!-- <img src="https://th.bing.com/th/id/R.01d91b06329220fb931568edca76575f?rik=NhpKpzrv8LuvaA&riu=http%3a%2f%2fwww.conferences-fstf.usmba.ac.ma%2fWEIHT2015%2fimages%2ffsdm.png&ehk=CHnr7I9ERfXXZK2lcNVvMgT932K13GnVsTfkE0BSHFU%3d&risl=&pid=ImgRaw&r=0" alt=""> -->
        <div id="SMI6">
            <h2>SMI6</h2>
            <p>faculté de science dhar lmehrez</p>
        </div>
        <div id="Line1">
            <p id="date"><?=genererDate($lang)?></p>
        </div>
    </header>
    <div style="text-align: right;">
    <?php
    if(isset($_SESSION["Login"]))
    echo "Bonjour ".$_SESSION["Login"]["Login"]." <a href='index.php?action=deconnexion'>deconnecter<a/>";
    else
    echo "non connécté";
    ?> || <a href="index.php?action=option">Options</a></div>