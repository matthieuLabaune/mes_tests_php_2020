<?php
$civilite = $_POST["civilite"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$textarea = $_POST["message"];
$valider = $_POST["valider"];


if (isset($valider)) {
    if (empty($nom))
        $message = '<div class="alert alert-danger">Nom laissé vide.</div>';
    elseif (empty($prenom))
        $message = '<div class="alert alert-danger">Prénom laissé vide.</div>';
    elseif
    (empty($email))
        $message = '<div class="alert alert-danger">Email laissé vide.</div>';
    elseif
    (empty($telephone))
        $message = '<div class="alert alert-danger">Téléphone laissé vide.</div>';
    elseif
    (empty($textarea))
        $message = '<div class="alert alert-danger">Téléphone laissé vide.</div>';
} else {
    $message = '<div class="alert alert-success">Le formulaire est validé !</div>';
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Formulaire web</title>
</head>
<body>
<?php echo $message ?>
<form name="formulaire" method="post" action="Test-formulaire-2.php">
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
</body>
</html>