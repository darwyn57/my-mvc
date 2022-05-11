<div class="container">


    <div class="my-5">
        <button type="button" class="btn btn-outline-secondary"><a href="/?controller=blog">retour</a></button>
    </div>
    <h2>Nouvelle article </h2>
    <form action="/?controller=blog&action=newArticle" method="POST">
        <label>Titre article</label>
        <div class="my-2">
            <input class="mb-4" type="text" name="title" required />
        </div>
        <label>content</label>
        <div class="my-2">
            <textarea name="content"></textarea>
        </div>
        <button type="button" class="btn btn-outline-success"><input type="submit" name="submit" value="Enregistrer" /></button>
    </form>
    <?php if (!empty($message)) : ?>
        <div classs="alert">
            <?= $message ?>
        </div>
    <?php endif; ?>

</div>