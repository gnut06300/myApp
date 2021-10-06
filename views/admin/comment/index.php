<?php $titlePage = 'Administration des Commentaires'; ?>
<h1>Administration des Commentaires</h1>

<?php if (isset($_GET['success'])) : ?>
    <div class="alert alert-success">Vous êtes connecté !</div>
<?php endif ?>

<a href="/admin/posts/create" class="btn btn-success my-3">Créer un nouvel article</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Contenu</th>
            <th scope="col">Publié le</th>
            <th scope="col">Auteur</th>
            <th scope="col">Id Article</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['comments'] as $comment) : ?>
            <tr>
                <th scope="row"><?= $comment->id ?></th>
                <td><?= htmlspecialchars($comment->getExcerpt()) ?></td>
                <td><?= $comment->getCreatedAt() ?></td>
                <td><?= htmlspecialchars($comment->getAuthor()->username) ?></td>
                <td class="text-center"><a href="/posts/<?= $comment->post_id ?>"><?= $comment->post_id ?></a></td>
                <td>
                    <a href="/admin/comments/edit/<?= $comment->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/admin/comments/delete/<?= $comment->id ?>" method="post" class="d-inline">
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                <?php if ($comment->checked == 0) : ?>
                    <form action="/admin/comments/checked/<?= $comment->id ?>" method="post" class="d-inline">
                    <button class="btn btn-primary">Valider</button>
                </form>
                <?php else : ?>
                    <form action="/admin/comments/nochecked/<?= $comment->id ?>" method="post" class="d-inline">
                    <button class="btn btn-success">Checked</button>
                </form>
                <?php endif ?>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>