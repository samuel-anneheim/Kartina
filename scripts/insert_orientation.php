<?php 

require __DIR__.'/../config/database.php';

$orientations = ["Portrait", "Paysage", "Carré", "Panoramique"];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE orientation');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($orientations as $orientation) {
    $db->query("INSERT INTO orientation (nom) VALUES ('$orientation')");
}