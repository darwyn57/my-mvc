<?php
define('TABLE', 'article');

try {
    $pdo = new PDO('mysql:host=localhost;dbname=mvc-blog', 'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $pe) {
    die("Error : " . $pe->getMessage());
}

function getAll()
{
    //on recupere la variable pdo en dehord de la function 
    $pdo = $GLOBALS['pdo'];

    //on execute la reque vers la base de donné
    $sql = "SELECT * FROM " . TABLE;
    //on recupère tous les articles 
    $articles = $pdo->query($sql);
    //on returne tous les Article 
    return $articles->fetchAll();
}

function getById(int $id)
{
    //on recupere la variable pdo en dehord de la function 
    $pdo = $GLOBALS['pdo'];

    //on execute la reque vers la base de donné
    $sql = "SELECT * FROM " . TABLE . " WHERE id = :id ";
    //on récupère les article avec leur id
    $query = $pdo->prepare($sql);

    $query->execute([
        'id' => $id
    ]);
    return $query->fetch();
}
function addArticle(string $title, string $content): void
{
    $pdo = $GLOBALS['pdo'];
    $sql = "INSERT INTO " . TABLE . "(title, content,created_at) VALUES (:title, :content,NOW())";
    $query = $pdo->prepare($sql);
    $query->execute([
        'title' => $title,
        'content' => $content,

    ]);
}
function updateArticle(int $id, string $title, string $content): void
{
    $pdo = $GLOBALS['pdo'];
    $sql = "UPDATE " . TABLE . " SET title = :title, content = :content WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'id' => $id,
        'title' => $title,
        'content' => $content,
    ]);
}

function deleteArticle($id)
{
    $pdo = $GLOBALS['pdo'];
    $sql = "DELETE FROM " . TABLE . "  WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->execute([
        'id' => $id
    ]);
}
