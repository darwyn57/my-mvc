<?php

require_once 'model/Manager.php';
class ArticleManager extends Manager
{

    function getAll()
    {
        //on execute la reque vers la base de donné
        $sql = "SELECT * FROM article ";
        //on recupère tous les articles 
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $articles = $req->fetchAll();
        //on returne tous les Article 
        return $articles;
    }

    function getById(int $id)
    {

        //on execute la reque vers la base de donné
        $sql = "SELECT * FROM article WHERE id = :id ";
        //on récupère les article avec leur id
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
        $article = $req->fetch();
        return $article;
    }
    function addArticle(string $title, string $content): void
    {

        $sql = "INSERT INTO article (title, content,created_at) VALUES (:title, :content,NOW())";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'title' => $title,
            'content' => $content,

        ]);
    }
    function updateArticle(int $id, string $title, string $content): void
    {
        $sql = "UPDATE article SET title = :title, content = :content WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id,
            'title' => $title,
            'content' => $content,
        ]);
    }

    function deleteArticle($id)
    {

        $sql = "DELETE FROM article WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'id' => $id
        ]);
    }
}
