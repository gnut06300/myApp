<?php $titlePage='Post : ' . $params['post']->id ?>
<h1>Post n° <?= $params['post']->id ?></h1>
<p><?= $params['post']->content ?></p>
<a href="<?= REPERT ?>/posts" class="btn btn-secondary">Retouner en arrière</a>