<?php include 'view/partials/-top.html.php'; ?>

<h1><?= $article['title'] ?></h1>
<h2><?= $article['content'] ?></h2>



<?php foreach ($comments as $comment) : ?>

    <p> <?= $comment['article_id'] ?><?= $comment['content'] ?></p>

<?php endforeach; ?>
<form action="/?controller=blog&action=addComment" method="POST">
    <div class="mb-3">
        <h2>Nouveau commentaire</h2>

        <br>
        <div class="mx-5">
            <h3>auteur</h3>
            <input class="mb-4" type="text" name="title" required />
        </div>
        <div class="mx-5">
            <h3>Votre commentaire</h3>
            <textarea type="text" class="mb-4" id="text"></textarea>
            <br>
            <button type="submit" class="btn btn-primary mx-5">Submit</button>
        </div>

    </div>
</form>


<th scope="row"><?= $article['id'] ?></th>
<td><?= $article['title'] ?></td>
<td><?= $article['content'] ?></td>
<td><?= $article['created_at'] ?></td>





<?php include 'view/partials/-bottom.html.php'; ?>