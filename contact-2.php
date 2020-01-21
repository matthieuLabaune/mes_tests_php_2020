<?php
//https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/utilisation-filtre/
//http://sdz.tdct.org/sdz/les-filtres-en-php-pour-valider-les-donnees-utilisateur.html
$nom = null;
$nom_success = null;
$nom_error = null;

$email = null;
$email_success = null;
$email_error = null;

if (!empty($_POST['nom'])) {
    $nom = $_POST['nom'];
    if (filter_var($nom, FILTER_SANITIZE_STRING)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'formulaire' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';
        file_put_contents($file, $nom . PHP_EOL, FILE_APPEND);
        $nom_success = "Nom valide";
        $email = null;
    } else {
        $nom_error = "Nom invalide";
    }
}


if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'formulaire' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $email_success = "Adresse email valide";
        $email = null;
    } else {
        $email_error = "Adresse email invalide";
    }
}
?>

<?php require 'header.php'; ?>


    <h1>Contactez-moi</h1>

    <form action="contact-2.php" method="post">
        <label>Nom</label>
        <div class="form-group">
            <?php if ($nom_error): ?>
                <div class="text text-danger"><?= $nom_error ?></div>
            <?php endif ?>
            <?php if ($nom_success): ?>
                <div class="text text-success"><?= $nom_success ?></div>
            <?php endif ?>
            <input type="text" name="nom" placeholder="entrez votre nom" value="<?= htmlentities($nom) ?>">
        </div>

        <label>Adresse email</label>
        <div class="form-group">
            <?php if ($email_error): ?>
                <div class="text text-danger"><?= $email_error ?></div>
            <?php endif ?>
            <?php if ($email_success): ?>
                <div class="text text-success"><?= $email_success ?></div>
            <?php endif ?>
            <input type="email" name="email" placeholder="entrez votre adresse mail"
                   value="<?= htmlentities($email) ?>">
        </div>

        <form>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </form>

        <button type="submit" class="btn btn-secondary">Valider</button>
    </form>


<?php require 'footer.php';

/*
 *     <form  name="formulaire" method="post" action="contact-2.php">
    <div class="label">Civilité</div>
    <input type="radio" name="civilite" value="<?php if ($civilite == "M") echo "selected"; ?>"/>Mr</label>
    <input type="radio" name="civilite" value="<?php if ($civilite == "Mme") echo "selected"; ?>"/>Mme</label>
    <div class="label">Nom</div>
    <input type="text" placeholder="Nom" name="nom" value="<?=$_POST['nom']?>" />
    <div class="label">Prénom</div>
    <input type="text" placeholder="Prénom" name="prenom" value="<?=$_POST['prenom']?>"/>
    <div class="label">Email</div>
    <input type="text" placeholder="monadressemail@fournisseurmail.com" name="email" value="<?=$_POST['email']?>"/>
    <div class="label">Téléphone</div>
    <input type="text" placeholder="0X.XX.XX.XX.XX" name="telephone" value="<?=$_POST['telephone']?>"/>
    <div class="label">Message</div>
    <textarea name="message" placeholder="Précisez votre demande ici" value="<?=$_POST['textarea']?>" rows="5" cols="40"></textarea>
    <input type="submit" name="valider" value="Valider l'inscription"/>
    </form>

 */ ?>