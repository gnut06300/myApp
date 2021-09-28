<?php $titlePage = 'Mon Super Blog' ?>

<h1 class="text-primary my-4">Gérald COL votre iwebproducteur! <br>Bienvenue <?= $_SESSION['username'] ?? '' ?> sur mon blog !</h1>

<?php if (isset($_SESSION['username_created'])) : ?>
    <div class="alert alert-success">
        <li>Bienvenue <?= $_SESSION['username_created'] ?> un email de confiration vous a été envoyer vous devez cliquer sur le lien pour finaliser votre inscription</li>
    </div>
    <?php endif ?>
<h3>Etudes :</h3>
<p>J'ai intégré le 10 mai 2021 la formation de "Développeur d'application - PHP/Symfony" d'une duréee d'un an chez <a href="https://openclassrooms.com/fr/" target="_blank" title="Ouvre le site Openclassrooms">Openclassrooms</a>.</p>
<p><img class="me" src="<?= SCRIPTS . 'pictures' . DIRECTORY_SEPARATOR . 'MRO_5839.jpg' ?>" alt="Gérald COL">J'ai commencé ma formation au le 11 mai 2020 "Titre professionel développeur web et web mobile" au Greta Côte d'Azur, j'ai optenu mon titre professionel le 2 mars 2021</p>
<p>Après le succès au baccalauréat E (Mathématiques et Technique) en 1985 au <a href="http://www.lycee-lorgues.fr/index.php" target="_blank" title="Lycée technique Thomas Edison Lorgues ouverture dans une nouvelle fenêtre">lycée technique Thomas Edison Lorgues (83510)</a>, ayant la passion des mathématiques et désirant développer mon potentiel scientifique, j'ai été admis en classes préparatoires Math Sup. et Math Spé au <a href="https://lyc-roosevelt-reims.monbureaunumerique.fr/" target="_blank" title="Lycée Roosevelt à Reims ouverture dans une nouvelle fenêtre">Lycée Franklin Roosevelt</a> à Reims (51)</p>
<h3>Expérience :</h3>
<p>J'ai effectué en octobre, novembre 2019  un stage d'immersion pour préparer mon titre professionel de développeur Web et Web Mobile, pour Madame Brigitte Ricossé où j'ai développé le site <a href="http://brigitteceramiques.com/" title="Ouvre le site brigitteceramiques.com dans une nouvelle fenêtre" target="_blank">brigitteceramiques.com</a>, mis en place du serveur et la gestion des DNS.</p>
<p>Je suis co-fondateur en 2002 du premier P2P (<a href="https://www.journaldunet.fr/web-tech/dictionnaire-du-webmastering/1203399-p2p-peer-to-peer-definition-traduction-et-acteurs/" title="Ouvre la definition facile du P2P" target="_blank">Peer to Peer</a>) 100% francophone avec la création de son interface web (baka.be)</p>
<p>Je crée des sites web, notamment pour :
    <ul>
        <li>l'association Gisèle et Paul Tissier - la Villa Beau Site afin de promouvoir cette villa d'exception, classé Monument historique;</li>
        <li>en 2004 du site du sculpteur Stéphane Cipre <a href="http://www.cipre.fr/" title="Ouvre le site cipre.fr dans une nouvelle fenêtre" target="_blank">cipre.fr</a>.</li>
    </ul></p>
<p>Ma création durant ma formation au Greta : <a href="http://gnut.eu/greta/bibliov2/" title="Ouvre le site de la bibliothèque du Parc Impérial dans une nouvelle fenêtre" target="_blank">La Bibliothèque Du Parc Impérial</a>.</p>
<p>Mon dernier stage : <a href="https://escoffier.gnut.eu/" title="Ouvre le site du lycée professionel Auguste Escoffier dans une nouvelle fenêtre" target="_blank">Le lycée professionel Auguste Escoffier</a>.</p>
</article>
<p class="text-center"><a href="<?= SCRIPTS . 'documents' . DIRECTORY_SEPARATOR . 'cv_2021.pdf' ?>" download="cv_de_Mr_Gerald_Col.pdf" title="Télécharger mon CV" target="_blank"><button class="btn btn-primary">Mon CV</button></a></p>
<div class="row">
    <div class="col-sm-6 col-md-4 my-4">
        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/607803175?loop=1&autopause=0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
    </div>
    <div class="col-sm-6 col-md-4 my-4">
        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/607803591?loop=1&autopause=0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
    </div>
    <div class="col-sm-6 col-md-4 my-4">
        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/607803868?loop=1&autopause=0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
    </div>
</div>
<h3>Hobbies :</h3>
<p>Depuis plusieurs années je suis passioné par :
<ul>
    <li>La Blockchain, </li>
    <li>La Domotique, </li>
    <li>La Réalité Virtuelle.</li>
</ul>
<p>En effet j'ai commencé en 2002 en co-fondant le premier P2P 100% francophone et obligé d'arrêter pour des raisons de réglementation française. En début 2017 j'ai découvert la blockchain qui s'appuie sur la technologie P2P. J'ai alors créé deux rigs et un masternodes.</p>