<?php $titlePage = 'Formulaire de modification'; ?>
<h1>Modifier <?= $params['post']->title ?></h1>

<form action="<?= REPERT ?>/admin/posts/edit/<?=$params['post']->id ?>" method="post">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control"><?= $params['post']->content ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enregister les modifications</button>
</form>