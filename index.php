<?php

$stylesheet = "assets/css/index.css";
require './partials/navbar.php';

$oeuvres = $db->query('SELECT * FROM oeuvre ORDER BY RAND() LIMIT 6')->fetchAll();
?>

<header class="carousel">
    <figure class="slides">
        <img src="./assets/img/index/montain.jpg" alt="Paysage" class="slide">
        <img src="./assets/img/index/moon.jpg" alt="rock" class="slide">
        <img src="./assets/img/index/ny.jpg" alt="Futuriste" class="slide">
        <img src="./assets/img/index/vieuxpc.jpeg" alt="arcade" class="slide">
    </figure>
    <div class="controls">
        <div class="control prev-slide">&#9668;</div>
        <div class="control next-slide">&#9658;</div>
    </div>
    <div class="link_news">
        <a href="./article.php">
            <h1>Nouvelle oeuvres</h1>
            <span>Les collections légendaires</span>
            <p>Explorer la nouvelle collection</p>
        </a>
    </div>
</header>

<section class="picture">
    <div class="title">
        <h2>Photographie d'art</h2>
        <p>Oeuvres en édition limitées et numérotée avec certificat d'authenticité</p>
    </div>
    <div class="container-img">

        <?php foreach ($oeuvres as $oeuvre) {
            $query = $db->prepare('SELECT * FROM user WHERE id = :id');
            $query->bindValue(":id", $oeuvre["user_id"]);
            $query->execute();
            $user = $query->fetch();

            $nom = accents($user['prenom'], $user['nom']); ?>
            

                <article>
                    <a href="./article.php">
                        <div class="cardArtiste">
                            <figure>
                                <img src="./assets/img/artiste/<?= $nom . "/" . $oeuvre["image"] ?>" alt="<?= $oeuvre["nom"] ?>">
                                <figcaption>
                                    <div>
                                        <p class="titre"><?= $user['prenom'] . " " . $user['nom']; ?></p>
                                        <p><?= reduction($oeuvre['nom'], 23) ?></p>
                                    </div>
                                    <div class="price">
                                        <p>A partir de</p>
                                        <p><?= $oeuvre['prix'] ?>€</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </a>
                </article>

            
        <?php } ?>
    </div>
    <a href="" class="bottom-s-img">Explorer la collection</a>
</section>

<section class="quatro">
    <article class="voyage" style="background-image: url(./assets/img/index/manhattan-lights.jpg);">
        <div>
            <a href="./article.php">
                <h3>Voyage</h3>
                <span>Vivez vos rêves</span>
                <br>
                Parcourir la collection
            </a>
        </div>
    </article>
    <article class="black-and-white" style="background-image: url(./assets/img/index/hagenmuller-cordee-sur-les-aretes-de-rochefort-ii.jpg);">
        <div>
            <a href="./article.php">
                <h3>Noir & blanc</h3>
                <span>oeuvres intemporelles</span>
                <br>
                Découvrir la collection
            </a>
        </div>
    </article>
    <article class="artiste" style="background-image: url(./assets/img/index/hotel-seventies-japan.jpg);">
        <div>
            <a href="./article.php">
                <h3>Aurélien Vilette </h3>
                <span>Edifices oubliés</span>
                <br>
                Découvrir l'artiste
            </a>
        </div>
    </article>
    <article class="last-exe" style="background-image: url(./assets/img/index/tokyo-vi.jpg);">
        <a href="./article.php">
            <div>
                <h3>Derniers exemplaires </h3>
                <span>passer pas à coté de votre oeuvre</span>
                <br>Découvrir les oeuvres
            </div>
        </a>
    </article>
</section>

<script src="./assets//js/carrousel.js"></script>

<?php

require './partials/footer.php';

?>