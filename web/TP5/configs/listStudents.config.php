<?php

include "students.php";

define('MOY_REUSSITE', 10);

function getListeParFiliere($filiere)
{
    $std_s = [];
    $i = 0;
    $students = $GLOBALS['students'];
    if (isset($_POST['pf'])) {
        $typ = $_POST['pf'];
        if ($typ == 'passed') {
            foreach ($students as $std) {
                if ($std['major'] == $filiere && $std['note'] >= MOY_REUSSITE) {
                    $std_s[$i] = $std;
                    $i++;
                }
            }
        }
        if ($typ == 'failed') {
            foreach ($students as $std) {
                if ($std['major'] == $filiere && $std['note'] < MOY_REUSSITE) {
                    $std_s[$i] = $std;
                    $i++;
                }
            }
        }
        if ($typ == '') {
            foreach ($students as $std) {
                if ($std['major'] == $filiere && $std['note']) {
                    $std_s[$i] = $std;
                    $i++;
                }
            }
        }
    } else {
        foreach ($students as $std) {
            if ($std['major'] == $filiere && $std['note']) {
                $std_s[$i] = $std;
                $i++;
            }
        }
        return $std_s;
    }

    return $std_s;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    if (isset($_POST['filiere'])) {
        $f = '';
        $f = $_POST['filiere'];
        if ($f == '') {
            $std = $students;
        } else {
            $std = getListeParFiliere($f);
        }
    }
} else {
    $f = '';
    if ($f == '') {
        $std = $students;
    }
}

function getMax($students)
{
    $max_note = 0;
    $i = 0;
    $notes = [];
    foreach ($students as $student) {
        $notes[$i] = $student['note'];
        $i++;
    }
    for ($i = 0; $i < count($notes); $i++) {
        if ($max_note < $notes[$i]) {
            $max_note = $notes[$i];
        }
    }
    return $max_note;
}

function getNameMax($students)
{
    $full_name = '';
    foreach ($students as $student) {
        if ($student['note'] == getMax($students)) {
            $full_name = " " . $student['fname'] . " " . $student['lname'];
        }
    }
    return strtoupper($full_name);
}

function getMention($note)
{
    $mention = "";
    switch (true) {
        case $note < 10:
            $mention = "Failed";
            break;
        case $note == 10:
            $mention = "Passed";
            break;
        case 10 < $note && $note < 15:
            $mention = "Doing well";
            break;
        case 15 <= $note && $note < 18:
            $mention = "Hard working";
            break;
        case 18 <= $note && $note <= 20:
            $mention = "Outstanding!!";
            break;
    }
    return $mention;
}


// function displayStudent($std)
// {
//     foreach ($std as $student) {
//         echo '<tr>';
//         // Access student data using associative keys
//         echo "<td><a href='detailStudents.php'>{$student['code']}</a></td>";
//         echo "<td>{$student['fname']}</td>";
//         echo "<td>{$student['lname']}</td>";
//         echo "<td>{$student['major']}</td>";
//         echo "<td>{$student['note']}</td>";
//         echo "<td>" . getMention($student['note']) . "</td>";
//         echo '</tr>';
//     }
// }