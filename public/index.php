<?php

//on verifie si le $_GET et vide ou pas 
if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'home';
}


// on verifie si le fichier existe 
if (file_exists('../src/controller/' . ucfirst($controller) . 'Controller.php')) {
    require '../src/controller/' . ucfirst($controller) . 'Controller.php';

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }

    $Namecontroller = ucfirst($controller) . 'Controller';
    if (class_exists($Namecontroller)) {
        $controller = new $Namecontroller();
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {

            header('HTTP/1.1 404 not found');
            echo 'Erreur1 404 Not Found';
        }
    } else {

        header('HTTP/1.1 404 not found');
        echo 'Erreur2 404 Not Found';
    }
} else {

    header('HTTP/1.1 404 not found');
    echo 'Erreur3 404 Not Found';
}
