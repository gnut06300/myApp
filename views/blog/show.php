<?php

use App\Models\Comment;

$titlePage = 'Article : ' . $params['post']->id ?>
<?php // var_dump($params['post']) 
?>

<div class="mt-5 px-3 rounded bg-light">
    <h1>Article : <?= htmlspecialchars($params['post']->title) ?></h1>
    <div>
        <?php foreach ($params['post']->getTags() as $tag) : ?>
            <span class="badge badge-success"><a href="<?= REPERT ?>/tags/<?= $tag->id ?>" class="text-white"><?= $tag->name ?></a></span>
        <?php endforeach ?>
    </div>
    <p class="mt-3"><?= htmlspecialchars($params['post']->getExcerpt()) ?></p>
    <small class="text-info">Publié le : <?= $params['post']->getCreatedAt() ?> <?= ($params['post']->created_at != $params['post']->updated_at) ? '- Modifié le :' . $params['post']->getUpdatedAt() : "" ?> par </small><b><?= $params['post']->getAuthor()->username ?></b>
    <p><?= nl2br(htmlspecialchars($params['post']->content)) ?></p>
</div>

<p class="font-weight-bold text-decoration-underline">Commentaire(s) :</p>
<?php if (isset($_SESSION['user_id'])) : ?>
    <?php if (isset($_SESSION['errors'])) : ?>
        <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
            <?php foreach ($errorsArray as $errors) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        <?php endforeach ?>
        <?php $_SESSION['errors'] = []; ?>
    <?php endif ?>
    <?php if (isset($_GET['comment']) && $_GET['comment'] === 'created') : ?>
        <div class="alert alert-success">
            <p><?= $_SESSION['username'] ?> ton commentaire à été enregistré, il sera validé au plus vite</p>
        </div>
    <?php else : ?>
    <form action="<?= REPERT . "/posts/{$params['post']->id}" ?>" method="post">
        <div class="form-group">
            <label for="content">Rédiger votre commentaire</label>
            <textarea name="content" id="content" rows="5" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer votre commentaire</button>
    </form>
    <?php endif ?>
<?php else : ?>
    <p>Vous devez être Enregistrer si vous voulez écrire un commentaire</p>
<?php endif ?>
<?php foreach ($params['post']->getComments() as $comment) : ?>
    <div class="row">
        <div class="col-12 col-sm-7 bg-light my-4">
            <small class="text-info">Publié le : <?= $params['post']->getDateFrench($comment->created_at) ?> <?= ($comment->created_at != $comment->updated_at) ? '- Modifié le :' . $params['post']->getDateFrench($comment->updated_at()) : "" ?> par </small><b><?= $params['post']->getAuthorComment($comment->user_id)->username  ?></b>
            <p><?= nl2br(htmlspecialchars($comment->content)) ?></p>
        </div>
        <div class="col-12 col-sm-5"></div>
    </div>
<?php endforeach ?>

<a href="<?= REPERT ?>/posts" class="mt-4 btn btn-secondary">Retouner en arrière</a>