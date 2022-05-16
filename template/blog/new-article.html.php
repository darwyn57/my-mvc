<div class="container text-center">


    <div class=" my-5">
        <div class="my-5">
            <button type="button" class="btn btn-warning"><a href="/?controller=blog" class="text-decoration-none" style="color:black"><i class="bi bi-arrow-left-circle-fill" style="color:black"></i>retour</a></button>
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
            <button type="submit" name="submit" class="btn btn-success mx-5" style="color:black">Enregistré<i class="bi bi-send-fill"></i></button>
        </form>
        <?php if (!empty($message)) : ?>
            <div classs="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>

    </div>