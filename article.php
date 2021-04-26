<?php

$stylesheet = './assets/css/article/article.css';
$title = 'Article';
require __DIR__ . './partials/navbar.php';

$id = $_GET['id'] ?? 0;



global $db;

$query = $db->prepare('SELECT * FROM oeuvre where id = :id');
$query->bindValue(':id', $id);
$query->execute();
$oeuvre = $query->fetch();


$query = $db->prepare('SELECT * FROM user WHERE id = :id');
$query->bindValue(':id', $oeuvre['user_id']);
$query->execute();
$artiste = $query->fetch();


$formats = $db->query('SELECT * FROM format')->fetchAll();
$finitions = $db->query('SELECT * FROM finition')->fetchAll();
$cadres = $db->query('SELECT * FROM cadre')->fetchAll();

$augmentationFormat = [1, 2, 4, 10];
$prix = 84;

$format = $_POST['format'] ?? '';
$finition = $_POST['finition'] ?? '';
$cadre = $_POST['cadre'] ?? '';

$errors = [];

if (!empty($_POST)) {
    if ($format === '') {
        $errors['format'] = "Vous n'avez pas séléctionné de format";
    }

    if ($finition === "") {
        $errors['finition'] = "Vous n'avez pas séléctionné de finition";
    }

    if ($cadre === "") {
        $errors['cadre'] = "Vous n'avez pas séléctionné de cadre";
    }
}


var_dump($_POST);
var_dump($errors);

$name = accents($artiste['prenom'], $artiste['nom']);
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./assets/css/article.css">
<title>Article</title>
</head>

<body>
    <div class="container">
        <section class="presentationArticle">
            <article class="presentationImage">
                <figure class="grandeImage">
                    <img src="./assets/img/artiste/<?= $name ?>/<?= $oeuvre['image'] ?>" alt="" id="imagePrincipal">
                </figure>
                <div class="selection-image">

                    <figure class="listeImage">
                        <img src="./assets/img/artiste/<?= $name ?>/<?= $oeuvre['image'] ?>" alt="" id="second1">
                        <img src="./assets/img/article/icon-deco.png" alt="" id="second2">
                    </figure>

                    <figure class="aggrandirImage">
                        <img src="./assets/img/article/expand.png" alt="">
                        <figcaption>
                            <p>Plein écran</p>
                        </figcaption>
                    </figure>
                </div>
                <article class="descArticle">
                    <h1><?= $artiste['prenom'].' '.$artiste['nom']  ?></h1>
                    <h2><?= $oeuvre['nom'] ?></h2>
                    <p><?= $oeuvre['description']?></p>
                </article>
            </article>

            <article class="parcourDAchat">
                <div class="blocHaut">
                    <h2>Créez votre photographies d'art sur mesure</h2>
                    <div class="catAchat">
                        <div class="format">
                            <div class="logo-format"><span>1</span></div>
                            <p>Format</p>
                        </div>
                        <div class="finition">
                            <div class="logo-finition"><span>2</span></div>
                            <p>Finition</p>
                        </div>
                        <div class="cadre">
                            <div class="logo-cadre"><span>3</span></div>
                            <p>cadre</p>
                        </div>
                    </div>
                </div>

                <form action="" method="POST">
                    <div class="containerOption">

                        <div class="blocOption" id="slide">
                            <div class="blocFormat" id="format">
                                <?php foreach ($formats as $key => $format) { ?>
                                    <div class="formatGrand option" id="<?= $format["nom"] ?>">
                                        <div class="image">
                                            <figure class="image-option">
                                                <img src="./assets/img/format/<?= $format['image'] ?>" alt="grand format">
                                            </figure>
                                        </div>
                                        <div class="descriptionFormat">
                                            <p><span class="format"> <?= mb_strtoupper($format['nom']) ?></span> - <?= $format['dimension'] ?> à partir de
                                                <span class="prix"><?= ($prix * $augmentationFormat[$key]) ?>€</span>
                                            </p>
                                            <p><?= $format['description'] ?></p>
                                        </div>
                                        <div class="checkOrNot" id="check">
                                            <figure>
                                                <img src="./assets/img/article/check.png" alt="check">
                                            </figure>
                                        </div>
                                        <input type="radio" name="format" id="format-<?= $format["nom"] ?>" value="<?= $format["nom"] ?>" data-prix="<?= $prix * $augmentationFormat[$key] ?>">
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="blocFintion" id="finition">
                                <?php foreach ($finitions as $finition) { ?>
                                    <div class="formatGrand option" id="v-<?= email_space($finition['nom']) ?>">
                                        <div class="image">
                                            <figure class="image-option">
                                                <img src="./assets/img/finition/<?= $finition['image'] ?>" alt="grand format">
                                            </figure>
                                        </div>
                                        <div class="descriptionFormat">
                                            <p><span class="format"> <?= mb_strtoupper($finition['nom']) ?></span> - à partir de 
                                                <span id="<?= email_space($finition['nom']) ?>"></span></p> 
                                            <p><?= $finition['description'] ?></p>
                                        </div>
                                        <div class="checkOrNot" id="check">
                                            <figure>
                                                <img src="./assets/img/article/check.png" alt="check">
                                            </figure>
                                        </div>
                                        <input type="radio" name="finition" value="<?= $finition['nom'] ?>">
                                    </div>
                                <?php } ?>
                            </div>


                            <div class="blocCadre" id="cadre">
                                <?php foreach ($cadres as $cadre) { ?>
                                    <div class="formatGrand option">
                                        <div class="image">
                                            <figure class="image-option">
                                                <img src="./assets/img/cadre/<?= $cadre['image'] ?>" alt="grand format">
                                            </figure>
                                        </div>
                                        <div class="descriptionFormat">
                                            <p><span class="format"> <?= mb_strtoupper($cadre['nom']) ?></span></p>
                                            <p><?= $cadre['description'] ?></p>
                                        </div>
                                        <div class="checkOrNot" id="check">
                                            <figure>
                                                <img src="./assets/img/article/check.png" alt="check">
                                            </figure>
                                        </div>
                                        <input type="radio" name="cadre" value="<?= $cadre['nom'] ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- ajouter un bouton pour envoyer le formulaire -->
                    </div>
                    <button id="addProduct">send</button>
                </form>
                <div class="buttonSelect">
                    <button class="btn" id="previous" disabled>Précédent</button>
                    <button class="btn" id="next">Suivant</button>
                </div>

            </article>
        </section>
    </div>
    <script>
        // let prix = <?= $prix ?>;
        // console.log(prix);
    </script>
    <script src="./assets/js/article.js"></script>
</body>

</html>