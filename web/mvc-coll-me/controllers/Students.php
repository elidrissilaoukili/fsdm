<?php
// include './models/model.php';


require_once(__DIR__ . '/../models/model.php');

function showStudents()
{
    $table = 'students';
    $data = findAll($table);
    include __DIR__ . '/../views/students.php';
}
