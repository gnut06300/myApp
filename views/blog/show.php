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