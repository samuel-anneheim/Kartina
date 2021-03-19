<?php 

require __DIR__.'/../config/database.php';

$formats = [
    ["Grand", "60 * 75 cm", "Photographie montée sur aluminium", "grand.jpeg"],
    ["Géant", "100 * 125 cm", "Photographie montée sur aluminium", "geant.jpeg"], 
    ["Collector", "120 * 150 cm", "Photographie montée sur aluminium", "collector.jpeg"],
    ["Classique", "24 * 30 cm", "Tirage encadré", "classique.jpeg"],
];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE format');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($formats as $format) {
    $db->query("INSERT INTO format (nom, dimension, description, image) VALUES ('$format[0]', '$format[1]', '$format[2]', '$format[3]')");
}