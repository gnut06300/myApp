<?php $titlePage = 'Post : ' . $params['post']->id ?>
<?php // var_dump($params['post']) 
?>
<h1>Post n° <?= $params['post']->id ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge badge-info"><?= $tag->name ?></span>
    <?php endforeach ?>
</div>
<p><?= $params['post']->content ?></p>
<a href="<?= REPERT ?>/posts" class="btn btn-secondary">Retouner en arrière</a>