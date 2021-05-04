<?php

$stylesheet = './assets/css/help/help.css';
$title = 'Inscription';
require __DIR__ . './partials/navbar.php';

$civilite = $_POST['genre'] ?? '';
$nom = htmlspecialchars($_POST['nom'] ?? '');
$prenom = htmlspecialchars($_POST['prenom'] ?? '');
$email = htmlspecialchars(email_space($_POST['email'] ?? ''));
$pwd = htmlspecialchars($_POST['pwd'] ?? '');
$pwdc = htmlspecialchars($_POST['pwdc'] ?? '');

$errors = [];

if (!empty($_POST)) {

    // Vérifier que l'email est unique
    global $db;
    $query = $db->prepare('SELECT * FROM user WHERE email = :email');
    $query->execute([':email' => $email]);
    $user = $query->fetch();

    if ($user) {
        $errors['existe'] = "L'email existe déjà";
    } else {
        if ($civilite == "") {
            $errors['civilite'] = "Veuillez nous dire si vous êtes un homme ou une femme";
        }
        if (iconv_strlen($prenom) < 2) {
            $errors["prenom"] = "Votre prénom doit faire au moins deux caractère";
        }
        if (iconv_strlen($nom) < 2) {
            $errors["nom"] = "Votre nom doit faire au moins deux caractère";
        }
        if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Veuillez rentrer une adresse email valide";
        }
        if (preg_match('/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/', $pwd) == false) {
            $errors['pwd'] = "Votre mot de passe doit faire au 6 caractères, une majuscule, une minuscule, un nombre";
        }
        if ($pwd !== $pwdc) {
            $errors['pwdc'] = "Veuillez entrer le même mot de passe qu'au dessus";
        }

        if (empty($errors)) {
            /** @var PDO $db */
            $query = $db->prepare(
                'INSERT INTO user (email, civilite, nom, prenom, pwd ,isArtiste) VALUES (:email, :civilite, :nom, :prenom, :pwd, :isArtiste)'
            );
            $query->bindValue(':email', $email);
            $query->bindValue(':civilite', $civilite);
            $query->bindValue(':nom', $nom);
            $query->bindValue(':prenom', $prenom);
            $query->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
            $query->bindValue(':isArtiste', 0);
            $query->execute();
    
            $user = $db->query('SELECT * FROM user WHERE email = "'.$email.'"')->fetch();
            $_SESSION['user'] = $user;
    
            header('Location: index.php');
        }
    }
}




?>

<h1>Formulaire d'inscrtiption</h1>

<?php if (isset($errors['existe'])) {?>
    <p class="compte-existant">Vous avez déjà un compte à cette adresse mail. Vous pouvez vous <a href="./connexion.php">connecter</a> </p>
<?php }?>
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

        <div class="decline-pwd large-form r">
            <label for="pwd">Votre mot de passe</label>
            <div>
                <input class="<?= isset($errors['pwd']) ? 'is-invalid' : ''; ?>" type="password" name="pwd" id="pwd" required>
            </div>
            <?php if (isset($errors['pwd'])) { ?>
                <span class="error-text"><?= $errors['pwd'] ?></span>
            <?php } ?>
        </div>

        <div class="decline-pwdc large-form r">
            <label for="pwdc">Confirmation mot de passe</label>
            <div>
                <input class="<?= isset($errors['pwdc']) ? 'is-invalid' : ''; ?>" type="password" name="pwdc" id="pwdc" required>
            </div>
            <?php if (isset($errors['pwdc'])) { ?>
                <span class="error-text"><?= $errors['pwdc'] ?></span>
            <?php } ?>
        </div>

        <div class="send large-form">
            <button>Envoyer</button>
        </div>
    </form>
</section>



<?php require __DIR__ . './partials/footer.php'; ?>
