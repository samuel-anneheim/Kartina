<?php 

    $stylesheet = './assets/css/account/createAccount.css';
    $title = 'Création du compte';
    require __DIR__.'./partials/navbar.php'
?>



        <form action="" name="formulaire" method="post">

            <h1>Créer son compte</h1>

            <div class="civilite">
                <label for="">Civilité</label>
                <select name="civilite" id="civilite">
                    <option value="monsieur">Mr</option required>
                    <option value="madame">Mme</option required>
                </select>
            </div>
            
            <div class="champs">
                <label for="">Nom<span style="color: red;">*</span></label>
                <input type="text" name="lastname" placeholder="Veulliez saisir votre Nom" required>
                <label for="">Prénom<span style="color: red;">*</span></label>
                <input type="text" name="firstname" placeholder="Veulliez saisir votre Prénom" required>
                <label for="">Email<span style="color: red;">*</span></label>
                <input type="email" name="email" placeholder="Entrez votre adresse mail"required>
                <label for="">Mot de passe<span style="color: red;">*</span></label>
                <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
                <label for="">Confirmation mot de passe<span style="color: red;">*</span></label>
                <input type="password" name="confirmationPassword" placeholder="Confirmer votre mot de passe" required>
                <label for="">Téléphone<span style="color: red;">*</span></label>
                <input type="tel" name="phone" placeholder="Entrez votre numéro de téléphone"required>
            </div>

            <div class="submit">
                <button type="button" name="v" id="validation">Valider</button>
                <a href="./validationAccount.php"><button type="button" name="send" style="display: none;">Envoyer</button></a>
            </div>

        </form>

    </div>

    <script src="./assets/js/createAccount.js">

    </script>

</body>

</html>