<?php include 'view/partials/-top.html.php'; ?>

<h1>Article</h1>

<table class="table table-bordered bordered-dark table table-hover">
    <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">content</th>
        <th scope="col">date de création</th>
    </tr>
    </thead>
    <tbody>

        <tr>
            <th scope="row"><?= $article['id'] ?></th>
            <td><?= $article['title'] ?></td>
            <td><?= $article['content'] ?></td>
            <td><?= $article['created_at'] ?></td>
        </tr>

    </tbody>
</table>


<?php include 'view/partials/-bottom.html.php'; ?>