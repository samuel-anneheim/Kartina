<?php
ob_start();
$stylesheet = './assets/css/add-adresse/add-adresses.css';
$title = 'Adresses';
require __DIR__ . '/partials/navbar.php';

$numero = $_POST['numero'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$cp = $_POST['cp'] ?? '';
$ville = $_POST['ville'] ?? '';
$supplement = $_POST['supplement'] ?? null;
$pays = $_POST['pays'] ?? '';

$errors = [];


if (!empty($_POST)) {
    if (strlen($numero) < 1) {
        $errors['numero'] = 'Veuillez insérer un numéro';
    }
    if ($adresse == '') {
        $errors['adresse'] = 'veuillez insérer une adresse';
    }
    if ($cp == '') {
        $errors['cp'] = 'veuillez insérer un code postale';
    }
    if ($ville == '') {
        $errors['ville'] = 'Veuillez insérer une ville';
    }
    if ($pays == '') {
        $errors['pays'] = 'Veuillez insérer un pays';
    }

    if (empty($errors)) {
        global $db;
        $query = $db->prepare('INSERT INTO adresse (numero, rue, cp, ville, supplement, pays) 
                               VALUES (:numero, :adresse, :cp, :ville, :supplement, :pays)');
        $query->bindValue(':numero', $numero);
        $query->bindValue(':adresse', $adresse);
        $query->bindValue(':cp', $cp);
        $query->bindValue(':ville', $ville);
        $query->bindValue(':supplement', $supplement);
        $query->bindValue(':pays', $pays);
        $query->execute();

        $adresse = $db->query('SELECT * FROM adresse WHERE id ORDER BY id DESC LIMIT 1')->fetch();

        $query = $db->prepare('INSERT INTO adresse_has_user (adresse_id, user_id) VALUES (:id_ad, :id_u)');
        $query->bindValue(':id_ad', intval($adresse['id']));
        $query->bindValue(':id_u', intval($_SESSION['user']['id']));
        $query->execute();

        header('Location: adresse.php');

    }
}
?>


<div class="container-full">

    <?php require __DIR__ . '/partials/navadmin.php'; ?>

    <section>
        <div class="cotnainer-title">
            <h1>Ajout adresse</h1>
        </div>

        <div class="separation"></div>

        <form action="" method="post">


            <div class="decline-numero double-section-form ">
                <div class="decline-numero double-form r">
                    <label for="numero">N°</label>
                    <div>
                        <input class="<?= isset($errors['numero']) ? 'is-invalid' : ''; ?>" type="text" name="numero" id="numero" required value="<?= $numero ?>">
                    </div>
                    <?php if (isset($errors['numero'])) { ?>
                        <span class="error-text"><?= $errors['numero'] ?></span>
                    <?php } ?>
                </div>
                <div class="decline-adresse double-form r">
                    <label for="adresse">Adresse</label>
                    <div>
                        <input class="<?= isset($errors['adresse']) ? 'is-invalid' : ''; ?>" type="text" name="adresse" id="adresse" required value="<?= $adresse ?>">
                    </div>
                    <?php if (isset($errors['adresse'])) { ?>
                        <span class="error-text"><?= $errors['adresse'] ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="decline-numero double-section-form ">
                <div class="decline-cp double-form r">
                    <label for="cp">Code postale</label>
                    <div>
                        <input class="<?= isset($errors['cp']) ? 'is-invalid' : ''; ?>" type="text" name="cp" id="cp" required value="<?= $cp ?>">
                    </div>
                    <?php if (isset($errors['cp'])) { ?>
                        <span class="error-text"><?= $errors['cp'] ?></span>
                    <?php } ?>
                </div>

                <div class="decline-ville double-form r">
                    <label for="ville">Ville</label>
                    <div>
                        <input class="<?= isset($errors['ville']) ? 'is-invalid' : ''; ?>" type="text" name="ville" id="ville" required value="<?= $ville ?>">
                    </div>
                    <?php if (isset($errors['ville'])) { ?>
                        <span class="error-text"><?= $errors['ville'] ?></span>
                    <?php } ?>
                </div>
            </div>

            <div class="decline-supplement large-form">
                <label for="supplement">Supplement</label>
                <div>
                    <input class="<?= isset($errors['supplement']) ? 'is-invalid' : ''; ?>" type="text" name="supplement" id="supplement" value="<?= $supplement ?>">
                </div>
                <?php if (isset($errors['supplement'])) { ?>
                    <span class="error-text"><?= $errors['supplement'] ?></span>
                <?php } ?>
            </div>

            <div class="decline-pays large-form r">
                <label for="pays">Pays</label>
                <div>
                    <input class="<?= isset($errors['pays']) ? 'is-invalid' : ''; ?>" type="text" name="pays" id="pays" value="<?= $pays ?>">
                </div>
                <?php if (isset($errors['pays'])) { ?>
                    <span class="error-text"><?= $errors['pays'] ?></span>
                <?php } ?>
            </div>

            <div class="send large-form">
                <button>Envoyer</button>
            </div>

        </form>
    </section>

</div>

<?php require __DIR__ . '/partials/footer.php' ?>