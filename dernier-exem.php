<?php

$title = "derniers exemplaires";
$stylesheet = "assets/css/index.css";
require './partials/navbar.php';

$oeuvres = $db->query('SELECT * FROM oeuvre ORDER BY quantite')->fetchAll();
?>
<section class="picture">
    <div class="title">
        <h2>Derniers exemplaires</h2>
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
                    <a href="./article.php?id=<?= $oeuvre['id']  ?>">
                        <div class="cardArtiste">
                            <figure>
                                <img src="./assets/img/artiste/<?= $user['id'] . "/" . $oeuvre["image"] ?>" alt="<?= $oeuvre["nom"] ?>">
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
</section>

<?php

require './partials/footer.php';

?>