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
            <h1><?= $artiste['prenom'] . ' ' . $artiste['nom']  ?></h1>
            <h2><?= $oeuvre['nom'] ?></h2>
            <p><?= $oeuvre['description'] ?></p>
        </article>
    </article>

    <article class="parcourDAchat">
        <div class="blocHaut">
            <h2>Créez votre photographies d'art sur mesure</h2>
            <div class="catAchat">
                <div class="format">
                    <div class="logo-format" id="bg-format"><span id="sF">1</span></div>
                    <p>Format</p>
                </div>
                <div class="finition">
                    <div class="logo-finition" id="bg-finition"><span id="sFi">2</span></div>
                    <p>Finition</p>
                </div>
                <div class="cadre">
                    <div class="logo-cadre" id="bg-cadre"><span id="sC">3</span></div>
                    <p>cadre</p>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            <div class="globalOption">

                <div class="containerOption">

                    <div class="blocOption" id="slide">
                        <div class="blocFormat" id="format">
                            <?php foreach ($formats as $key => $format) { ?>
                                <div class="formatGrand option" id="<?= $format["nom"] ?>">
                                    <div class="image">
                                        <figure class="image-option">
                                            <img src="./assets/img/format/<?= $format['image'] ?>" alt="<?= $format["nom"] ?>">
                                        </figure>
                                    </div>
                                    <div class="descriptionFormat">
                                        <p><span class="format"><b><?= mb_strtoupper($format['nom']) ?></b></span> - <?= $format['dimension'] ?> à partir de
                                            <span class="prix" id="p-<?= $format["nom"] ?>" data-prix="<?= $prix * $augmentationFormat[$key] ?>"><?= ($prix * $augmentationFormat[$key]) ?>€</span>
                                        </p>
                                        <p><?= $format['description'] ?></p>
                                    </div>
                                    <div class="checkOrNot" id="check">
                                        <figure>
                                            <img id="img-<?= $format["nom"] ?>" src="./assets/img/article/check.png" alt="check">
                                        </figure>
                                    </div>
                                    <input type="radio" name="format" id="input-<?= $format["nom"] ?>" value="<?= $format["nom"] ?>">
                                </div>
                            <?php } ?>
                        </div>

                        <div class="blocFintion" id="finition">
                            <?php foreach ($finitions as $finition) { ?>
                                <div class="formatGrand option" id="<?= email_space($finition['nom']) ?>">
                                    <div class="image">
                                        <figure class="image-option">
                                            <img src="./assets/img/finition/<?= $finition['image'] ?>" alt="<?= $finition['nom'] ?>">
                                        </figure>
                                    </div>
                                    <div class="descriptionFormat">
                                        <p><span class="format"><b><?= mb_strtoupper($finition['nom']) ?></b></span> - à partir de
                                            <span id="p-<?= email_space($finition['nom']) ?>"></span>
                                        </p>
                                        <p><?= $finition['description'] ?></p>
                                    </div>
                                    <div class="checkOrNot" id="check">
                                        <figure>
                                            <img id="img-<?= email_space($finition['nom']) ?>" src="./assets/img/article/check.png" alt="check">
                                        </figure>
                                    </div>
                                    <input type="radio" id="input-<?= email_space($finition['nom']) ?>" name="finition" value="<?= $finition['nom'] ?>">
                                </div>
                            <?php } ?>
                        </div>


                        <div class="blocCadre" id="cadre">
                            <?php foreach ($cadres as $cadre) { ?>
                                <div class="formatGrand option" id="<?= email_space($cadre['nom']) ?>">
                                    <div class="image">
                                        <figure class="image-option">
                                            <img src="./assets/img/cadre/<?= $cadre['image'] ?>" alt="grand format">
                                        </figure>
                                    </div>
                                    <div class="descriptionFormat">
                                        <p><span class="format"><b><?= mb_strtoupper($cadre['nom']) ?></b></span> - au prix de
                                            <span id="p-<?= email_space($cadre['nom']) ?>"></span>
                                        </p>
                                        <p><?= $cadre['description'] ?></p>
                                    </div>
                                    <div class="checkOrNot" id="check">
                                        <figure>
                                            <img id="img-<?= email_space($cadre['nom']) ?>" src="./assets/img/article/check.png" alt="check">
                                        </figure>
                                    </div>
                                    <input type="radio" id="input-<?= email_space($cadre['nom']) ?>" name="cadre" value="<?= $cadre['nom'] ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- ajouter un bouton pour envoyer le formulaire -->
                </div>
                <button class="sendButton " id="addProduct">Commander</button>
                <div class="buttonSelect">
                    <button type="button" class="btn" id="previous" disabled>Précédent</button>
                    <button type="button" class="btn" id="next">Suivant</button>
                </div>
            </div>
        </form>
        <div class="price-container">
            <b>total <span id="price">0.00€</span> </b>
        </div>

    </article>
</section>
<script src="./assets/js/article.js"></script>

<?php

require './partials/footer.php';

?>