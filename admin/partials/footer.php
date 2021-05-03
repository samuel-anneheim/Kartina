<footer class="footer">

    <div class="row">
        <div class="footer-col">
            <h4>Photographies</h4>
            <ul>
                <li><a href="#">Mode</a></li>
                <li><a href="#">Nature</a></li>
                <li><a href="#">Urban</a></li>
                <li><a href="#">Voyage</a></li>
                <li><a href="#">Rêve & Création</a></li>
                <li><a href="#">Sport & Technique</a></li>
                <li><a href="#">Célébrités & Histoire</a></li>
                <li><a href="#">Paysage</a></li>
                <li><a href="#">Artiste</a></li>
                <li><a href="#">Coups de coeurs</a></li>
                <li><a href="#">Nouveautés</a></li>
                <li><a href="#">Meilleures ventes</a></li>
                <li><a href="#">Derniers tirages</a></li>
                <li><a href="#">Noir & blanc</a></li>
                <li><a href="#">Inspirations</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>A propos</h4>
            <ul>
                <li><a href="#">Magazine</a></li>
                <li><a href="#">Concept</a></li>
                <li><a href="#">Laboratoire</a></li>
                <li><a href="#">Galeries</a></li>
                <li><a href="#">Devenir franchisé</a></li>
                <li><a href="#">Nous rejoindre</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Aide & Guide</h4>
            <ul>
                <li><a href="#">Ou est ma commande ? </a></li>
                <li><a href="#">Livraison et retours</a></li>
                <li><a href="#">Guide des formats et finitions</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <h4>Nos réseaux</h4>
            <div class="social-links">
                <a href="https://www.facebook.com/YellowKornerFrench" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/yellowkorner" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/yellowkorner_official/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="lien">
        <a href="./Mention.html">Mentions légales</a>
        <a href="./Conditions.html">Conditions générales d'utilisation</a>
    </div>

    <script>
        const sidebarBox = document.querySelector('#box'),
            sidebarBtn = document.querySelector('#btn');

        sidebarBtn.addEventListener('click', event => {
            sidebarBtn.classList.toggle('active');
            sidebarBox.classList.toggle('active');
        });

        window.addEventListener('keydown', event => {

            if (sidebarBox.classList.contains('active') && event.keyCode === 27) {
                sidebarBtn.classList.remove('active');
                sidebarBox.classList.remove('active');
            }
        });
    </script>

</footer>

</div>

</body>

</html>