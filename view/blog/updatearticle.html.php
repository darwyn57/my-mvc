<?php include 'view/partials/-top.html.php'; ?>
<div class="container">


    <div class="my-5">
        <button type="button" class="btn btn-outline-secondary"><a href="/?controller=blog">retour</a></button>
    </div>
    <h2>modification de votre article</h2>
    <form action="/?controller=blog&action=insertmodife" method="POST">
        <label>Titre article</label>
        <div class="my-2">
            <input class="mb-4" type="text" class="form-control input-lg" size="50" id='title' name="title" value="<?= htmlspecialchars($article['title']) ?>" />
        </div>
        <label>content</label>
        <div class="my-2">
            <textarea cols="50" rows="5" name="content"><?= $article['content'] ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?= $article['id'] ?>" />
        <button type="button" class="btn btn-outline-success" /><input type="submit" name="submit" value="Enregistrer" />
    </form>
    <?php if (!empty($message)) : ?>
        <div classs="alert">
            <?= $message ?>
        </div>
    <?php endif; ?>

</div>


<?php include 'view/partials/-bottom.html.php'; ?>