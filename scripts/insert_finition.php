<?php 

require __DIR__.'/../config/database.php';

$finitions = [
    ['Support aluminium', 'Tirage contrecollé sur aluminium', 'aluminium'],
    ['Support aluminium avec verre acrylique', 'Tirage contrecollé sur support aluminium avec finition protectrice en verre acrylique accentuant les contrastes et les couleurs', 'acrylique'],
    ['Tirage sur papier photo', 'tirage sur papier photo expèdié roulé, à accrcoher ou à encadrer', 'papier'],
    ['Blackout', 'Passe-partout noir avec liseret blanc', 'blackout'],
    ['Artshot', 'Passe-partout blanc', 'artshot'],
];

global $db;
$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE finition');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($finitions as $finition) {
    $db->query("INSERT INTO finition (nom, description, image) VALUES ('$finition[0]', '$finition[1]', '$finition[2]')");
}


