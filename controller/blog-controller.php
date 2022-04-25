<!-- require de l'ArticleManager pour utiliser les fonction -->
<?php

require 'model/ArticleManager.php';

class BlogController
{

    public function index()
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->getAll();
        require 'view/blog/index.html.php';
    }


    public function article()
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->getById($_GET['id']);
        require 'view/blog/article.html.php';
    }
    public function newArticle()
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->addArticle($_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }
    public function showform()
    {

        require 'view/blog/new-article.html.php';
    }
    public function modifie()

    {
        $articleManager = new ArticleManager();
        $article = $articleManager->getById($_GET['id']);


        require 'view/blog/updatearticle.html.php';
    }
    public function insertmodife()
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->updateArticle($_POST['id'], $_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }
    public function delete()
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->deleteArticle($_GET['id']);
        header('Location: /?controller=blog');
    }
}
