<?php


// Assuming you're already connected to the database here...
require_once "db_connect.php";

// SQL query to select data from the 'etudiant' table
$sql = "SELECT codeE, nom, prenom, filiere, note FROM etudiant";
$stmt = $conn->query($sql);

// Fetch associative array from the result set
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the associative array (you can also do further processing here)
// echo '<pre>';
// print_r($data);



// $students = [
//     [
//         "code" => "E001",
//         "fname" => "moujtahid",
//         "lname" => "moujid",
//         "major" => "SMI",
//         "note" => 14
//     ],
//     [
//         "code" => "E002",
//         "fname" => "kaslani",
//         "lname" => "kassoul",
//         "major" => "SMA",
//         "note" => 9.5
//     ],
//     [
//         "code" => "E003",
//         "fname" => "Khadija",
//         "lname" => "Lbatala",
//         "major" => "SMI",
//         "note" => 18.99
//     ],
//     [
//         "code" => "E004",
//         "fname" => "mohammed",
//         "lname" => "elidrissi laoukili",
//         "major" => "SMI",
//         "note" => 20
//     ],
//     [
//         "code" => "E005",
//         "fname" => "ahmed",
//         "lname" => "3iyaan",
//         "major" => "SMP",
//         "note" => 3
//     ],
//     [
//         "code" => "E006",
//         "fname" => "ahmed",
//         "lname" => "Kassol",
//         "major" => "SMP",
//         "note" => 12
//     ],
//     [
//         "code" => "E007",
//         "fname" => "ahmed",
//         "lname" => "Waar",
//         "major" => "SMP",
//         "note" => 19
//     ],
//     [
//         "code" => "E008",
//         "fname" => "bnadem",
//         "lname" => "insan",
//         "major" => "SMC",
//         "note" => 14
//     ],
//     [
//         "code" => "E009",
//         "fname" => "kalima",
//         "lname" => "hawta",
//         "major" => "SMC",
//         "note" => 5
//     ],
//     [
//         "code" => "E010",
//         "fname" => "bnadem",
//         "lname" => "dar",
//         "major" => "SMC",
//         "note" => 3
//     ],
//     [
//         "code" => "E011",
//         "fname" => "imane",
//         "lname" => "bnita",
//         "major" => "SMA",
//         "note" => 5
//     ],
//     [
//         "code" => "E012",
//         "fname" => "chaymae",
//         "lname" => "bota",
//         "major" => "SMI",
//         "note" => 17
//     ],
//     [
//         "code" => "E013",
//         "fname" => "rachid",
//         "lname" => "kasbor",
//         "major" => "SMA",
//         "note" => 12
//     ],
// ];
