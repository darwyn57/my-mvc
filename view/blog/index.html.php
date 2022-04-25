<?php include  'view/partials/-top.html.php'; ?>



<h1>Page d'acceuil du blog</h1>

<button type="button" class="btn btn-outline-danger ms-5"><a href="/?controller=blog&action=showform">Nouvelle article</a></button>


<table class="table table-bordered bordered-dark table table-hover mt-5">
    <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">date de création</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <th scope="row"><?= $article['id'] ?></th>
                <td> <a href="/?controller=blog&action=article&id=<?= $article['id'] ?>"><?= $article['title'] ?></a>
                </td>
                <td><?= $article['created_at'] ?></td>
                <td><a href="/?controller=blog&action=delete&id=<?= $article['id'] ?>"><i class="bi bi-trash3 "></i></a>
                    <br>
                    <br>
                    <a href="/?controller=blog&action=modifie&id=<?= $article['id'] ?>"><i class="bi bi-pencil"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<?php include 'view/partials/-bottom.html.php'; ?>



<!-- BDD <-> MODELE(manager) <-> CONTROLEUR -> VUE -->