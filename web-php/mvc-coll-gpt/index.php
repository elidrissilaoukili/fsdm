<?php

require './models/Model.php';
require './controllers/Controller.php';

$module = $_GET['module'] ?? null;
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;
$data = $_POST ?? null;

if ($module) {
    $controller = new Controller($module);

    if ($action && method_exists($controller, $action)) {
        if ($id) {
            $controller->$action($id, $data);
        } else {
            $controller->$action($data);
        }
    } else {
        $controller->index();
    }
} else {
    echo "Module non spécifié.";
}
?>
