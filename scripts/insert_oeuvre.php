<?php 

require __DIR__.'/../config/database.php';

$oeuvres = [
    ["VERTICALITE VOLUTE II POLOGNE", "Que dit un lieu abandonné d’une époque ? D’une civilisation ? D’un moment ? Autant de questions que l’on se pose en contemplant les photos d’Aurélien Villette. Le photographe a une passion pour l’architecture qui influence, dit-il, « l’ensemble de notre vie » et dont la variété est pour lui « chaque jour un émerveillement ». Quel que soit le pays concerné (dans cette série : Liban, Japon, Pologne ou France), c’est ce qu’il appelle « l’esprit des lieux », qu’il cherche à capter et à partager à travers ses photos.", 84, "verticaliteVoluteIIPologne.jpeg", 2, 3, 1],
    ["HOTEL SEVENTIES JAPAN", "Que dit un lieu abandonné d’une époque ? D’une civilisation ? D’un moment ? Autant de questions que l’on se pose en contemplant les photos d’Aurélien Villette. Le photographe a une passion pour l’architecture qui influence, dit-il, « l’ensemble de notre vie » et dont la variété est pour lui « chaque jour un émerveillement ». Quel que soit le pays concerné (dans cette série : Liban, Japon, Pologne ou France), c’est ce qu’il appelle « l’esprit des lieux », qu’il cherche à capter et à partager à travers ses photos.", 84, "hotelSeventiesJapan.jpeg", 2, 3, 1]

];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE oeuvre');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($cadres as $cadre ) {
    $db->query("INSERT INTO cadre (nom, description, prix, image, quantite, orientation_id, categorie_id, user_id) VALUES ('$cadre[0]', '$cadre[1]', '$cadre[2]' )");
}