<?php
require_once 'model/Manager.php';
class CommentManager extends Manager
{

    function getAllComments()
    {
        //on execute la reque vers la base de donné
        $sql = "SELECT * FROM comment ";
        //on recupère tous les articles 
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $comments = $req->fetchAll();
        //on returne tous les commentaires 
        return $comments;
    }

    function getCommentById(int $id)
    {

        //on execute la reque vers la base de donné
        $sql = "SELECT * FROM comment WHERE article_id =" . $id;
        //on récupère les commentaires avec leur id
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'article_id' => $id
        ]);
        $comArticle = $req->fetchAll();
        return $comArticle;
    }
    function addComment(string $content, string $author, int $article_id)
    {

        $sql = "INSERT INTO comment (content,author,created_at,article_id) VALUES (:content, :author,NOW(),:article_id)";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'content' => $content,
            'author' => $author,
            'article_id' => $article_id
        ]);
    }
    function updateComment(string $content, int $article_id): void
    {
        $sql = "UPDATE comment SET content = :content WHERE article_id = :article_id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([

            'content' => $content,
            'article_id' => $article_id
        ]);
    }

    function deleteComment($id)
    {

        $sql = "DELETE FROM comment WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
    }
}
