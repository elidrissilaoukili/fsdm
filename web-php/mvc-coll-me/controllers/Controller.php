<?php
// include './models/model.php';

require_once(__DIR__ . '/../models/model.php');

function showHome()
{
    $data = "Welcome to the Home Page!";
    include __DIR__ . '/../views/home.php';
}
