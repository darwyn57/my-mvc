<?php


//on verifie si le $_GET et vide ou pas 
if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'home';
}
// on verifie si le fichier existe 
if (file_exists('controller/' . $controller . '-controller.php')) {
    require 'controller/' . $controller . '-controller.php';

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }
    if (function_exists($action)) {
        $action();
    } else {
        header('HTTP/1.1 404 not found');
        echo 'Erreur 404 Not Found';
    }
} else {

    header('HTTP/1.1 404 not found');
    echo 'Erreur 404 Not Found';
}
