<?php 

require __DIR__.'/../config/database.php';

$oeuvres = [
    /**
     * Aurelien Vilette
     */
    ["VERTICALITE VOLUTE II POLOGNE", "Que dit un lieu abandonné d’une époque ? D’une civilisation ? D’un moment ? Autant de questions que l’on se pose en contemplant les photos d’Aurélien Villette. Le photographe a une passion pour l’architecture qui influence, dit-il, « l’ensemble de notre vie » et dont la variété est pour lui « chaque jour un émerveillement ». Quel que soit le pays concerné (dans cette série : Liban, Japon, Pologne ou France), c’est ce qu’il appelle « l’esprit des lieux », qu’il cherche à capter et à partager à travers ses photos.", 84, "verticaliteVoluteIIPologne.jpeg", 1000, 2, 3, 1],

    ["HOTEL SEVENTIES JAPAN", "Que dit un lieu abandonné d’une époque ? D’une civilisation ? D’un moment ? Autant de questions que l’on se pose en contemplant les photos d’Aurélien Villette. Le photographe a une passion pour l’architecture qui influence, dit-il, « l’ensemble de notre vie » et dont la variété est pour lui « chaque jour un émerveillement ». Quel que soit le pays concerné (dans cette série : Liban, Japon, Pologne ou France), c’est ce qu’il appelle « l’esprit des lieux », qu’il cherche à capter et à partager à travers ses photos.", 84, "hotelSeventiesJapan.jpeg", 1000, 2, 3, 1],

    ["VERTICALITE VOLUTE - POLOGNE", "Depuis 2008, Aurélien Villette interroge le sens et la valeur patrimoniale de bâtiments abandonnés ou en ruine. Si ces-derniers représentent une ère de l’histoire de l’architecture, ils sont par ailleurs les témoins de l’histoire particulière d’un pays, d’une région ou d’une civilisation vouée à disparaître. Tirée de la série « Verticalité » que le photographe consacre aux lieux de passage, cette image devient un décor éternel, magnifié par la poussière, les fissures et les décorations vieillissantes.", 89, "verticalVolutePologne.jpeg", 1000, 1, 3, 1],

    ["EROSIONS VENITIENNES II", "Depuis 2008, Aurélien Villette interroge le sens et la valeur patrimoniale de bâtiments abandonnés ou en ruine. Si ces-derniers représentent une ère de l’histoire de l’architecture, ils sont par ailleurs les témoins de l’histoire particulière d’un pays, d’une région ou d’une civilisation vouée à disparaître. À travers la série « Érosions Vénitiennes », le photographe français capture la fragile beauté de Venise, une ville flottante spectaculaire menacée par la montée des eaux.", 89, "erorsionsVenitiennesII.jpeg", 1000, 2, 3, 1],

    ["TOPOPHILIA LA VILLA ROSE LIBAN", "Que dit un lieu abandonné d’une époque ? D’une civilisation ? D’un moment ? Autant de questions que l’on se pose en contemplant les photos d’Aurélien Villette. Le photographe a une passion pour l’architecture qui influence, dit-il, « l’ensemble de notre vie » et dont la variété est pour lui « chaque jour un émerveillement ». Quel que soit le pays concerné (dans cette série : Liban, Japon, Pologne ou France), c’est ce qu’il appelle « l’esprit des lieux », qu’il cherche à capter et à partager à travers ses photos.", 84, "topophiliaLaVillaRoseLiban.jpeg", 1000, 2, 3, 1], 

    ["AU-DELA", "Aurélien Villette s’inspire principalement de bâtiments en ruine. Ceux-ci renvoient à l’âge d’or d’un passé révolu et symbolisent pour la plupart l’histoire d’un pays, d’une région ou d’une civilisation vouée à disparaître. En cherchant l’esprit des lieux dans chaque architecture, ses pérégrinations l’amènent à s’intéresser aux pays marqués ou ayant été marqués par un régime totalitaire, ou bien à ceux en zone de conflit. Les ruines deviennent alors des espaces de contemplation et de méditation.", 89, "au-dela.jpeg", 1000, 2, 3, 1],

    ["LA BICYCLETTE Italie", "Aurélien Villette s’inspire principalement de bâtiments en ruine. Ceux-ci renvoient à l’âge d’or d’un passé révolu et symbolisent pour la plupart l’histoire d’un pays, d’une région ou d’une civilisation vouée à disparaître. En cherchant l’esprit des lieux dans chaque architecture, ses pérégrinations l’amènent à s’intéresser aux pays marqués ou ayant été marqués par un régime totalitaire, ou bien à ceux en zone de conflit. Les ruines deviennent alors des espaces de contemplation et de méditation.", 89, "laBicycletteItalie.jpeg", 1000, 2, 3, 1],

    ["Réminiscence - le buffet", "Au-delà d'un simple souci documentaire et de pérennisation, Aurélien Villette s'intéresse à la description et à l'esthétisation de lieux en déshérence. Les jeux de lumières, les matières vieillissantes, les perspectives et structures architecturales sont mis en évidence et magnifiés. Le silence, omniprésent, paraît correspondre à un temps qui se serait tu et fait émaner de ces photographies une atmosphère énigmatique, questionnant le spectateur sur la vie passée et l'esprit de ces lieux.", 89, "reminiscence-leBuffet.jpeg", 1000, 2, 3, 1],

    ["Cuba verticalite", "Au-delà d’un simple souci documentaire et de pérennisation, Aurélien Villette s’intéresse à la description et à l’esthétisation de lieux en déshérence. Les jeux de lumières, les matières vieillissantes, les perspectives et structures architecturales sont mis en évidence et magnifiés. Le silence, omniprésent, paraît correspondre à un temps qui se serait tu et fait émaner de ces photographies une atmosphère énigmatique, questionnant le spectateur sur la vie passée et l’esprit de ces lieux.", 89, "cubaVerticalite.jpeg", 1000, 2, 3, 1],

    ["RÉMINISCENCE, LIVRÉS À EUX MÊMES", "Au-delà d’un simple souci documentaire et de pérennisation, Aurélien Villette s’intéresse à la description et à l’esthétisation de lieux en déshérence. Les jeux de lumières, les matières vieillissantes, les perspectives et structures architecturales sont mis en évidence et magnifiés. Le silence, omniprésent, paraît correspondre à un temps qui se serait tu et fait émaner de ces photographies une atmosphère énigmatique, questionnant le spectateur sur la vie passée et l’esprit de ces lieux.", 89, "reminiscenceLivresAEuxMemes.jpeg", 1000, 2, 3, 1],

    ["Palazzo Sotto Voce", "Au-delà d’un simple souci documentaire et de pérennisation, Aurélien Villette s’intéresse à la description et à l’esthétisation de lieux en déshérence. Les jeux de lumières, les matières vieillissantes, les perspectives et structures architecturales sont mis en évidence et magnifiés. Le silence, omniprésent, paraît correspondre à un temps qui se serait tu et fait émaner de ces photographies une atmosphère énigmatique, questionnant le spectateur sur la vie passée et l’esprit de ces lieux.", 89, "palazzoSottoVoce.jpeg", 1000, 2, 3, 1],

    ["VERTICALITE VUE SUR COUR", "Depuis 2008, Aurélien Villette interroge le sens et la valeur patrimoniale de bâtiments abandonnés ou en ruine. Si ces-derniers représentent une ère de l’histoire de l’architecture, ils sont par ailleurs les témoins de l’histoire particulière d’un pays, d’une région ou d’une civilisation vouée à disparaître. Tirée de la série « Verticalité » que le photographe consacre aux lieux de passage, cette image devient un décor éternel, magnifié par la poussière, les fissures et les décorations vieillissantes.", 89, "verticaliteVueSurCour.jpeg", 1000, 1, 3, 1],

    ["EROSIONS VENITIENNES IV", "Depuis 2008, Aurélien Villette interroge le sens et la valeur patrimoniale de bâtiments abandonnés ou en ruine. Si ces-derniers représentent une ère de l’histoire de l’architecture, ils sont par ailleurs les témoins de l’histoire particulière d’un pays, d’une région ou d’une civilisation vouée à disparaître. À travers la série « Érosions Vénitiennes », le photographe français capture la fragile beauté de Venise, une ville flottante spectaculaire menacée par la montée des eaux.", 89, "erosionsVenitiennesIV.jpeg", 1000, 2, 3, 1],

    ["LOST IN THE PINES", "Aurélien Villette interroge le sens et la valeur patrimoniale d’anciens bâtiments abandonnés. Si ces derniers représentent une ère de l’histoire de l’architecture, ils sont par ailleurs les témoins de l’histoire particulière d’un pays, d’une région ou d’une civilisation. Le photographe parcourt donc le monde depuis 2008 en cherchant « l’esprit des lieux » dans chacune de ses images.", 84, "lostThePines.jpeg", 1000, 2, 3, 1],

    ["VERTICALITE CENTRALE HYDRAULIQUE", "Aurélien Villette interroge le sens et la valeur patrimoniale d’anciens bâtiments abandonnés. Si ces derniers représentent une ère de l’histoire de l’architecture, ils sont par ailleurs les témoins de l’histoire particulière d’un pays, d’une région ou d’une civilisation. Le photographe parcourt donc le monde depuis 2008 en cherchant « l’esprit des lieux » dans chacune de ses images.", 89, "verticaliteCentraleHydraulique.jpeg", 1000, 1, 3, 1],

    ["VERTICALITE LA VILLE BECARRE FRANCE", "Que dit un lieu abandonné d’une époque ? D’une civilisation ? D’un moment ? Autant de questions que l’on se pose en contemplant les photos d’Aurélien Villette. Le photographe a une passion pour l’architecture qui influence, dit-il, « l’ensemble de notre vie » et dont la variété est pour lui « chaque jour un émerveillement ». Quel que soit le pays concerné (dans cette série : Liban, Japon, Pologne ou France), c’est ce qu’il appelle « l’esprit des lieux », qu’il cherche à capter et à partager à travers ses photos.", 84, "verticaliteLaVilleBecarreFrance.jpeg", 1000, 1, 3, 1],

    ["PALACIO RUBATO", "Au-delà d'un simple souci documentaire et de pérennisation, Aurélien Villette s'intéresse à la description et à l'esthétisation de lieux en déshérence. Les jeux de lumières, les matières vieillissantes, les perspectives et structures architecturales sont mis en évidence et magnifiés. Le silence, omniprésent, paraît correspondre à un temps qui se serait tu et fait émaner de ces photographies une atmosphère énigmatique, questionnant le spectateur sur la vie passée et l'esprit de ces lieux.", 89, "palacioRubato.jpeg", 1000, 2, 3, 1],

    ["VILLA ARIOSO", "Au-delà d'un simple souci documentaire et de pérennisation, Aurélien Villette s'intéresse à la description et à l'esthétisation de lieux en déshérence. Les jeux de lumières, les matières vieillissantes, les perspectives et structures architecturales sont mis en évidence et magnifiés. Le silence, omniprésent, paraît correspondre à un temps qui se serait tu et fait émaner de ces photographies une atmosphère énigmatique, questionnant le spectateur sur la vie passée et l'esprit de ces lieux.", 89, "villaArioso.jpeg", 1000, 2, 3, 1],

    /**
     * John Wright
     */

     ["HE'S NOT HERE", "Dans la série “Mistress”, le photographe britannique John Wright explore les différents stades d’une liaison extraconjugale. Avec “He’s Not Here”, le photographe symbolise le déni mais également la déception d’une infidélité. Alors que la scène se situe quelque part dans l’Amérique des années 1950, le cliché représente cependant un acte universel et intemporel. Outre ses projets personnels, le photographe prête son style si distinctif aux campagnes publicitaires de marques prestigieuses telles que Louis Vuitton, Dior, Fendi ou encore Elie Saab.", 84, "hesNotHere.jpeg", 1000, 2, 1, 2],

     /**
      * Pedro Jarque Krebs
      */

      ["EBONY AND IVORY", "En immortalisant des bêtes sauvages dans leur milieu naturel et travaillant ensuite l’éclairage en postproduction pour les faire apparaître sur fond neutre, Pedro Jarque Krebs prétend aider à casser la barrière que nous avons construite au fil des siècles autour de notre relation avec le monde animal. Le jeu d’ombres et de lumières permet ainsi de créer l'atmosphère nécessaire pour aborder les animaux émotionnellement. Il a été suggéré que notre contemplation de ceux-ci ait toujours représenté une manière de réfléchir l’origine de l’humanité.", 84, "ebonyAndIvory.jpeg", 1000, 2, 2, 3],

      /**
       * Damien Dufresne
       */

       ["LIN LONG 2", "Damien Dufresne est un photographe atypique. Issu des domaines très « normés » du maquillage et de la publicité, il a trouvé, dans la photographie d’art, une liberté propice à l’épanouissement de son talent : ...« Je peux enfin laisser libre cours à mon imagination, suivre mon instinct. Je ne m’interdis rien. Je fais des images qui ont un sens pour moi. C’est ma façon, sans utiliser les mots, de raconter des histoires et de partager des émotions.»", 89, "linLong2.jpeg", 1000, 2, 1, 4], 

       /**
        * Alfredo Sanchez
        */

        ["MAYA GODDESS", "À l’instar d’un chorégraphe, le photographe mexicain Alfredo Sanchez compose chacune de ses prises de vue comme une danse. Remplies de couleurs, de texture et de beauté, elles attirent l’attention sur la nature, les éléments et ses merveilles. Fasciné par la nature et inspiré par l’exercice du portrait, il mêle ses passions dans des créations où l’ordinaire vient frôler la perfection.", 84, "mayaGoddess.jpeg", 1000, 3, 1, 5],

        /**
         * Thibaud Poirier
         */

        ["TRINITY COLLEGE LIBRARY", "Thibaud Poirier aime les bibliothèques et l’architecture. Il a donc posé son appareil dans les plus belles salles accueillant des livres un peu partout dans le monde, toujours au centre, pour « mettre en valeur la symétrie et la perspective des lieux » et donner au spectateur « un sentiment d’immersion ». Un sentiment d’autant plus fort, que les lieux sont vides de toute présence humaine « afin de brosser des portraits surréalistes et intemporels de ces monuments. »", 84, "trinityCollegeLibrary.jpeg", 1000, 2, 3, 6],

        /**
         * Gamma Agency
         */

        ["VIE PRIVÉE", "The actress was 28 years old when she was directed by Louis Malle for the film \"Vie priv\"", 84, "viePrivee.jpeg", 1000, 2, 7, 7], 









];

$db->query('SET FOREIGN_KEY_CHECKS = 0');
$db->query('TRUNCATE oeuvre');
$db->query('SET FOREIGN_KEY_CHECKS = 1');

foreach ($oeuvres as $oeuvre ) {
    $query= $db->prepare("INSERT INTO oeuvre (nom, description, prix, image, quantite, orientation_id, categorie_id, user_id) 
                        VALUES (:nom, :description, :prix, :image, :quantite, :orientation_id, :categorie_id, :user_id)");
    $query->bindValue(":nom", $oeuvre[0] );
    $query->bindValue(":description", $oeuvre[1]);
    $query->bindValue(":prix", $oeuvre[2]);
    $query->bindValue(":image", $oeuvre[3]);
    $query->bindValue(":quantite", $oeuvre[4]);
    $query->bindValue(":orientation_id", $oeuvre[5]);
    $query->bindValue(":categorie_id", $oeuvre[6]);
    $query->bindValue(":user_id", $oeuvre[7]);
    $query->execute();
}