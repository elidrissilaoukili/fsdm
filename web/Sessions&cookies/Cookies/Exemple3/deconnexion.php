<?php
//session_start();
//session_destroy();
//header("location: form.php");

setcookie("login","du n'importe quoi", time()- 60); //le pass�;
header("location: form.php");
?>