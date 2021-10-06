<?php $titlePage = 'Formulaire d\'inscription' ?>

<?php if (isset($_SESSION['errors'])): ?>

    <?php foreach ($_SESSION['errors'] as $errorsArray) : ?>
        <?php foreach($errorsArray as $errors): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
    <?php endforeach ?>

<?php endif ?>
<?php session_destroy() ?>
<h1>Formulaire d'inscription</h1>

<form action="/registration" method="post">
    <div class="form-group">
        <label for="username">Nom d'utlisateur</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm">
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>