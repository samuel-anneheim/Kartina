<?php 

require __DIR__.'/../config/database.php';

$users = [
    ["aurelien.vilette@gmail.com", "M.", "Vilette", "Aurélien", "aurelienVilette", "06.01.02.03.04" , true, "Né en 1982 au Chesnay près de Paris, c’est à la suite d’un changement radical de mode de vie qu’Aurélien Villette se recentre sur sa passion des voyages et découvre la photographie en 2008. Depuis, il a foulé plus d'une trentaine de pays à la rencontre de sociétés et d'histoires qui ont façonné sa propre vision du monde. Au-delà d'un simple souci documentaire et de pérennisation, il s'intéresse à la description et à l'esthétisation de lieux en déshérence. Les jeux de lumières, les matières vieillissantes, les perspectives et structures architecturales sont mis en évidence et magnifiés. Le silence, omniprésent, paraît correspondre à un temps qui se serait tu et fait émaner de ces photographies une atmosphère énigmatique, questionnant le spectateur sur la vie passée des lieux. Après avoir obtenu les Félicitations du Jury lors du concours SFR Jeunes Talents en 2012 avec sa série « Structures et Déstructures », il devient photographe professionnel et construit ses projets autour de ce qu'il appelle « l’esprit des lieux ».", null, "https://www.instagram.com/aurelienvillette/?hl=fr", null, null],
];


foreach ($oeuvre as $oeuvre) {
    $query= $db->prepare("INSERT INTO categorie (nom, description) VALUES (:nom, :categorie)");
    $query->bindvalue(":nom", $categorie[0] );
    $query->bindvalue(":categorie", $categorie[1]);
    $query->execute();
}

foreach ($cadres as $cadre ) {
    $db->query("INSERT INTO cadre (email, civilite, nom, :prenom, pwd, telephone, isArtiste, presentation, facebook, instagram, pinterest, twitter)
                VALUES (:email, :civilite, :nom, :prenom, :pwd, :telephone, :isArtiste, :presentation, :facebook, :instagram, :pinterest, :twitter)");
}
?>