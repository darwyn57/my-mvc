<!-- require de l'ArticleManager pour utiliser les fonction -->
<?php

require 'model/ArticleManager.php';

class BlogController
{
    private ArticleManager $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    }
    public function index()
    {

        $articles = $this->articleManager->getAll();
        require 'view/blog/index.html.php';
    }


    public function article()
    {

        $article = $this->articleManager->getById($_GET['id']);
        require 'view/blog/article.html.php';
    }
    public function newArticle()
    {

        $article = $this->articleManager->addArticle($_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }
    public function showform()
    {

        require 'view/blog/new-article.html.php';
    }
    public function modifie()

    {

        $article = $this->articleManager->getById($_GET['id']);
        require 'view/blog/updatearticle.html.php';
    }
    public function insertmodife()
    {

        $article = $this->articleManager->updateArticle($_POST['id'], $_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }
    public function delete()
    {

        $article = $this->articleManager->deleteArticle($_GET['id']);
        header('Location: /?controller=blog');
    }
}
