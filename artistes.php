<?php

$stylesheet = "./assets/css/artiste/artistes.css";
$title = "Artistes";
require __DIR__ . './partials/navbar.php';

global $db;

$artistes = $db->query('SELECT * FROM user ')->fetchAll();

?>

<h1 class="titleArtiste">Nos artistes</h1>
<section class="listeArtiste">
    <?php foreach ($artistes as $artiste) { 
        $query = $db->prepare('SELECT * FROM oeuvre WHERE user_id = :id ORDER BY RAND() LIMIT 1 ');
        $query->bindValue(":id", $artiste["id"]);
        $query->execute();
        $oeuvre= $query->fetch();

        $nom = accents($artiste['prenom'], $artiste['nom']);
        
        if ($artiste["isArtiste"]){ ?>
        <article>
            <div class="cardArtiste">
                <figure>
                    <img src="./assets/img/artiste/<?= $nom."/".$oeuvre['image']; ?>" alt="">
                </figure>
                <figcaption>
                    <h3><?= $artiste['prenom']." ".$artiste['nom'] ?></h3>
                </figcaption>
            </div>
        </article>
        <?php }} ?>
</section>

<?php 
require __DIR__ . './partials/footer.php';
?>