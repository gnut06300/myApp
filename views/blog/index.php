<?php $titlePage='Mes Articles' ?>
<h1>Les derniers articles</h1>
<?php foreach ($params['posts'] as $post): ?>
    <?php // var_dump($post) ; ?>
    <div class="card mb-3">
        <div class="card-body">
        <h2><?= $post->title ?></h2>
        <small class="badge-info">Publié le : <?= $post->getCreatedAt() ?></small>
        <p><?= $post->getExcerpt() ?></p>
        <?= $post->getButton() ?>
        </div>
    </div>
<?php endforeach ?>