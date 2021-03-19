<?php 

require __DIR__.'/../config/database.php';

$cadres = [
    ["Sans encadrement", "Tirage contrecollé sur support aluminium", "sansEncad.jpeg"],
    ["Encadrement noir satin", "Caisse américaine noir satinée assemblèe à la main, apportant un effet de la luminosité et de profondeur", "encadNoirSatin.jpeg"],
    ["Encadrement blanc satin", "Caisse américaine blanche satinée assemblèe à la main, apportant un effet de la luminosité et de profondeur", "encaBlancSatin.jpeg" ],
    ["Encadrement noyer", "Caisse américaine en noyer massif assemblèe à la main, apportant un effet de la luminosité et de profondeur", "encaNoyer.jpeg"],
    ["Encadrement chêne", "Caisse américaine en chêne massif assemblèe à la main, apportant un effet de la luminosité et de profondeur", "encaChene.jpeg"],
    ["Aluminum noir", "", "aluNoir.jpeg"],
    ["Bois blanc", "", "boisBlanc.jpeg"],
    ["Acajou mat", "", "acajouMat.jpeg"],
    ["Aluminium brossé", "", "aluBrosse.jpeg"]
];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE cadre');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($cadres as $cadre ) {
    $db->query("INSERT INTO cadre (nom, description, image) VALUES ('$cadre[0]', '$cadre[1]', '$cadre[2]' )");
}