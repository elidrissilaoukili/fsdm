<<<<<<< HEAD
<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
=======
<?php 

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
>>>>>>> debed246c35179de1f191a3660fb5fab231419dc
}

function esc($str)
{
<<<<<<< HEAD
    return htmlspecialchars($str);
=======
	return htmlspecialchars($str);
>>>>>>> debed246c35179de1f191a3660fb5fab231419dc
}


function redirect($path)
{
<<<<<<< HEAD
    header("Location: " . ROOT . "/" . $path);
    die;
=======
	header("Location: " . ROOT."/".$path);
	die;
>>>>>>> debed246c35179de1f191a3660fb5fab231419dc
}


function displayDate($lang)
{
    $days = [
        "ar" => [
            "الأحد",
            "الإثنين",
            "الثلاثاء",
            "الأربعاء",
            "الخميس",
            "الجمعة",
            "السبت",
        ],
        "fr" => [
            "Dimanche",
            "Lundi",
            "Mardi",
            "Mercredi",
            "Jeudi",
            "Vendredi",
            "Samedi",
        ],
        "en" => [
            "Sunday",
            "Monday",
            "Tuesday",
            "Wednesday",
            "Thursday",
            "Friday",
            "Saturday",
        ],
    ];

    $months = [
        "ar" => [
            "",
            "يناير",
            "فبراير",
            "مارس",
            "أبريل",
            "مايو",
            "يونيو",
            "يوليو",
            "أغسطس",
            "سبتمبر",
            "أكتوبر",
            "نوفمبر",
            "ديسمبر"
        ],
        "fr" => [
            "",
            "Janvier",
            "Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Août",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre"
        ],
        "en" => [
            "",
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
    ];

    $date = getDate();
    $dayw = $date["wday"];
    $daym = $date["mday"];
    $month = $date["mon"];
    $year = $date["year"];

    return $days[$lang][$dayw] . "($daym) / " . $months[$lang][$month] . " / " . $year;
<<<<<<< HEAD
}
=======
}
>>>>>>> debed246c35179de1f191a3660fb5fab231419dc
