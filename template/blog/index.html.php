<h1>Page d'acceuil du blog</h1>

<button type="button" class="btn btn-success ms-5"><a href="/?controller=blog&action=showform" class="text-decoration-none"><i class="bi bi-file-earmark-text" style="color:black">New article</i></a></button>


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
                <td> <a href="/?controller=blog&action=article&id=<?= $article['id'] ?>" class="text-decoration-none" style="color:black"><?= $article['title'] ?></a>
                </td>
                <td><?= $article['created_at'] ?></td>
                <td><a href="/?controller=blog&action=delete&id=<?= $article['id'] ?>" class="text-decoration-none"><i class="bi bi-trash3" style="color:red"></i></a>
                    <br>
                    <br>
                    <a href="/?controller=blog&action=modifie&id=<?= $article['id'] ?>" class="text-decoration-none"><i class="bi bi-pencil" style="color:green"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>








<!-- BDD <-> MODELE(manager) <-> CONTROLEUR -> VUE -->