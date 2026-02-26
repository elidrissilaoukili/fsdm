<?php
class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = [
            '/' => 'index.php',
            '/add' => 'add.php',
            '/addAccount' => 'addAccount.php',
            '/listStudents' => 'listStudents.php',
            '/detailStudents' => 'detailStudents.php',
            '/editStudents' => 'editStudents.php',
            '/listFiliere' => 'listFiliere.php',
            '/login' => 'login.php',
            '/logout' => 'logout.php',
            '/options' => 'options.php',
            '/sentData' => 'sentData.php'
        ];
    }

    public function route($url)
    {
        if ($url === '/') {
            include('./index.php');
        } elseif (array_key_exists($url, $this->routes)) {
            include($this->routes[$url]);
        } else {
            header("Location: error.php");
            exit;
        }
    }
}
