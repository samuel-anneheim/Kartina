<?php

$stylesheet = './assets/css/helpS/helpS.css';
$title = 'Contact';
require __DIR__ . './partials/navbar.php';

$civilite = $_POST['genre'] ?? '';
$nom = htmlspecialchars($_POST['nom'] ?? '');
$prenom = htmlspecialchars($_POST['prenom'] ?? '');
$email = htmlspecialchars(email_space($_POST['email']) ?? '');
$sujet = htmlspecialchars($_POST['sujet'] ?? '');
$tel = htmlspecialchars($_POST['tel'] ?? null);
$message = htmlspecialchars($_POST['message'] ?? '');

$errors = [];

if (!empty($_POST)) {
    if ($civilite == "") {
        $errors['civilite'] = "Veuillez nous dire si vous êtes un homme ou une femme";
    }
    if (iconv_strlen($prenom) < 2) {
        $errors["prenom"] = "Votre prénom doit faire au moins deux caractère";
    }
    if (iconv_strlen($nom)< 2) {
        $errors["nom"] = "Votre nom doit faire au moins deux caractère";
    }
    if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Veuillez rentrer une adresse email valide";
    }

    if (($sujet !== 'Aide pour commander') && ($sujet !== 'Après-vente, échange et retour') && ($sujet !== 'problème technique') && ($sujet !== 'Autres sujets')) {
        $errors["sujet"] = "choisissez un sujet valide";
    }

    if (iconv_strlen($message) < 15) {
        $errors["message"] = "Votre message doit faire au moins 15 caractères";
    }
}




?>

<h1>Formulaire de contact</h1>
<section class="formulaire">
    <form action="" method="POST">
        <p class="you">Vous êtes</p>

        <div class="choice-genre">
            <div class="choice">
                <input type="radio" name="genre" id="genre" value="M." required <?php if ($civilite == 'M.') { ?> checked <?php } ?>>
                <div>
                    <label for="genre">Un homme</label>
                </div>
            </div>
            <div class="choice">
                <input type="radio" name="genre" id="genre" value="Mme." required <?php if ($civilite == 'Mme.') { ?> checked <?php } ?>>
                <div>
                    <label for="genre">Une femme</label>
                </div>
            </div>
            <?php if (isset($errors['civilite'])) { ?>
                <span class="error-text"><?= $errors['civilite'] ?></span>
            <?php } ?>
        </div>

        <div class="decline-identity double-section-form ">
            <div class="decline-name double-form r">
                <label for="prenom">Prénom</label>
                <div>
                    <input class="<?= isset($errors['prenom']) ? 'is-invalid' : ''; ?>" type="text" name="prenom" id="prenom" required value="<?= $prenom ?>">
                </div>
                <?php if (isset($errors['prenom'])) { ?>
                    <span class="error-text"><?= $errors['prenom'] ?></span>
                <?php } ?>
            </div>

            <div class="decline-firstname double-form r">
                <label for="nom">Nom</label>
                <div>
                    <input class="<?= isset($errors['nom']) ? 'is-invalid' : ''; ?>" type="text" name="nom" id="nom" required value="<?= $nom ?>">
                </div>
                <?php if (isset($errors['nom'])) { ?>
                    <span class="error-text"><?= $errors['nom'] ?></span>
                <?php } ?>
            </div>
        </div>

        <div class="decline-email large-form r">
            <label for="email">Votre email</label>
            <div>
                <input class="<?= isset($errors['email']) ? 'is-invalid' : ''; ?>" type="mail" name="email" id="email" required value="<?= $email ?>">
            </div>
            <?php if (isset($errors['email'])) { ?>
                <span class="error-text"><?= $errors['email'] ?></span>
            <?php } ?>
        </div>

        <div class="choice-subject large-form r">
            <label for="sujet">Sujet</label>
            <div>
                <select class="<?= isset($errors['sujet']) ? 'is-invalid' : ''; ?>" name="sujet" id="sujet" required>
                    <option value="Aide pour commander" <?php if ($sujet == 'Aide pour commander') { ?> selected <?php }?> >Aide pour commander</option>
                    <option value="Après-vente, échange et retour" <?php if ($sujet == 'Après-vente, échange et retour') { ?> selected <?php }?> >Après-vente, échange et retour</option>
                    <option value="Problème technique" <?php if ($sujet == 'Problème technique') { ?> selected <?php }?>>Problème technique</option>
                    <option value="Autres sujets" <?php if ($sujet == 'Autres sujets') { ?> selected <?php }?>>Autres sujets</option>
                </select>
                <?php if (isset($errors['sujet'])) { ?>
                    <span class="error-text"><?= $errors['sujet'] ?></span>
                <?php } ?>
            </div>
        </div>

        <div class="decline-phone large-form">
            <label for="tel">Téléphone</label>
            <div>
                <input class="<?= isset($errors['tel']) ? 'is-invalid' : ''; ?>" type="text" name="tel" id="tel" value="<?= $tel ?>">
            </div>
            <?php if (isset($errors['tel'])) { ?>
                <span class="error-text"><?= $errors['tel'] ?></span>
            <?php } ?>
        </div>

        <div class="area-bloc large-form r">
            <label for="message">Votre message</label>
            <div>
                <textarea class="<?= isset($errors['message']) ? 'is-invalid' : ''; ?>" name="message" id="message" maxlength="1000" required><?= $message ?></textarea>
            </div>
            <?php if (isset($errors['message'])) { ?>
                <span class="error-text"><?= $errors['message'] ?></span>
            <?php } ?>
        </div>

        <div class="send large-form">
            <button>Envoyer</button>
        </div>
    </form>
</section>



<?php require __DIR__ . './partials/footer.php'; ?>