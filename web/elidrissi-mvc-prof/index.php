<?php

try {
	$module = isset($_GET['module']) ? $_GET['module'] : 'index';
	$action = isset($_GET['action']) ? $_GET['action'] : 'index';
	$action .= 'Action';
	require './controllers/Controller.php';
	if(is_callable($action)){
		$action($module);
	} else {
		throw new Exception("Error 404 Page Not Found", 1);
	}
 
} catch(Exception $e){
	echo 'error: ' . $e->getMessage();
}