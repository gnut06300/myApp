<?php $titlePage = 'Administration des Articles'; ?>
<h1>Administration des Articles</h1>

<?php if (isset($_GET['success'])) : ?>
    <div class="alert alert-success">Vous êtes connecté !</div>
<?php endif ?>

<a href="/admin/posts/create" class="btn btn-success my-3">Créer un nouvel article</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Publié le</th>
            <th scope="col">Auteur</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['posts'] as $post) : ?>
            <tr>
                <th scope="row"><?= $post->id ?></th>
                <td><?= htmlspecialchars($post->title) ?></td>
                <td><?= $post->getCreatedAt() ?></td>
                <td><?= htmlspecialchars($post->getAuthor()->username) ?></td>
                <td>
                    <a href="/admin/posts/edit/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/admin/posts/delete/<?= $post->id ?>" method="post" class="d-inline">
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>