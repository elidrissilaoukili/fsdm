<?php
define('MOY_REUSSITE', 10);

$students = array(
    ["E001", "moujtahid", "moujid", "SMI", 14],
    ["E002", "kaslani", "kassoul", "SMA", 9.5],
    ["E003", "Khadija", "Lbatala", "SMI", 18.99],
    ["E004", "mohammed", "elidrissi laoukili", "SMI", 20],
    ["E005", "ahmed", "3iyaan", "SMP", 3],
    ["E006", "ahmed", "Kassol", "SMP", 12],
    ["E007", "ahmed", "Waar", "SMP", 19],
    ["E008", "bnadem", "insan", "SMC", 14],
    ["E009", "kalima", "hawta", "SMC", 5],
    ["E010", "bnadem", "dar", "SMC", 3],
    ["E011", "imane", "bnita", "SMA", 5],
    ["E012", "chaymae", "bota", "SMI", 17],
    ["E013", "rachid", "kasbor", "SMA", 12],
);

function getListeParFiliere($filiere)
{
    $std_s = [];
    $i = 0;
    $students = $GLOBALS['students'];
    if (isset($_POST['pf'])) {
        $typ = $_POST['pf'];
        if ($typ == 'passed') {
            foreach ($students as $std) {
                if ($std[3] == $filiere && $std[4] >= MOY_REUSSITE) {
                    $std_s[$i] = $std;
                    $i++;
                }
            }
        }
        if ($typ == 'failed') {
            foreach ($students as $std) {
                if ($std[3] == $filiere && $std[4] < MOY_REUSSITE) {
                    $std_s[$i] = $std;
                    $i++;
                }
            }
        }
        if ($typ == '') {
            foreach ($students as $std) {
                if ($std[3] == $filiere && $std[4]) {
                    $std_s[$i] = $std;
                    $i++;
                }
            }
        }
    } else {
        foreach ($students as $std) {
            if ($std[3] == $filiere && $std[4]) {
                $std_s[$i] = $std;
                $i++;
            }
        }
        return $std_s;
    }

    return $std_s;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $f = '';
    $f = $_REQUEST['filiere'];
    if ($f == '') {
        $std = $students;
    } else {
        $std = getListeParFiliere($f);
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
        $notes[$i] = $student[4];
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
        if ($student[4] == getMax($students)) {
            $full_name = " " . $student[1] . " " . $student[2];
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


function displayStudent($std)
{
    foreach ($std as $student) {
        echo '<tr>';
        for ($i = 0; $i < count($student); $i++) {
            echo "<td>$student[$i]</td>";
        }
        echo "<td>" . getMention($student[4]) . "</td>";
        echo '</tr>';
    }
}
