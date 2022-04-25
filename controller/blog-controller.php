<!-- require de l'ArticleManager pour utiliser les fonction -->
<?php

require 'model/ArticleManager.php';



function index()
{
    $articles = getAll();
    require 'view/blog/index.html.php';
}


function article()
{

    $article = getById($_GET['id']);

    require 'view/blog/article.html.php';
}
function newArticle()
{
    $article = addArticle($_POST['title'], $_POST['content']);
    header('Location: /?controller=blog');
}
function showform()
{

    require 'view/blog/new-article.html.php';
}
function modifie()

{
    $article = getById($_GET['id']);

    require 'view/blog/updatearticle.html.php';
}
function insertmodife()
{
    $article = updateArticle($_POST['id'], $_POST['title'], $_POST['content']);
    header('Location: /?controller=blog');
}
function delete()
{
    $article = deleteArticle($_GET['id']);
    header('Location: /?controller=blog');
}
