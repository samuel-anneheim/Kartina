<?php 

    $stylesheet = "assets/css/index.css";
    require './partials/navbar.php';

?>

        <header class="carousel">
            <figure class="slides">
                <img src="./assets/img/index/montain.jpg" alt="Paysage" class="slide">
                <img src="./assets/img/index/moon.jpg" alt="rock" class="slide">
                <img src="./assets/img/index/ny.jpg" alt="Futuriste" class="slide">
                <img src="./assets/img/index/vieuxpc.jpeg" alt="arcade" class="slide">
            </figure>
            <div class="controls">
                <div class="control prev-slide">&#9668;</div>
                <div class="control next-slide">&#9658;</div>
            </div>
            <div class="link_news">
                <a href="./article.php">
                    <h1>Nouvelle oeuvres</h1>
                    <span>Les collections légendaires</span>
                    <p>Explorer la nouvelle collection</p>
                </a>
            </div>
        </header>

        <section class="picture">
            <div class="title">
                <h2>Photographie d'art</h2>
                <p>Oeuvres en édition limitées et numérotée avec certificat d'authenticité</p>
            </div>
            <div class="container-img">
                <article>
                    <a href="./article.php">
                        <figure>
                            <img src="./assets/img/index/hes-not-here.jpg" alt="he's not here">
                            <figcaption>
                                <div>
                                    <p class="titre">John Wright</p>
                                    <p>He's Not Here</p>
                                </div>
                                <div>
                                    <p>A partir de</p>
                                    <p>84,00€</p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </article>
                <article>
                    <a href="./article.php">
                        <figure>
                            <img src="./assets/img/index/ebony-and-lvory.jpg" alt="Ebony and Ivory">
                            <figcaption>
                                <div>
                                    <p class="titre">Pedro Jarque Krebs</p>
                                    <p>Ebony and Ivory</p>
                                </div>
                                <div>
                                    <p>A partir de</p>
                                    <p>84,00€</p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </article>
                <article>
                    <a href="./article.php">
                        <figure>
                            <img src="./assets/img/index/lin-long-2.jpg" alt="Lin long 2">
                            <figcaption>
                                <div>
                                    <p class="titre">Damien Dufresne</p>
                                    <p>Lin long 2</p>
                                </div>
                                <div>
                                    <p>A partir de</p>
                                    <p>89,00€</p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </article>
                <article>
                    <a href="./article.php">
                        <figure>
                            <img src="./assets/img/index/maya-goddess.jpg" alt="Maya Goddess">
                            <figcaption>
                                <div>
                                    <p class="titre">Alfredo Sanchez</p>
                                    <p>Maya Goddess</p>
                                </div>
                                <div>
                                    <p>A partir de</p>
                                    <p>84,00€</p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </article>
                <article>
                    <a href="./article.php">
                        <figure>
                            <img src="./assets/img/index/trinity-college-library.jpg" alt="Trinity College Library">
                            <figcaption>
                                <div>
                                    <p class="titre">Thibaud Poirier</p>
                                    <p>Trinity College Library</p>
                                </div>
                                <div>
                                    <p>A partir de</p>
                                    <p>84,00€</p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </article>
                <article>
                    <a href="./article.php">
                        <figure>
                            <img src="./assets/img/index/vieprivee.jpg" alt="">
                            <figcaption>
                                <div>
                                    <p class="titre">Gamma Agency</p>
                                    <p>Vie privée</p>
                                </div>
                                <div>
                                    <p>A partir de</p>
                                    <p>84,00€</p>
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                </article>
            </div>
            <a href="" class="bottom-s-img">Explorer la collection</a>
        </section>

        <section class="quatro">
            <article class="voyage" style="background-image: url(./assets/img/index/manhattan-lights.jpg);">
                <div>
                    <a href="./article.php">
                        <h3>Voyage</h3>
                        <span>Vivez vos rêves</span>
                        <br>
                        Parcourir la collection
                    </a>
                </div>
            </article>
            <article class="black-and-white"
                style="background-image: url(./assets/img/index/hagenmuller-cordee-sur-les-aretes-de-rochefort-ii.jpg);">
                <div>
                    <a href="./article.php">
                        <h3>Noir & blanc</h3>
                        <span>oeuvres intemporelles</span>
                        <br>
                        Découvrir la collection
                    </a>
                </div>
            </article>
            <article class="artiste" style="background-image: url(./assets/img/index/hotel-seventies-japan.jpg);">
                <div>
                    <a href="./article.php">
                        <h3>Aurélien Vilette </h3>
                        <span>Edifices oubliés</span>
                        <br>
                        Découvrir l'artiste
                    </a>
                </div>
            </article>
            <article class="last-exe" style="background-image: url(./assets/img/index/tokyo-vi.jpg);">
                <a href="./article.php">
                    <div>
                        <h3>Derniers exemplaires </h3>
                        <span>passer pas à coté de votre oeuvre</span>
                        <br>Découvrir les oeuvres
                    </div>
                </a>
            </article>
        </section>

    <script>
        const delay = 15000; //ms

const slides = document.querySelector(".slides");
const slidesCount = slides.childElementCount;
const maxLeft = (slidesCount - 1) * 100 * -1;

let current = 0;

function changeSlide(next = true) {
  if (next) {
    current += current > maxLeft ? -100 : current * -1;
  } else {
    current = current < 0 ? current + 100 : maxLeft;
  }

  slides.style.left = current + "%";
}

let autoChange = setInterval(changeSlide, delay);
const restart = function() {
  clearInterval(autoChange);
  autoChange = setInterval(changeSlide, delay);
};

// Controls
document.querySelector(".next-slide").addEventListener("click", function() {
  changeSlide();
  restart();
});

document.querySelector(".prev-slide").addEventListener("click", function() {
  changeSlide(false);
  restart();
});
    </script>

<?php 

require './partials/footer.php';

?>