<?php 

$stylesheet = './assets/css/helpS/helpS.css';
$title = 'Contact';
require __DIR__ . './partials/navbar.php';

$civilité = htmlspecialchars($_POST['genre'] ?? '');
$nom = htmlspecialchars($_POST['nom'] ?? '');
$prenom = $_POST['prenom'] ?? '';
$email = $_POST['email'] ?? '';
$sujet= $_POST['sujet'] ?? '';
$tel = $_POST['tel'] ?? null;
$message = $_POST['message'] ?? '';

$errors = [];
var_dump($nom);

if (!empty($_POST)){
    if (false === filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Veuillez rentrer une adresse email valide";
    }
    // if ($subject <= )
}

?>

<section class="formulaire">
    <form action="" method="POST">
        <p class="you">Vous êtes</p>
        <div class="choice-genre">
            <div class="choice">
                <input type="radio" name="genre" id="genre" value="M." required>
                <div>
                    <label for="genre">Un homme</label>
                </div>
            </div>
            <div class="choice">
                <input type="radio" name="genre" id="genre" value="Mme." required>
                <div>
                    <label for="genre">Une femme</label>
                </div>
            </div>
        </div>

        <div class="decline-identity double-section-form ">
            <div class="decline-name double-form r">
                <label for="prenom">Prénom</label>
                <div>
                    <input type="text" name="prenom" id="prenom" required>
                </div>
            </div>
            <div class="decline-firstname double-form r">
                <label for="nom">Nom</label>
                <div>
                    <input type="text" name="nom" id="nom" required>
                </div>
            </div>
        </div>

        <div class="decline-email large-form r">
            <label for="email">Votre email</label>
            <div>
                <input type="mail" name="email" id="email" required>
            </div>
        </div>

        <div class="choice-subject large-form r">
            <label for="sujet">Sujet</label>
            <div>
                <select name="sujet" id="sujet" required>
                    <option value="">Aide pour commander</option>
                    <option value="">Après-vente, échange et retour</option>
                    <option value="">problème technique</option>
                    <option value="">Autres sujets</option>
                </select>
            </div>
        </div>

        <div class="decline-phone large-form">
            <label for="tel">Téléphone</label>
            <div>
                <input type="text" name="tel" id="tel">
            </div>
        </div>

        <div class="area-bloc large-form r">
            <label for="message">Votre message</label>
            <div>
                <textarea name="message" id="message" maxlength="1000" required></textarea>
            </div>
        </div>

        <div class="send large-form">
            <button>Envoyer</button>
        </div>
    </form>
</section>

<?php require __DIR__ . './partials/footer.php'; ?>