<?php
$stylesheet = './assets/css/adresses/adresses.css';
$title = 'Adresses';
require __DIR__ . '/partials/navbar.php';

global $db;

$query = $db->prepare('SELECT * FROM adresse INNER JOIN adresse_has_user ON adresse_has_user.adresse_id = adresse.id WHERE adresse_has_user.user_id = :id');
$query->bindValue(':id', $_SESSION['user']['id']);
$query->execute();
$adresses = $query->fetchAll();

?>


<div class="container-full">

    <?php require __DIR__ . '/partials/navadmin.php'; ?>

    <section>
        <div class="cotnainer-title">
            <h1>Adresses</h1>
        </div>

        <div class="separation"></div>

        <div class="list-adresses">
            <?php foreach ($adresses as $adresse) { ?>
                <div class="adresse">
                    <div class="rue_num">
                        <p><?= $adresse['numero'] ?></p>
                        <p><?= $adresse['rue'] ?></p>
                    </div>
                    <div class="ville_cp">
                        <p><?= $adresse['ville'] ?></p>
                        <p><?= $adresse['cp'] ?></p>
                        <p><?= $adresse['pays'] ?></p>
                    </div>
                    <?php if (!empty($adresse['supplement'])) { ?>
                        <div class="supp">
                            <p><?= $adresse['supplement'] ?></p>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="add-adresse">
            <a href="./add-adresse.php">Ajouter une adresse</a>
        </div>
    </section>

</div>

<?php require __DIR__ . '/partials/footer.php' ?>