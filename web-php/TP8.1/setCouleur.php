<?php
setcookie("color",$_POST["color"],time() + 10*3600);
setcookie("bg",$_POST["bg"],time() + 10*3600);
setcookie("lang",$_POST["lang"],time() + 10*3600);

header("location: index.php");