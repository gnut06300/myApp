<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titlePage ?></title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'styles.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?= REPERT ?>/"><img class="logo_small" src="<?= SCRIPTS . 'pictures' . DIRECTORY_SEPARATOR . 'iwebprod_small.png' ?>" alt="Logo samll"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= REPERT ?>/"><i class="fas fa-home"></i> Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= REPERT ?>/posts"><i class="fas fa-blog"></i> Tous les articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= REPERT ?>/contact"><i class="fas fa-file-contract"></i> Contact</a>
                </li>
                <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === 1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/admin/posts"><i class="fas fa-user-lock"></i> Admin Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/admin/comments"><i class="fas fa-user-lock"></i> Admin Commentaires</a>
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
                        <a class="nav-link" href="<?= REPERT ?>/registration"><i class="fas fa-registered"></i> S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= REPERT ?>/login"><i class="fas fa-paperclip"></i> Se connecter</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <section class="container-fluid banner mb-0">
        <div class="banniere">
            <img class="ban" src="<?= SCRIPTS . 'pictures' . DIRECTORY_SEPARATOR . 'businessman-3213659_1920.jpg' ?>" alt="Photo du iwebproducteur">
        </div>
        <div class="inner-banner">
            <img class="logo" src="<?= SCRIPTS . 'pictures' . DIRECTORY_SEPARATOR . 'iwebprod_small.png' ?>" alt="Logo samll">
            <h2 class="titlePage"><?= $titlePage ?></h2>
        </div>
    </section>
    <div class="container">
        <?= $content ?>
    </div>
    <!-- Début google map-->
    <div class="container-fluid google-map mt-5">
        <div class="map-responsive">
            <iframe title="Mon adresse" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2884.614876559634!2d7.27411481536803!3d43.69776937911982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cddabcabba6025%3A0x89858ed04fc858d4!2s9%20Rue%20du%20Pont%20Vieux%2C%2006300%20Nice!5e0!3m2!1sfr!2sfr!4v1632526208658!5m2!1sfr!2sfr" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <!-- Fin google map -->
    <footer class="bg-light py-4 mt-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center"><a class="liens" href="https://www.linkedin.com/in/g%C3%A9rald-col-b4005418b/"  rel="noreferrer" target="_blank"><i class="fab fa-linkedin"> Linkedin</i></a></div>
                <div class="col-sm-6 text-center"><a class="liens" href="https://github.com/gnut06300"  rel="noreferrer" target="_blank"><i class="fab fa-github-square"> GitHub</i></a></div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-9 text-center">&copy; Copyright : <a href="https://iwebprod.fr">IWebProd.fr</a> - 2021</div>
                <div class="col-12 col-sm-3 text-center"><a href="<?= REPERT ?>/admin/posts">Administration</a></div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>