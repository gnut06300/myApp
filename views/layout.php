<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titlePage ?></title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= REPERT ?>/">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= REPERT ?>/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= REPERT ?>/posts">Tous les articles</a>
                </li>
                <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/admin/posts">Admin Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/admin/comments">Admin Commentaires</a>
                    </li>
                <?php endif ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['auth']) || isset($_SESSION['username'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/logout">Se déconnecter</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/registration">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/login">Se connecter</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
    <footer class="bg-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-9 text-center">&copy; Copyright : <a href="https://gnut.eu" target="_blank">Gnut.eu</a> - 2021</div>
                <div class="col-12 col-sm-3 text-center"><a href="<?= REPERT ?>/admin/posts">Administration</a></div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>