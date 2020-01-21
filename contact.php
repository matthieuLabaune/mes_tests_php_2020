<?php
require 'header.php';

@$civilite = ($_POST['civilite']);
@$nom = ($_POST['nom']);
$nom_error = null;
@$prenom = ($_POST['prenom']);
$prenom_error = null;
@$email = ($_POST['email']);
$email_error = null;
@$telephone = ($_POST['telephone']);
$telephone_error=null;
@$textarea = ($_POST['message']);
$textarea_error=null;
@$valider = ($_POST['valider']);
$message = null;
$message_longueur=null;
?>

<?php
if (isset($valider)) {
    if (empty($nom)) {
        $message .= '<div class="alert alert-danger">Nom laissé vide.</div>';
    }
}

if (isset($valider)) {
    if (empty($prenom)) {
        $message .=  '<div class="alert alert-danger">Prénom laissé vide.</div>';
    }
}

if (isset($valider)) {
    if (empty($email)) {
        $message .= '<div class="alert alert-danger">Email laissé vide.</div>';
    }
}

if (isset($valider)) {
    if (empty($telephone)) {
        $message .= '<div class="alert alert-danger">Téléphone laissé vide.</div>';
    }
}

if (isset($valider)) {
    if (empty($textarea)) {
        $message .= '<div class="alert alert-danger">Message laissé vide.</div>';
    }elseif (strlen($textarea) < 5 ){
        $message_longueur = '<div class="alert alert-danger">Message inférieur à 5 charactères.</div>';
    }
}
?>


    <?php echo $message ?>
    <?php echo $message_longueur ?>
    <form name="formulaire" method="post" action="contact.php">
        <div class="label">Civilité</div>
        <input type="radio" name="civilite" value="<?php if ($civilite == "M.") echo "selected"; ?>"/>Mr</label>
        <input type="radio" name="civilite" value="<?php if ($civilite == "Mme.") echo "selected"; ?>"/>Mme</label>
        <div class="label">Nom</div>
        <input type="text" name="nom" value="<?php echo $nom ?>"/>
        <div class="label">Prénom</div>
        <input type="text" name="prenom" value="<?php echo $prenom ?>"/>
        <div class="label">Email</div>
        <input type="text" name="email" value="<?php echo $email ?>"/>
        <div class="label">Téléphone</div>
        <input type="text" name="telephone" value="<?php echo $telephone ?>"/>
        <div class="label">Message</div>
        <textarea name="message" value="<?php echo $textarea ?>" rows="5" cols="40"></textarea>
        <input type="submit" name="valider" value="Valider l'inscription"/>
    </form>


<?php
/*$civilite = null;
$nom = null;
$nom_error = null;
$prenom = null;
$prenom_error = null;
$email = null;
$email_error = null;
$telephone = null;
$telephone_error = null;
$textarea = null;
$textarea_error = null;
$valider = null;
$message = null;
$message_longueur = null;

require 'header.php';
?>

<?php
if (isset($valider)) {
    if (empty($nom)) {
        $nom_error = '<div class="alert alert-danger">Nom laissé vide.</div>';
    } else {
        $nom = $_POST['nom'];
        $nom_error = '';
    }
}

if (isset($valider)) {
    if (empty($prenom)) {
        $prenom_error = '<div class="alert alert-danger">Prénom laissé vide.</div>';
    } else {
        $prenom = $_POST['prenom'];
        $prenom_error = '';
    }
}

if (isset($valider)) {
    if (empty($email)) {
        $email_error = '<div class="alert alert-danger">Email laissé vide.</div>';
    } else {
        $email = $_POST['email'];
        $email_error = '';
    }
}

if (isset($valider)) {
    if (empty($telephone)) {
        $telephone_error = '<div class="alert alert-danger">Téléphone laissé vide.</div>';
    } else {
        $telephone = $_POST['telephone'];
        $telephone_error = '';
    }
}

if (isset($valider)) {
    if (empty($textarea)) {
        $textarea_error = '<div class="alert alert-danger">Message laissé vide.</div>';
    } elseif (strlen($textarea) < 5) {
        $message_longueur = '<div class="alert alert-danger">Message inférieur à 5 charactères.</div>';
    } else {
        $textarea= $_POST['message'];
        $textarea_error='';

    }
}
?>


<body>
<?php echo $message ?>
<?php echo $message_longueur ?>
<form  name="formulaire" method="post" action="contact.php">
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
<h2>$_POST</h2>
<?php var_dump($_POST) ?>

<?php var_dump($nom); ?>
*/
?>

<?php require 'footer.php'; ?>

