<div class="mx-5">
    <h1><?= $article['title'] ?></h1>
    <h3><?= $article['content'] ?></h3>
</div>


<?php foreach ($comArticle as $comment) : ?>
    <div class="mx-5">
        <h3 class="mx-5">Commentaire de: <?= $comment['author'] ?></h3>
        <p><?= $comment['content'] ?></p>
        <p>crée le: <?= $comment['created_at'] ?></p>

        <form action="/?controller=blog&action=deleteCom" method="POST">
            <input type="hidden" name="article_id" value="<?= $article['id'] ?>" />
            <input type="hidden" name="id" value="<?= $comment['id'] ?>" />
            <input type="submit" name="submit" value="🚮" /></input>
        </form>
    </div>
<?php endforeach; ?>

<form action="/?controller=blog&action=ajoutComment" method="POST">
    <input type="hidden" name="article_id" value="<?= $article['id'] ?>" />
    <div class="mb-3">
        <h2>Nouveau commentaire</h2>

        <br>
        <div class="mx-5">
            <h3>auteur</h3>
            <input class="mb-4" type="text" name="author" required />
        </div>
        <div class="mx-5">
            <h3>Votre commentaire</h3>
            <textarea type="text" class="mb-4" id="text" name="content"></textarea>
            <br>
            <button type="submit" name="submit" class="btn btn-primary mx-5">Submit</button>
        </div>

    </div>
</form>