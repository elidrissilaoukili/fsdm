<?php
include("controller/controller.php");
$action = $_GET["action"] ?? "index"; //index

$action(); // index();