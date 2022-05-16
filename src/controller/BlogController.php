<!-- require de l'ArticleManager pour utiliser les fonction -->
<?php
require_once '../src/manager/CommentManager.php';
require_once '../src/manager/ArticleManager.php';
require_once '../core/View.php';


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
        $path = "blog/index";
        $data = [
            "articles" => $articles,
            "comments" => $comments
        ];
        $viewIndex = new View($path, $data);
        $viewIndex->render();
    }


    public function article()
    {

        $comArticle = $this->commentManager->getCommentById($_GET['id']);
        $article = $this->articleManager->getById($_GET['id']);
        $path = "blog/article";
        $data = [
            "comArticle" => $comArticle,
            "article" => $article
        ];
        $viewArticle = new View($path, $data);
        $viewArticle->render();
    }
    public function newArticle()
    {


        $article = $this->articleManager->addArticle($_POST['title'], $_POST['content']);
        header('Location: /?controller=blog');
    }

    public function ajoutComment()
    {
        $comment = $this->commentManager->addComment($_POST['content'], $_POST['author'], $_POST['article_id']);
        header('Location: /?controller=blog&action=article&id=' . $_POST['article_id']);
    }
    public function showform()
    {

        $path = "blog/new-article";
        $data = [];
        $viewForm = new View($path, $data);
        $viewForm->render();
    }
    public function modifie()

    {
        $article = $this->articleManager->getById($_GET['id']);
        $path = "blog/updatearticle";
        $data = ["article" => $article];
        $modifie = new View($path, $data);
        $modifie->render();
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
    public function deleteCom()
    {
        if ($_POST['submit']) {
            $comment = $this->commentManager->deleteComment($_POST['id']);
            header('Location: /?controller=blog&action=article&id=' . $_POST['article_id']);
        } else {
            header('Location: /?controller=blog');
            die;
        }
    }
}
