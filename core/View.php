<?php

class View

{

    private $path;
    private $layout;
    private $data = array();

    public function __construct($path, $data = array(), $layout = 'base.html.php')
    {
        //$path c'est le chemin de la page qui seras appeler lors de la construction de la page
        $this->path = $path;
        //le tableau qui va récupérer les données
        $this->data = $data;

        //$layout remplace le bottom et le top ('base.html.php)        
        $this->layout = $layout;
    }

    public function render()
    {
        //on extrais les data qui vienne de la fonction qui seras appler
        extract($this->data);
        ob_start();
        require('../template/' . $this->path . '.html.php');
        $content = ob_get_clean();
        require('../template/' . $this->layout);
    }
}
