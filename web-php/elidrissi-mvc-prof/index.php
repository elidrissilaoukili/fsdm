<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require './controllers/Controller.php';
if (!isset($_SESSION['username'])) {
	login();
	exit;
}

try {
	$module = isset($_GET['module']) ? $_GET['module'] : 'index';
	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
	$action .= 'Action';

	if (is_callable($action)) {
		$action($module);
	} else {
		throw new Exception("Funtion not found", 1);
	}
} catch (Exception $e) {
	echo 'error: ' . $e->getMessage();
}
