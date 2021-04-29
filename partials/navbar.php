<?php
//Inclure le titre sur les pages
require __DIR__.'/../config/database.php';
require __DIR__.'/../config/configTitre.php';
require __DIR__.'/../config/fonction.php';

global $db;
$orientations = $db->query('SELECT * FROM orientation')->fetchAll();

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
    <title><?php echo "kartina "; if (isset($title)) {echo "| ".$title; }?></title>
</head>

<body>

    <div class="container">

        <nav>

            <div class="partOne">

                <div class="en_tete">
                    <a href="./index.php" id="index">Kartina</a>
                    <p>Photographie d'art en édition limitée</p>
                </div>


                <div class="search">
                    <input type="search" id="site-search" name="search" aria-label="Recherche" src="_" placeholder="Recherche sur kartina">


                </div>

                <div class="cap">
                    <div class="account">
                        <a href="./account.php">Compte</a>
                    </div>

                    <div class="help">
                        <a href="./helpS.php"> Nous contacter</a>
                    </div>

                    <div class="panier">
                        <a href="">Panier</a>
                    </div>

                    <div class="select_country">
                        <label for="country"></label>
                        <select name="select_country" id="country">
                            <option value="français">FR</option>
                            <option value="anglais">UK</option>
                            <option value="espagnol">ES</option>
                        </select>
                    </div>

                </div>


                <div class="partTwo">
                    <ul>
                        <li><a href="" id="picture">Photographies</a></li>
                        <li><a href="" id="quatro">Nouveautés</a></li>
                        <li><a href="./artistes.php" id="quatro">Artistes</a></li>
                        <li><a href="" id="quatro">Derniers exemplaires</a></li>
                    </ul>

                </div>

        </nav>