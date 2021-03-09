<?php 

    $stylesheet = './assets/css/article/article.css';
    $title = 'Article';
    require __DIR__.'./partials/navbar.php';

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/article.css">
    <title>Article</title>
</head>

<body>
    <div class="container">
        <section class="presentationArticle">
            <article class="presentationImage">
                <figure class="grandeImage">
                    <img src="./assets/img/article/mong-kok-minibus.jpg" alt="" id="imagePrincipal">
                </figure>
                <div class="selection-image">

                    <figure class="listeImage">
                        <img src="./assets/img/article/mong-kok-minibus.jpg" alt="" id="second1">
                        <img src="./assets/img/article/icon-deco.png" alt="" id="second2">
                    </figure>

                    <figure class="aggrandirImage">
                        <img src="./assets/img/article/expand.png" alt="">
                        <figcaption>
                            <p>Pleine écran</p>
                        </figcaption>
                    </figure>

                </div>
            </article>
            <article class="parcourDAchat">
                <div class="blocHaut">
                    <h2>Créez votre photographies d'art sur mesure</h2>
                    <div class="catAchat">
                        <div class="format">
                            <div class="logo-format"><span>1</span></div>
                            <p>Format</p>
                        </div>
                        <div class="finition">
                            <div class="logo-finition"><span>2</span></div>
                            <p>Finition</p>
                        </div>
                        <div class="cadre">
                            <div class="logo-cadre"><span>3</span></div>
                            <p>cadre</p>
                        </div>
                    </div>
                </div>

                <div class="blocOption">

                    <div class="formatGrand option">
                        <div class="image">
                            <figure>
                                <img src="./assets/img/article/grandFormat.png" alt="grand format">
                            </figure>
                        </div>
                        <div class="descriptionFormat">
                            <p><span class="format">GRAND</span> - 60 x 75cm à partir de <span class="prix">110€</span>
                            </p>
                            <p>Photographie montée sur aluminium, édition limitée 500 exemplaires</p>
                        </div>
                        <div class="checkOrNot" id="check">
                            <figure>
                                <img src="./assets/img/article/check.png" alt="check">
                            </figure>
                        </div>
                    </div>

                    <div class="formatGeant option">
                        <div class="image">
                            <figure>
                                <img src="./assets/img/article/geantFormat.png" alt="grand format">
                            </figure>
                        </div>
                        <div class="descriptionFormat">
                            <p><span class="format">GEANT</span> - 100 x 125cm à partir de <span
                                    class="prix">230€</span></p>
                            <p>Photographie montée sur aluminium, édition limitée 200 exemplaires</p>
                        </div>
                        <div class="checkOrNot" id="check">
                            <figure>
                                <img src="./assets/img/article/check.png" alt="check">
                            </figure>
                        </div>
                    </div>

                    <div class="formatCollector option">
                        <div class="image">
                            <figure>
                                <img src="./assets/img/article/collectorFormat.png" alt="grand format">
                            </figure>
                        </div>
                        <div class="descriptionFormat">
                            <p><span class="format">COLLECTOR</span> - 120 x 150cm à partir de <span
                                    class="prix">670€</span></p>
                            <p>Photographie montée sur aluminium, édition limitée 100 exemplaires</p>
                        </div>
                        <div class="checkOrNot" id="check">
                            <figure>
                                <img src="./assets/img/article/check.png" alt="check">
                            </figure>
                        </div>
                    </div>

                    <div class="formatClassique option">
                        <div class="image">
                            <figure>
                                <img src="./assets/img/article/classiqueFormat.png" alt="grand format">
                            </figure>
                        </div>
                        <div class="descriptionFormat">
                            <p><span class="format">CLASSIQUE</span> - 60 x 75cm à partir de <span
                                    class="prix">110€</span></p>
                            <p>Photographie montée sur aluminium, édition limitée 500 exemplaires</p>
                        </div>
                        <div class="checkOrNot" id="check">
                            <figure>
                                <img src="./assets/img/article/check.png" alt="check">
                            </figure>
                        </div>
                    </div>
                </div>
            </article>
            <article class="descArticle">
                <h1>Jöirg Dickmann</h1>
                <h2>Mong Kok Minibus</h2>
                <p>Né en 1973 à Sauerland, l’artiste Jörg Dickmann s’est installé à Munich dans le sud de l’Allemagne.
                    Autodidacte, il s’est intéressé à la photographie dès l’enfance, prenant exemple sur son père qui ne
                    quittait jamais son appareil SLR. Il tirait, à ses débuts, des instantanés pendant ses vacances,
                    pour le plaisir et sans ambition particulière. Son talent pour la prise de vue et le post traitement
                    numérique se développent à la fin des années 90. Doté d’un reflex numérique, il commence à diffuser
                    ses images sur les réseaux sociaux, celles-ci sont ensuite publiées dans divers magazines allemands
                    (Foto Praxis, Focus ou encore ELLE City). Les thèmes de prédilection de Jörg Dickmann sont les
                    paysages urbains, les scènes de rue, l’architecture et l’énergie lumineuse. Épris de voyages qu’il
                    mène aux quatre coins du monde, il réalise principalement des clichés en pose longue en
                    s’intéressant à richesse chromatique des villes une fois la nuit tombée.</p>
            </article>
        </section>
    </div>
    <script src="./assets/js/article.js"></script>
</body>

</html>