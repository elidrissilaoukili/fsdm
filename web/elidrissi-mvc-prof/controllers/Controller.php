<?php
require './models/model.php';

function indexAction($module)
{
    render('./views/vindex.php');
}

function listAction($module)
{
    $view = './views/vlist.php';
    $data = [
        "module" => $module,
        "list" => findAll($module)
    ];

    render($view, $data);
}

function detailAction($module)
{
    $view = './views/vdetail.php';
    $data = [
        "module" => $module,
        "element" => findOne($module, $_GET["id"]),
    ];

    render($view, $data);
}

function deleteAction($module)
{
    delete($module, $_GET['id']);
    header("Location: index.php?module=" . $module . "&action=list");
    exit;
}

function editAction($module)
{
    $erreur = null; // Initialize $erreur outside of the conditionals

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"] ?? null;
        $element = empty($id) ? null : findOne($module, $id);
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $element = $_POST;
        // Ensure the id is included in the POST data if it's an update
        $id = $_POST["id"] ?? null;
        if ($id) {
            $element["id"] = $id; // Ensure the ID is correctly set for updating
        }

        if (save($module, $element)) {
            header("location: index.php?module=" . $module . "&action=list");
            exit;
        } else {
            $erreur = "Cet élément n'est pas sauvegardé.";
        }
    }

    // Set the view and render it for POST requests
    $view = empty($id) ? "views/vajouter.php" : "views/vmodifie.php";
    $variabls = [
        "keys" => describe($module),
        "module" => $module,
        "element" => $element,
        "erreur" => $erreur,
    ];
    render($view, $variabls);
}



function render($view, $data = [])
{
    if (file_exists($view)) {
        extract($data);

        ob_start();
        require($view);
        $view = ob_get_clean();

        ob_start();
        require("./views/template.php");
        $output = ob_get_clean();

        exit($output);
    } else {
        throw new Exception("404 Page not found", 1);
    }
}


function logoutAction()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: login.php");
    exit;
}
