<?php $titlePage = 'Formulaire de contact' ?>

<h1 class="text-center text-primary">Formulaire de contact</h1>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
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

        <?php endif ?>
        <?php $_SESSION['errors'] = [] ?>
        <?php if (isset($_GET['message']) && $_GET['message'] === 'envoye') : ?>
            <div class="alert alert-success">
                <li>Votre message a bien été envoyé</li>
            </div>
        <?php endif ?>
        <form action="<?= REPERT ?>/contact" method="post">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="firstname">Prénom</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="form-group col-sm-6">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="username">Nom d'utlisateur</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group col-sm-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="message">Votre message</label>
                <textarea class="form-control" id="message" rows="6" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer le formulaire</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>