<?php include 'view/partials/-top.html.php'; ?>
<div class="mx-5">
    <h1><?= $article['title'] ?></h1>
    <h3><?= $article['content'] ?></h3>
</div>


<?php foreach ($comArticle as $comment) : ?>
    <div class="mx-5">
        <h3 class="mx-5"><?= $comment['author'] ?></h3>
        <p><?= $comment['content'] ?></p>
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







<?php include 'view/partials/-bottom.html.php'; ?>