<?php
session_start();
require_once("../src/fonctions.php");
if (!file_exists("../db/InfoAssure/".$_SESSION['identifiants']."/changement")) {
        mkdir("../db/InfoAssure/".$_SESSION['identifiants']."/changement", 0777, true);
}

?>

<?php
$fa = fopen("../db/InfoAssure/".$_SESSION["identifiants"]."/informations.csv", 'r');
while ($data = fgetcsv($fa, 1000, ';')) {
    $pays = $data[7];
    $ville = $data[5];
    $cp = $data[6];
    $adresse = $data[4];
    $tel = $data[2];
    $email = $data[3];
}

fclose($fa);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement de coordonnées</title>

    <link rel="icon" href="../assets/svg/logo/icon.svg">

    <link href="../css/generics.css" rel="stylesheet">
    <link href="../css/boxes.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">

    <script type="text/javascript" src="test.js"></script>
</head>
<body>

<div class="main-container">

    <?php include("../layouts/navigation.php"); ?>

    <div class="container-1440">
        <div class="content-container content-column">

            <div class="content-banner">
                <div class="content-titles-container">
                    <h1 class="content-title">Changement de coordonnées</h1>
                </div>
            </div>

            <form id="changeCoordinates" action="../src/changementscoordonnees.php" class="form" method="POST" enctype="multipart/form-data">

                <div class="form-title-container">
                    <h1 class="form-title">vos coordonnées</h1>
                </div>

                <div class="grid-form">


                    <div class="input-container">
                        <label for="" class="form-label">addresse mail</label>
                        <input type="email" name="newEmail" class="form-large-input" placeholder="Adresse mail" value="<?php echo "$email"?>" required>
                    </div>

                    <div class="input-container">
                        <label for="" class="form-label">téléphone</label>
                        <input type="text" name="newTelephone" class="form-large-input" placeholder="Téléphone" value="<?php echo "$tel"?>" required>
                    </div>

                    <div class="input-container">
                        <label for="" class="form-label">adresse</label>
                        <input type="text" name="newAdresse" class="form-large-input" placeholder="Adresse" value="<?php echo "$adresse"?>" required>
                    </div>

                    <div class="input-container">
                        <label for="" class="form-label">ville</label>
                        <input type="text" name="newVille" class="form-large-input" placeholder="Ville" value="<?php echo "$ville"?>" required>
                    </div>

                    <div class="input-container">
                        <label for="" class="form-label">code postal</label>
                        <input type="text" name="newCP" class="form-large-input" placeholder="Code postal" value="<?php echo "$cp"?>" required>
                    </div>

                    <div class="input-container">
                        <label for="" class="form-label">pays</label>
                        <input type="text" name="newPays" class="form-large-input" placeholder="Pays" value="<?php echo "$pays"?>" required>
                    </div>

                </div>

                <div class="form-title-container">
                    <h1 class="form-title">justificatif de domicile</h1>
                </div>

                <div class="grid-form">

                    <div class="form-images-input-file-container">
                        <input class="form-images-input-file" id="photos-input" type="file" name="photo[]" required>
                        <label class="form-images-input-file-label" for="photos-input">Selectionner un justificatif de domicile</label>
                    </div>

                    <div class="input-container">

                        <div id="photos-choosen" class="photo-choosen-container">

                            <div class="photo-choosen">
                                <p id="no-photo" class="photo-choosen-text">pas de photos sélectionnées</p>
                            </div>

                        </div>

                    </div>

                    <div class="input-container">

                        <button type="button" class="button button--light" id="supprimer-photos">
                            <p class="button-text">Supprimer le fichier</p>
                        </button>

                    </div>

                </div>

                <div class="buttons-container">

                    <button form="changeCoordinates" type="submit" class="button button--dark">
                        <p class="button-text">Soumettre</p>
                        <img class="button-svg" src="../assets/svg/icons/back.svg" style="transform: rotate(180deg);">
                    </button>

                </div>

            </form>

        </div>
    </div>

    <?php include("../layouts/footer.php"); ?>

</div>

<script src="../assets/js/inputfiles.js"></script>

</body>
</html>