<?php $titlePage = 'Formulaire de modification d\'un commentaire' ?>
<h1>Modification du commentaire <?= $params['comment']->id ?> de <a href="<?= REPERT ?>/posts/<?= $params['comment']->post_id ?>">l'article <?= $params['comment']->post_id ?></a></h1>

<form action="<?= REPERT ?>/admin/comments/edit/<?= $params['comment']->id ?>" method="post">
    <div class="form-group">
        <label for="content">Contenu du commentaire</label>
        <textarea name="content" id="content" rows="8" class="form-control"><?= $params['comment']->content ?? '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="user_id">Auteur</label>
        <select class="form-control" id="user_id" name="user_id">
            <?php foreach ($params['users'] as $user) : ?>
                <option value="<?= $user->id ?>" 
                <?php if (isset($params['comment'])) {
                    echo ($user->id === $params['comment']->user_id) ? 'selected' : '';
                }?>
                ><?= $user->username ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enregister les modifications</button>
</form>