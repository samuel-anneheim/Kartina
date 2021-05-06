<?php
//Inclure le titre sur les pages
session_start();
require __DIR__ . '/../../config/database.php';
require __DIR__ . '/../../config/configTitre.php';
require __DIR__ . '/../../config/fonction.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    //Ajout du css de la page 
    if (isset($stylesheet)) { ?>
        <link rel="stylesheet" href="<?= $stylesheet ?>">
    <?php } ?>
    <link rel="stylesheet" href="./assets/css/footer/footer.css">
    <link rel="stylesheet" href="./assets/css/nav/styleNavBar.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <title><?php echo "kartina ";
            if (isset($title)) {
                echo "| " . $title;
            } ?></title>
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav-fullscreen">
                <div class="container-top">
                    <div class="title-site">
                        <a href="../index.php" class="title">Kartina</a>
                        <p>Photographie d'art en édition limitée</p>
                    </div>
                    <div class="container-recherche">
                        <input type="text" placeholder="Recherche">
                    </div>
                    <div class="navigation">
                        <ul>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <li class="hover-white"><a href="./dashboard.php"><?= $_SESSION['user']['prenom']; ?></a></li>
                                <li class="hover-white"><a href="../deconnexion.php">Deconnexion</a></li>
                            <?php } else { ?>
                                <li class="hover-white"><a href="../connexion.php">Connexion</a></li>
                            <?php } ?>
                            <li class="hover-white"><a href="../help.php">Nous contacter</a></li>
                            <li class="hover-white"><a href="">Panier</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container-bottom">
                    <ul>
                    <li class="hover"><a href="../photographie.php" class="white">Photographies</a></li>
                        <li class="hover"><a href="../new-picture.php" class="white">Nouveautés</a></li>
                        <li class="hover"><a href="../artistes.php" class="white">Artistes</a></li>
                        <li class="hover"><a href="../dernier-exem.php" class="white">Derniers exemplaires</a></li>
                    </ul>
                </div>
            </div>

            <div class="nav-responsive">
                <div class="title-site">
                    <a href="../index.php" class="title">Kartina</a>
                    <p>Photographie d'art en édition limitée</p>
                    <input type="text" placeholder="Recherche">
                </div>
                <div id="btn">
                    <div id='top'></div>
                    <div id='middle'></div>
                    <div id='bottom'></div>
                </div>
                <div id="box">.
                    <div id="items">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="item"><a href="./dashboard.php"><?= $_SESSION['user']['prenom']; ?></a></div>
                            <div class="item"><a href="../deconnexion.php">Deconnexion</a></div>
                        <?php } else { ?>
                            <div class="item"><a href="../connexion.php">Connexion</a></div>
                        <?php } ?>
                        <div class="item"><a href="">Panier</a></div>
                        <div class="item"><a href="../photographie.php">Photographies</a></div>
                        <div class="item"><a href="../new-picture.php">Nouveautés</a></div>
                        <div class="item"><a href="../artistes.php">Artistes</a></div>
                        <div class="item"><a href="../dernier-exem.php">Derniers exemplaires</a></div>
                    </div>
                </div>
            </div>
        </nav>
        <?php

        if (!isset($_SESSION['user'])) {
            require '403.php';
        }
        ?>