<?php

    $id = $_GET['id'] ?? 0;

    $stylesheet = "./assets/css/pageArtiste/pageArtiste.css";
    $title = "Aurelien vilette";
    require __DIR__.'./partials/navbar.php';

    global $db;
    $query = $db->prepare('SELECT * FROM oeuvre WHERE user_id = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    $oeuvres = $query->fetchAll();

    $query = $db->prepare('SELECT * FROM user WHERE id = :id');
    $query->bindValue(':id', $id);
    $query->execute();
    $artiste = $query->fetch();


    $name = accents($artiste['prenom'], $artiste['nom'])


?>

        <header>
            <div class="nom-artiste">
                <h1><?= $artiste["prenom"]." ".$artiste["nom"] ?></h1>
                <span>France</span>
            </div>
            <div class="presentation-artiste">
                <p><?= $artiste["presentation"] ?></p>
            </div>
        </header>
        <div class="container-logo">
            <figure>

            <?php if(!is_null($artiste["twitter"])){ ?>
                <a href="<?= $artiste["twitter"] ?>"><img src="./assets/img/reseauxSociaux/twitter.png" alt="logo-twitter"></a>
            <?php } ?>

            <?php if(!is_null($artiste["facebook"])){ ?>
                <a href="<?= $artiste["facebook"] ?>"><img src="./assets/img/reseauxSociaux/facebook.png" alt="logo-facebook"></a>
            <?php } ?>

            <?php if(!is_null($artiste["instagram"])){ ?>
                <a href="<?= $artiste["instagram"] ?>"><img src="./assets/img/reseauxSociaux/instagram.png" alt="logo-instagram"></a>
            <?php } ?>

            <?php if(!is_null($artiste["pinterest"])){ ?>
                <a href="<?= $artiste["pinterest"] ?>"><img src="./assets/img/reseauxSociaux/pinterest.png" alt="logo-pinterest"></a>
            <?php } ?>

            </figure>
        </div>
        <section>
        <?php foreach ($oeuvres as $oeuvre) { ?>
            
        
            <article>
                <a href="./article.php?=<?= $oeuvre["id"] ?>">
                    <figure>
                        <img src="./assets/img/artiste/<?= $name."/".$oeuvre["image"] ?>" alt="verticalite-volute-ii-pologne">
                        <figcaption>
                            <span class="titre-oeuvre"><?= $oeuvre["nom"] ?></span>
                            <p>à partir de <span class="prix"><?= $oeuvre["prix"] ?>€</span></p>
                        </figcaption>
                    </figure>
                </a>
            </article>
        <?php } ?>
           
        </section>

<?php 

require __DIR__.'./partials/footer.php'

?>