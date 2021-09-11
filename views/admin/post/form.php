<?php isset($params['post']) ? $titlePage = 'Formulaire de modification' : $titlePage = 'Création d\'un article'; ?>
<h1><?= $params['post']->title ?? 'Créer un nouvel article' ?></h1>

<form action="<?= isset($params['post']) ? REPERT . "/admin/posts/edit/{$params['post']->id}" : REPERT . "/admin/posts/create" ?>" method="post">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control"><?= $params['post']->content ?? '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="user_id">Example select</label>
        <select class="form-control" id="user_id" name="user_id">
            <?php foreach ($params['users'] as $user) : ?>
                <option value="<?= $user->id ?>" 
                <?php if (isset($params['post'])) {
                    echo ($user->id === $params['post']->user_id) ? 'selected' : '';
                }?>
                ><?= $user->username ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags de l'article</label>
        <select multiple class="form-control" id="tags" name="tags[]">

            <?php foreach ($params['tags'] as $tag) : ?>
                <option value="<?= $tag->id ?>"
                <?php if(isset($params['post'])) : ?> 
                <?php foreach ($params['post']->getTags() as $postTags) {
                    echo ($tag->id === $postTags->id) ? 'selected' : '';
                } 
                ?>
                <?php endif ?>
                ><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['post']) ? 'Enregister les modifications' : 'Enregistrer mon article' ?></button>
</form>