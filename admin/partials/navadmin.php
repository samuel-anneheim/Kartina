<aside>
    <div class="container-compte ele">
        <h3>Mon compte</h3>
        <ul>
            <li><a href="./modifDonnee.php">Données</a></li>
            <li><a href="./adresse.php">Adresses</a></li>
        </ul>
    </div>

    <div class='container-commande ele'>
        <h3>Commande</h3>
        <ul>
            <li><a href="">Historique</a></li>
        </ul>
    </div>

    <?php if ($_SESSION['user']['isArtiste'] == 1) { ?>
        <div class='container-photographie ele'>
            <h3>Photographie</h3>
            <ul>
                <li><a href="./add-oeuvre.php">Nouvelle oeuvre</a></li>
                <li><a href="./oeuvre.php">Oeuvre</a></li>
                <li><a href="">Vente passées</a></li>
            </ul>
        </div>
        <div class='container-artiste ele'>
            <h3>Artiste</h3>
            <ul>
                <li><a href="">Biographie</a></li>
            </ul>
        </div>
    <?php } ?>
</aside>