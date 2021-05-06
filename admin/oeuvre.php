<?php
$stylesheet = './assets/css/oeuvre/oeuvre.css';
$title = 'Adresses';
require __DIR__ . '/partials/navbar.php';

$query = $db->prepare('SELECT * FROM oeuvre WHERE user_id = :id');
$query->bindValue(':id', $_SESSION['user']['id']);
$query->execute();
$oeuvres = $query->fetchAll();

?>


<div class="container-full">

    <?php require __DIR__ . '/partials/navadmin.php'; ?>

    <section>
        <div class="cotnainer-title">
            <h1>Oeuvre</h1>
        </div>

        <div class="separation"></div>

        <div class="container-img">

            <?php foreach ($oeuvres as $oeuvre) {
                $query = $db->prepare('SELECT * FROM user WHERE id = :id');
                $query->bindValue(":id", $oeuvre["user_id"]);
                $query->execute();
                $user = $query->fetch();

                $nom = accents($user['prenom'], $user['nom']); ?>

                <article>
                    <a href="../article.php?id=<?= $oeuvre['id']  ?>">
                        <div class="cardArtiste">
                            <figure>
                                <img src="../assets/img/artiste/<?= $user['id'] . "/" . $oeuvre["image"] ?>" alt="<?= $oeuvre["nom"] ?>">
                                <figcaption>
                                    <div>
                                        <p class="titre">Quantité : <?= $oeuvre['quantite']?></p>
                                        <p>Vendu : 0</p>
                                    </div>
                                    <div class="price">
                                        <p>Prix d'origine <?= $oeuvre['prix'] ?>€</p>
                                        <p><?= reduction($oeuvre['nom'], 23) ?></p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </a>
                </article>


            <?php } ?>
    </section>

</div>

<?php require __DIR__ . '/partials/footer.php' ?>