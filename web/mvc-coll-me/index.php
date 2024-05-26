<?php

// require_once('controllers/controller.php');
// require_once('controllers/students.php');


$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$baseDir = 'clonedRepos/fsdm/web/mvc-coll-me';

switch ($request) {
    case $baseDir:
    case $baseDir . '/':
    case $baseDir . '/home':
        require __DIR__ . '/controllers/Controller.php';
        showHome();
        break;
    case $baseDir . '/students':
        require __DIR__ . '/controllers/Students.php';
        showStudents();
        break;
    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}
