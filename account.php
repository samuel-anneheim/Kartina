<?php 

    $stylesheet = "./assets/css/account/account.css";
    $title = "Connexion";
    require __DIR__.'./partials/navbar.php';

?>
    <link rel="stylesheet" href="./assets/css/account/account.css">

    <title>account</title>


        <h1>Mon compte Login</h1>

        <div class="bloc">
            <div class="connexionPage">

                <form action="verification.php" method="POST">
                    <h2>Déjà client</h2>

                    <label><b>Adresse e-mail</b></label>
                    <input type="email" placeholder="Entrer votre E-mail" name="username" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                    <input type="submit" id='submit' value='Se connecter'>

                </form>

            </div>

            <div class="createAccount">

                <h2>Vous n'avez pas de compte Kartina</h2>
                <p>Vous pouvez commandez sans créer de compte. Vous pourrez créer un compte plutard.</p>

                <a href="./createAccount.php">Créer un compte</a>

            </div>

        </div>

    </div>

</body>

</html>