<?php

$stylesheet = './assets/css/connexion/connexion.css';
$title = 'Connexion';
require __DIR__ . './partials/navbar.php';

$email = $_POST['email'] ?? '';
$pwd = $_POST['pwd'] ?? '';

$errors = [];

if (!empty($_POST)) {
    $query = $db->prepare(
        'SELECT * FROM user WHERE email = :email'
    );
    $query->bindValue(':email', $email);
    $query->execute();
    $user = $query->fetch();

    if ($user && password_verify($pwd, $user['pwd'])) {
        // On est connecté
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } else {
        $errors['errors'] = 'Email ou mot de passe incorrect';
    }
}

?>

<h1>Mon compte login</h1>
<section class="container-connexion-nouveau">

    <article class="container-connexion">
        <h2>Déjà client</h2>
        <form action="" method="post">

            <div class="decline-email large-form r">
                <label for="email">Votre email</label>
                <div>
                    <input class="<?= isset($errors['email']) ? 'is-invalid' : ''; ?>" type="mail" name="email" id="email" required value="<?= $email ?>">
                </div>
            </div>

            <div class="decline-pwd large-form r">
                <label for="pwd">Mot de passe</label>
                <div>
                    <input class="<?= isset($errors['pwd']) ? 'is-invalid' : ''; ?>" type="password" name="pwd" id="pwd" required>
                </div>
            </div>

            <?php if (isset($errors['errors'])) { ?>
                <span class="error-text"><?= $errors['errors'] ?></span>
            <?php } ?>

            <div class="send large-form">
                <button>Envoyer</button>
            </div>
        </form>
    </article>

    <article class="container-nouveau">
        <h2>Vous n'avez pas de compte Kartina</h2>
        <p>Vous pouvez commander sans créer de compte. Vous pourrez créer votre compte plus tard.</p>
        <div class="button-creation">
            <a href="./inscription.php">créer un compte &#10148; </a>
        </div>
    </article>
</section>

<?php require __DIR__ . './partials/footer.php'; ?>