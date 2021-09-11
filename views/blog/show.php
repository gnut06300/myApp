<?php $titlePage = 'Article : ' . $params['post']->id ?>
<?php // var_dump($params['post']) 
?>
<h1>Article : <?= htmlspecialchars($params['post']->title) ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge badge-info"><?= $tag->name ?></span>
    <?php endforeach ?>
</div>
<small class="text-info">Publié le : <?= $params['post']->getCreatedAt() ?> par </small><b><?= $params['post']->getAuthor()->username ?></b>
<p><?= nl2br(htmlspecialchars($params['post']->content)) ?></p>
<a href="<?= REPERT ?>/posts" class="btn btn-secondary">Retouner en arrière</a>