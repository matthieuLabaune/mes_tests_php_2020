<?php
$valider = $_POST['valider'];
$civilite = $_POST['civilite'];
$nom = $_POST['nom'];;
$prenom = $_POST['prenom'];;
$email = $_POST['email'];;
$telephone = $_POST['telephone'];;
$textearea = $_POST['textearea'];;
$formulaire_error = null;

if (isset($valider)) {
    if (empty($nom)) {
        $formulaire_error = 'Ce champs est vide !';
    } else {
        $formulaire_error = '';
    }

    if (empty($prenom)) {
        $formulaire_error = 'Ce champs est vide !';
    } else {
        $formulaire_error = '';
    }

    if (empty($email)) {
        $formulaire_error = 'Ce champs est vide !';
    } else {
        $formulaire_error = '';
    }

    if (empty($telephone)) {
        $formulaire_error = 'Ce champs est vide !';
    } else {
        $formulaire_error = '';
    }

    if (empty($textearea)) {
        $formulaire_error = 'Ce champs est vide !';
    } else {
        $formulaire_error = '';
    }

}


/*Ici les attributs de la page -> titre/mot-clefs/description */
$page = [
    "titre" => "Contact",
    "keywords" => "contact, mail, téléphone, etc",
    "description" => "Page de contact",
];
?>

<main>
    <div class="container mt-5">
        <h1>Me Contacter</h1>

        <form action="test-formulaire-1.php" method="post">
            Civilité
            <label><input type="radio" name="civilite" value="Mr"/> Mr </label>
            <label> <input type="radio" name="civilite" value="Mme"/>Mme</label><br/>
            <label>Nom <input type="text" name="nom" value="<?php echo $nom ?>"/><?= $formulaire_error ?><br/>
                <label>Prénom <input type="text" name="prenom" value="<?php echo $prenom ?> "/><?= $formulaire_error ?>
                </label><br/>
                <label>Adresse mail <input type="text" name="email"
                                           value="<?php echo $email ?>"/><?= $formulaire_error ?></label><br/>
                <label>Téléphone <input type="text" name="telephone"
                                        value="<?php echo $telephone ?>"/><?= $formulaire_error ?></label><br/>
                <label for="projet"><span>Vous désirez me proposer</span></label><br/>
                <select id="projet" name="projet">
                    <option value="Une opportunité d\'emploi">Une opportunité d\'emploi</option>
                    <option value="Une collaboration sur un projet">Une collaboration sur un projet</option>
                    <option value="Autre chose">Autre chose</option>
                </select>
                </p>
                <label Message : </label><textarea name="message" rows="5" cols="40"></textarea> <br/>
            <input type="submit" value="valider" name="valider"/>

            </section>
        </form>


        ​
    </div>
</main>
