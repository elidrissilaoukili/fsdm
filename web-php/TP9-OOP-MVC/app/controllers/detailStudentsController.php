<?php
require_once '../../app/configs/sessions.php';
startSession();
require_once '../../app/models/addaccountModel.php';


$studentModel = new EtudiantModel();
$conn = $studentModel->connect_db(); // Get the connection
$student = $studentModel->getE($conn); // Pass the connection as an argument
$studentModel->deleteE($conn); // Pass the connection as an argument

$conn = null; // Close the connection