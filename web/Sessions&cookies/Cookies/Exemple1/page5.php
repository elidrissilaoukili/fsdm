<?php
//session_start();
//$_SESSION["connecte"]= true;
//$v = (isset($_SESSION["connecte"]))? "OK":"KO";

//$_COOKIE["connecte"]= true;
setcookie("connecte","true",time() + 60 * 5);
$v = (isset($_COOKIE["connecte"]))? "OK":"KO";
?>

<html>

<body>
<h1 align = "center">Cookies: Page 5</h1>
la variable est maintenant <?php echo $v ?>
<hr />
<a href= "page1.php">Page1</a><br />
<a href= "page2.php">Page2</a><br />
<a href= "page3.php">Page3</a><br />
<a href= "page4.php">Page4</a><br />
<a href= "page5.php">Page5</a><br />
<a href= "page6.php">Page6</a><br />
<a href= "page7.php">Page7</a><br />
<a href= "page8.php">Page8</a><br />
<a href= "page9.php">Page9</a><br />
<a href= "page10.php">Page10</a><br />

</body>
</html>