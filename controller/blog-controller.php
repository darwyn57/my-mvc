<!-- require de l'ArticleManager pour utiliser les fonction -->
<?php

require 'model/ArticleManager.php';

class Article extends ArticleManager
{

    public function index()
    {
        $articleManager = new ArticleManager();
        $articleManager->getAll();
        $articles = $articleManager->getAll();
        require 'view/blog/index.html.php';
    }


    public function article()
    {
        $articleManager = new ArticleManager();
        $articleManager->getById($_GET['id']);
        $article = $articleManager->getById($_GET['id']);
        require 'view/blog/article.html.php';
    }
    public function newArticle()
    {
        $articleManager = new ArticleManager();
        $articleManager->addArticle($_POST['title'], $_POST['content']);
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
        $articleManager->getById($_GET['id']);
        $article = $articleManager->getById($_GET['id']);


        require 'view/blog/updatearticle.html.php';
    }
    public function insertmodife()
    {
        $articleManager = new ArticleManager();
        $articleManager->updateArticle($_POST['id'], $_POST['title'], $_POST['content']);
        $article = $articleManager->updateArticle($_POST['id'], $_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }
    public function delete()
    {
        $articleManager = new ArticleManager();
        $articleManager->deleteArticle($_GET['id']);
        $article = $articleManager->deleteArticle($_GET['id']);
        header('Location: /?controller=blog');
    }
}
