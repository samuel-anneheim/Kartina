<?php
$stylesheet = './assets/css/add-oeuvre/add-oeuvre.css';
$title = 'Adresses';
require __DIR__ . '/partials/navbar.php';

global $db;
$orientations = $db->query('SELECT * FROM orientation')->fetchAll();
$categories = $db->query('SELECT * FROM categorie')->fetchAll();

$nom = htmlspecialchars($_POST['nom'] ?? '');
$prix = htmlspecialchars(floatval($_POST['prix'] ?? ''));
$quantite = htmlspecialchars(intval($_POST['quantite'] ?? ''));
$orientation = htmlspecialchars($_POST['orientation'] ?? '');
$desc = htmlspecialchars($_POST['desc'] ?? '');
$categorieV = htmlspecialchars($_POST['categorieV'] ?? '');
$image = $_FILES['image'] ?? '';

$errors = [];

$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxSize = 10000 * 1024;
$id = $_SESSION['user']['id'];

if (!empty($_POST)) {
    if (iconv_strlen($nom) < 2) {
        $errors['nom'] = 'Veuillez écrire d\'au moins 2 caractères';
    }
    if ($prix < 10) {
        $errors['prix'] = 'votre prix d\'au au moins faire 10€';
    }
    if (($quantite < 1) || ($quantite > 1000)) {
        $errors['quantite'] = 'vous devez avoir au moins 1 article';
    }
    // if (in_array($orientation, $orientations)) {
    //     $errors["orientation"] = "choisissez une orientation valide";
    // }
    // if (in_array($categorieV, $categories)) {
    //     $errors["categorieV"] = "choisissez une categorie valide";
    // }
    if (empty($errors)) {
        if ($_FILES['image']['error'] === 0 && $_FILES['image']['size'] < $maxSize && in_array($_FILES['image']['type'], $allowedTypes)) {

            $query = $db->prepare("INSERT INTO oeuvre (nom, description, prix, image, quantite, orientation_id, categorie_id, user_id) 
            VALUES (:nom, :description, :prix, :image, :quantite, :orientation_id, :categorie_id, :user_id)");
            $query->bindValue(":nom", $nom);
            $query->bindValue(":description", $desc);
            $query->bindValue(":prix", $prix);
            $query->bindValue(":image", $image['name']);
            $query->bindValue(":quantite", $quantite);
            $query->bindValue(":orientation_id", $orientation);
            $query->bindValue(":categorie_id", $categorieV);
            $query->bindValue(":user_id", $id);
            $query->execute();

            // Récupèrer le fichier temporaire et le déplacer dans un dossier
            $file = $_FILES['image']['tmp_name'];
            // On va créer un dossier en PHP pour stocker les fichiers uploadés
            // __DIR__ renvoie C:\wamp64\www\10-upload
            if (!is_dir("../assets/img/artiste/$id")) {
                mkdir("../assets/img/artiste/$id");
            }

            // On récupère le nom du fichier
            $fileName = $_FILES['image']['name']; // deadpool.jpg

            // On doit déplacer le fichier dans le dossier
            move_uploaded_file($file, "../assets/img/artiste/$id/" . $fileName);
        } else {
            echo 'Veuillez envoyer un fichier au bon format (jpg, jpeg, png, gif) et à la bonne taille (100 ko)...';
        }
    }
}


?>


<div class="container-full">

    <?php require __DIR__ . '/partials/navadmin.php'; ?>

    <section>
        <div class="cotnainer-title">
            <h1>Adresses</h1>
        </div>

        <div class="separation"></div>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="decline-nom large-form r">
                <label for="nom">Titre</label>
                <div>
                    <input class="<?= isset($errors['nom']) ? 'is-invalid' : ''; ?>" type="text" name="nom" id="nom" value="<?= $nom ?>">
                </div>
                <?php if (isset($errors['nom'])) { ?>
                    <span class="error-text"><?= $errors['nom'] ?></span>
                <?php } ?>
            </div>

            <div class="double-section-form ">
                <div class="decline-prix double-form r">
                    <label for="prix">Prix</label>
                    <div>
                        <input class="<?= isset($errors['prix']) ? 'is-invalid' : ''; ?>" type="text" name="prix" id="prix" required value="<?= $prix ?>">
                    </div>
                    <?php if (isset($errors['prix'])) { ?>
                        <span class="error-text"><?= $errors['prix'] ?></span>
                    <?php } ?>
                </div>
                <div class="decline-quantite double-form r">
                    <label for="quantite">Quantité <span>(1000 max)</span></label>
                    <div>
                        <input class="<?= isset($errors['quantite']) ? 'is-invalid' : ''; ?>" type="text" name="quantite" id="quantite" required value="<?= $quantite ?>">
                    </div>
                    <?php if (isset($errors['quantite'])) { ?>
                        <span class="error-text"><?= $errors['quantite'] ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="double-section-form ">
                <div class="decline-orientation double-form r">
                    <label for="orientation">Orientation</label>
                    <div>
                        <select class="<?= isset($errors['orientation']) ? 'is-invalid' : ''; ?>" name="orientation" id="orientation" required>
                            <?php foreach ($orientations as $orientation) { ?>
                                <option value="<?= $orientation['id'] ?>" <?php if ($orientation == strval($orientation['id'])) { ?> selected <?php } ?>><?= $orientation['nom'] ?></option>
                            <?php } ?>
                        </select>
                        <?php if (isset($errors['orientation'])) { ?>
                            <span class="error-text"><?= $errors['orientation'] ?></span>
                        <?php } ?>
                    </div>
                </div>

                <div class="decline-categorie double-form r">
                    <label for="categorieV">Catégorie</label>
                    <div>
                        <select class="<?= isset($errors['categorieV']) ? 'is-invalid' : ''; ?>" name="categorieV" id="categorieV" required>
                            <?php foreach ($categories as $categorie) { ?>
                                <option value="<?= $categorie['id'] ?>" <?php if ($categorieV == $categorie['id']) { ?> selected <?php } ?>><?= $categorie['nom'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php if (isset($errors['categorieV'])) { ?>
                        <span class="error-text"><?= $errors['categorieV'] ?></span>
                    <?php } ?>
                </div>
            </div>

            <div class="area-bloc large-form r">
                <label for="desc">description</label>
                <div>
                    <textarea class="<?= isset($errors['desc']) ? 'is-invalid' : ''; ?>" name="desc" id="desc" maxlength="1000" required><?= $desc ?></textarea>
                </div>
                <?php if (isset($errors['desc'])) { ?>
                    <span class="error-text"><?= $errors['desc'] ?></span>
                <?php } ?>
            </div>

            <div class="decline-image large-form r">
                <label for="image">Image</label>
                <div>
                    <input class="<?= isset($errors['image']) ? 'is-invalid' : ''; ?>" type="file" name="image" id="image">
                </div>
                <?php if (isset($errors['image'])) { ?>
                    <span class="error-text"><?= $errors['image'] ?></span>
                <?php } ?>
            </div>

            <div class="send large-form">
                <button>Envoyer</button>
            </div>

        </form>

    </section>

</div>

<?php require __DIR__ . '/partials/footer.php' ?>