<?php 

    $stylesheet = "./assets/css/help/help.css";
    $title = "Forulaire de contact";
    require __DIR__.'./partials/navbar.php'

?>
    <link rel="stylesheet" href="./assets/sass/help.css">

    <title>Formulaire de contact</title>
</head>

        <form action="" name="formulaire">

            <h1>Formulaire de Contact</h1>

            <div class="civilite">
                <label for="">Monsieur</label>
                <input type="radio" checked>
                <label for="">Madame</label>
                <input type="radio">
            </div>

            <div class="champs">
                <label for="">Nom<span style="color: red;">*</span></label>
                <input type="text" name="lastname" placeholder="Veulliez saisir votre Nom" required>
                <label for="">Prénom<span style="color: red;">*</span></label>
                <input type="text" name="firstname" placeholder="Veulliez saisir votre Prénom" required>
                <label for="">Email<span style="color: red;">*</span></label>
                <input type="email" name="email" placeholder="Entrez votre adresse mail" required>
                <label for="">Téléphone<span style="color: red;">*</span></label>
                <input type="tel" name="phone" placeholder="Entrez votre numéro de téléphone" required>
            </div>

            <div class="list">
                <label for="">Sujet<span style="color: red;">*</span></label>
                <select name="help" id="help" required>
                    <option value="Aide">liste déroulante avec les options suivantes</option required>
                    <option value="Aide">liste déroulante avec les options suivantes</option required>
                    <option value="Aide">liste déroulante avec les options suivantes</option required>
                    <option value="Aide">liste déroulante avec les options suivantes</option required>
                    <option value="Aide">A</option required>
                </select>
            </div>

            <div class="message">
                <label for="">Message<span style="color: red;">*</span></label>
                <textarea name="message" id="message" cols="20" rows="2" placeholder="Votre message"></textarea>
            </div>

            <div class="submit">
                <button type="button" name="v" id="validation">Valider</button>
                <a href="./validationFormulaire.php"><button type="button" name="send"
                        style="display: none;">Envoyer</button></a>
            </div>

        </form>

    </div>

    <script src="./assets/js/help.js">

    </script>

</body>

</html>