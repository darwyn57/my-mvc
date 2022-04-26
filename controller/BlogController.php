<!-- require de l'ArticleManager pour utiliser les fonction -->
<?php
require 'model/CommentManager.php';
require 'model/ArticleManager.php';

class BlogController
{
    private ArticleManager $articleManager;
    private CommentManager $commentManager;
    public function __construct()
    {
        $this->articleManager = new ArticleManager();
        $this->commentManager = new CommentManager();
    }
    public function index()
    {
        $comments = $this->commentManager->getAllComments();
        $articles = $this->articleManager->getAll();
        require 'view/blog/index.html.php';
    }


    public function article()
    {
        $comments = $this->commentManager->getAllComments();
        $comment = $this->commentManager->getCommentById($_GET['id']);
        $article = $this->articleManager->getById($_GET['id']);
        require 'view/blog/article.html.php';
    }
    public function newArticle()
    {

        $comment = $this->commentManager->addComment($_POST['content'], $_POST['author'], $_POST['article_id']);
        $article = $this->articleManager->addArticle($_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }
    public function showform()
    {

        require 'view/blog/new-article.html.php';
    }
    public function modifie()

    {

        $comment = $this->commentManager->getCommentById($_GET['id']);
        $article = $this->articleManager->getById($_GET['id']);
        require 'view/blog/updatearticle.html.php';
    }
    public function insertmodife()
    {
        $comment = $this->commentManager->updateComment($_POST['id'], $_POST['title'], $_POST['content']);
        $article = $this->articleManager->updateArticle($_POST['id'], $_POST['article_id'], $_POST['content']);
        header('Location: /?controller=blog');
    }
    public function delete()
    {

        $comment = $this->commentManager->deleteComment($_GET['id']);
        $article = $this->articleManager->deleteArticle($_GET['id']);
        header('Location: /?controller=blog');
    }
}
