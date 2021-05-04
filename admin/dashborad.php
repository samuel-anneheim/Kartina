<?php
$stylesheet = './assets/css/dashboard/dashboard.css';
require __DIR__ . '/partials/navbar.php'; ?>


<div class="container-full">

    <?php require __DIR__ . '/partials/navadmin.php'; ?>

    <section>

        <div class="container-title">
            <h1>Mon compte | <?= $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom'] ?></h1>
            <span>(<a href="../deconnexion.php">Déconnexion</a>)</span>
        </div>

        <div class="separation"></div>

        <div class="container-element">
            <div class="title-element">
                <img src="./assets/img/dashboard/user.png" alt="">
                <h2><a href="">Données</a></h2>
            </div>
            <p>Afficher ou mettre à jour vos infomations personnelles</p>
        </div>

        <div class="container-element">
            <div class="title-element">
                <img src="./assets/img/dashboard/order.png" alt="">
                <h2><a href="">Commandes</a></h2>
            </div>
            <p>Vérifier le statut de vos commandes ou voir les commandes passées</p>
        </div>
        <div class="container-element">
            <div class="title-element">
                <img src="./assets/img/dashboard/position.png" alt="">
                <h2><a href="">Adresse</a></h2>
            </div>
            <p>Gérez vos adresses de livraison et de facturation</p>
        </div>
    </section>

</div>

<?php require __DIR__ . '/partials/footer.php' ?>