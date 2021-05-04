<?php
$stylesheet = './assets/css/donnee/donnee.css';
$title = 'Données personnelles';
require __DIR__ . '/partials/navbar.php';

$civilite = $_POST['genre'] ?? $_SESSION['user']['civilite'];
$nom = htmlspecialchars($_POST['nom'] ?? $_SESSION['user']['nom']);
$prenom = htmlspecialchars($_POST['prenom'] ?? $_SESSION['user']['prenom']);
$email = htmlspecialchars(email_space($_POST['email'] ?? $_SESSION['user']['email']));
$tel = htmlspecialchars($_POST['tel'] ?? null);


$errors = [];

if (!empty($_POST)) {

    if ($civilite == "") {
        $errors['civilite'] = "Veuillez nous dire si vous êtes un homme ou une femme";
    }
    if (iconv_strlen($prenom) < 2) {
        $errors["prenom"] = "Votre prénom doit faire au moins deux caractère";
    }
    if (iconv_strlen($nom) < 2) {
        $errors["nom"] = "Votre nom doit faire au moins deux caractère";
    }
    if (($tel !== '') && (iconv_strlen($tel) !== 10)) {
        $errors['tel'] = "Numéro invalide exemple : 0601020304";
    }

    if (empty($errors)) {
        /** @var PDO $db */
        $query = $db->prepare(
            'UPDATE user SET civilite = :civilite, nom = :nom, prenom = :prenom, telephone = :tel WHERE id = :id'
        );
        $query->bindValue(':civilite', $civilite);
        $query->bindValue(':nom', $nom);
        $query->bindValue(':prenom', $prenom);
        $query->bindValue(':tel', $tel);
        $query->bindValue(':id', $_SESSION["user"]['id']);
        $query->execute();

        $user = $db->query('SELECT * FROM user WHERE email = "'.$email.'"')->fetch();
        $_SESSION['user'] = $user;

        header('Location: dashboard.php');
    }
}


?>


<div class="container-full">

    <?php require __DIR__ . '/partials/navadmin.php'; ?>

    <section>
        <div class="cotnainer-title">
            <h1>Donnée personnelles</h1>
        </div>

        <div class="separation"></div>

        <form action="" method="POST">
            <div class="email">
                <p>Votre email : <span><?= $_SESSION['user']['email'] ?></span></p>
            </div>
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

            <div class="decline-pwd large-form r">
                <label for="pwd">Téléphone</label>
                <div>
                    <input class="<?= isset($errors['tel']) ? 'is-invalid' : ''; ?>" type="tel" name="tel" id="tel">
                </div>
                <?php if (isset($errors['tel'])) { ?>
                    <span class="error-text"><?= $errors['tel'] ?></span>
                <?php } ?>
            </div>

            <div class="send large-form">
                <button>Envoyer</button>
            </div>
        </form>
    </section>

</div>

<?php require __DIR__ . '/partials/footer.php' ?>