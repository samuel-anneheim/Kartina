<?php 

require __DIR__.'/../config/database.php';

$categories = [
    ["Mode","Célébrités, femme ou encore légendes de la mode, découvrez dès maintenant toutes les photographies de notre sélection Mode."],
    ["Nature", "Lion, éléphant ou encore flore, découvrez dès maintenant toutes les photographies de notre sélection Nature."],
    ["Urban", "Hong Kong, New-York ou encore Paris, découvrez dès maintenant toutes les photographies de notre sélection Urban."],
    ["Voyage", "L' Asie, l' Europe ou encore l' Amérique Latine, découvrez dès maintenant toutes les photographies de notre sélection Voyage."],
    ["Rêve et création", "Abstrait, surréaliste ou encore vintage, découvrez dès maintenant toutes les photographies de notre sélection Rêve et Création."],
    ["Sport et technique", "Avion, voile ou encore voiture, découvrez dès maintenant toutes les photographies de notre sélection Sport et Technique."],
    ["Célébrité et histoires", "Célébrités, histoire & tradition ou encore musique, découvrez dès maintenant toutes les photographies de notre sélection Célébrités et Histoire."],
    ["Paysage", "Désert, forêt ou encore mer, découvrez dès maintenant toutes les photographies de notre sélection Paysage."],
    ["Noir & blanc", "L'alliage du noir et du blanc a son état pur, découvrez dès maintenant toutes les photographies de notre sélection noir et blanc."],
    ["Vintage", "Flash back de notre passé, découvrez dès maintenant toutes les photographies de notre sélection vintage."]
];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE categorie');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($categories as $categorie) {
    $query= $db->prepare("INSERT INTO categorie (nom, description) VALUES (:nom, :categorie)");
    $query->bindvalue(":nom", $categorie[0] );
    $query->bindvalue(":categorie", $categorie[1]);
    $query->execute();
}