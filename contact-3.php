<?php
//-------- DEBUT LOGIQUE ---------
$message_success = null;
$message_form_empty = null;
$messageErreur = null;
$messageSuccess_fichier_joint = null;
$messageErreur_fichier_joint = null;
$uploaddir = '/var/www/html/public/MesProjetPHP/Test/storage/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

//tableau d'option pour chaque index du tableau $_POST
$options_filtres = [
    'nom' => [
        "filter" => FILTER_CALLBACK,
        "flags" => FILTER_FORCE_ARRAY,
        "options" => "ucwords"
    ],
    'prenom' => [
        "filter" => FILTER_CALLBACK,
        "flags" => FILTER_FORCE_ARRAY,
        "options" => "ucwords"
    ],
    'email' => FILTER_VALIDATE_EMAIL,

    'message' => [
        "filter" => FILTER_CALLBACK,
        "flags" => FILTER_FORCE_ARRAY,
        "options" => "ucwords"
    ],
];

//Stockage après filtrage des données du tableau $_POST avec filter_input_array()
$reponse_formulaire = filter_input_array(INPUT_POST, $options_filtres);

//Test des réponses du formulaire
if ($reponse_formulaire != null) { //Si le formulaire a bien été posté.
    $nbrErreurs = 0; // initialisation d'un compteur d'erreurs pour voir si le formulaire ne comporte pas d'erreurs
//On teste les différentes entrées par rapport aux filtres pour les valider ou non
    foreach ($options_filtres as $clef => $valeur) { //Parcourir tous les champs des filtres dans la variable $options_filtres.
        if (empty($_POST[$clef])) { //Si un champs est vide.
            $messageErreur .= 'Veuillez remplir le champ ' . $clef . '.<br/>';
            $nbrErreurs++; // on augmente le compteur d'erreur
        } elseif ($reponse_formulaire[$clef] === false) { //Si une saisie n'est pas valide.
            $messageErreur .= 'Le champ ' . $clef . ' n\'est pas valide <br/>';
            $nbrErreurs++;
        }
    }
    if (empty($_FILES['userfile'])){
        $messageErreur_fichier_joint = "Aucun fichier jointn";
    }
    if ($nbrErreurs == 0 && move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {//Si le formulaire ne comporte pas d'erreurs on affiche le msg ci-dessous
        $message_success = 'Bonjour ' . $reponse_formulaire['prenom'] . ' ' . $reponse_formulaire['nom'] . ' et merci pour votre message : "<em>' . $reponse_formulaire['message'] . '</em>". </br> Nous vous recontacterons dans les plus brefs délais à l\'adresse email ' . $reponse_formulaire['email'] . ' <br/> A bientôt. <br/> L\'équipe du site moncv.fr';
        //Envoyer les données filtrées dans un fichier texte "reponses formulaire"
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'formulaire' . DIRECTORY_SEPARATOR . reponse_formulaire . '.txt';
        file_put_contents($file, implode(PHP_EOL, $reponse_formulaire) . PHP_EOL);
        $messageSuccess_fichier_joint = "Merci d'avoir joint un fichier pour préciser votre demande.\n";
    }
} else {//SI le formulaire n'a pas été posté...
    $message_form_empty = "Vous devez compléter tous les champs du formulaire";
}
?>
<!--- FIN LOGIQUE --->

<?php require 'header.php'; ?>
<!-------------------------------------------------------------------------------------------- --->
<h1>Formulaire de contact</h1>
<!-------------------------------------------------------------------------------------------- --->
<!-- DEBUT FORMULAIRE -->
<form action="contact-3.php" method="post" class="form-group" enctype="multipart/form-data">
    <div class="label">Nom</div>
    <input type="text" name="nom" placeholder="entrez votre nom"
           value="<?= htmlentities($reponse_formulaire['nom']) ?>"/>
    <div class="label">Prénom</div>
    <input type="text" name="prenom" placeholder="entrez votre prénom"
           value="<?= htmlentities($reponse_formulaire['prenom']) ?>"/>
    <div class="label">Adresse email</div>
    <input type="email" name="email" placeholder="entrez votre adresse mail"
           value="<?= htmlentities($reponse_formulaire['email']) ?>"/>
    <div class="label">Message</div>
    <textarea name="message" placeholder="Précisez votre demande ici"
              value=" <?= htmlentities($reponse_formulaire['message']) ?> "
              rows="5"
              cols="40"></textarea></br>
    <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
    <input name="userfile" type="file"/>
    <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
    </br>
    </br>
    <button type="submit" class="btn btn-secondary">Valider la formulaire</button>
</form>
<!-- Ici sont affichés les messages concernant la validation du formulaire et les erreurs-->
<div class="text text-success"><?= $message_success ?></div>
<div class="text text-primary"><?= $message_form_empty ?></div>
<?php if ($messageErreur): ?>
    <div class="text text-danger"><?= $messageErreur ?></div><?php endif ?>
<div class="text text-success"><?= $messageSuccess_fichier_joint ?></div>
<div class="text text-danger"><?= $messageErreur_fichier_joint ?></div>
<hr>
<!-- FIN affichage messages erreurs  -->


<!--<h2>Contenu formulaire ici</h2>-->

<?php


/*
 *
 * echo 'Voici quelques informations de débogage :';
print_r($_FILES);


<pre>
    <?php var_dump($valeur) ?>
</pre>

 if ($reponse_formulaire['nom'] != false) {
        $nom_success = "Nom valide";
    } else {
        $nom_error = "Nom est vide";
    }
    if ($reponse_formulaire['prenom'] != false) {
        $prenom_success = "Prénom valide";
    } else {
        $prenom_error = "Prénom est vide";
    }
    if ($reponse_formulaire['email'] != false) {
        $email_success = "Adresse email valide";
    } else {
        $email_error = "Adresse email invalide";
    }
    if ($reponse_formulaire['textarea'] != false) {
        $textarea_success = "Adresse email valide";
    } else {
        $textarea_error = "Adresse email invalide";
    }*/

require 'footer.php'; ?>
