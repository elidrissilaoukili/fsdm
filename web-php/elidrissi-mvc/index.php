<?php

// // Include the main controller file
// include './controllers/Controller.php';

// // Get the action from the URL, default to 'index' if not set
try {
    require("./controllers/Controller.php");
    $action = $_GET['action'] ?? 'index';
    $action .= "Action";
    $action();
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
}


