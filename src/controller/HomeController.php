<?php
require_once '../core/View.php';
class HomeController
{

    function index()
    {
        $path = "home/index";
        $data = [];
        $layout = 'base.html.php';

        $layout = 'base.html.php';
        $viewIndex = new View($path, $data, $layout);
        $viewIndex->render();
    }
}
