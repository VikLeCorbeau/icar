<?php
    session_start();
    require_once("../src/fonctions.php");

    verificationType(array('admin'));
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout gestionnaire</title>

    <link rel="icon" href="../assets/svg/logo/icon.svg">

    <link href="../css/generics.css" rel="stylesheet">
    <link href="../css/boxes.css" rel="stylesheet">
    <link href="../css/form.css" rel="stylesheet">

</head>
<body>

<div class="main-container">

    <?php include("../layouts/navigation.php"); ?>

    <div class="container-1440">
        <div class="content-container content-column">

            <div class="content-banner">
                <div class="content-titles-container">
                    <h1 class="content-title">Ajout de gestionnaire</h1>
                </div>
            </div>


            <form id="ajoutGestionnaire" class="form" action="../src/enregistrerGestionnaire.php" method="POST">

                <div class="form-title-container">
                    <h1 class="form-title">informations sur le nouveau gestionnaire</h1>
                </div>

                <div class="grid-form">

                    <div class="input-container">
                        <label for="identifiant" class="form-label">identifiant</label>
                        <input type="text" name="identifiant" class="form-large-input" placeholder="Identifiant" required>
                    </div>

                    <div class="input-container">
                        <label for="mdp" class="form-label">mot de passe</label>
                        <input type="password" name="mdp" class="form-large-input" placeholder="Mot de passe" required>
                    </div>

                    <div class="input-container">

                        <div class="select-container">
                            <label class="form-label" for="assurance">selectionnez l'assurance</label>
                            <select class="select select-with-label" name="assurance">

                                <?php
                                if ($fichierAssurance = verificationFichier('../db/assurance.csv', 'r')) {
                                    while ($assurance = fgetcsv($fichierAssurance, 1000)) {
                                        echo "<option value= ".str_replace(" ","&nbsp;",$assurance[0]).">".str_replace(" ","&nbsp;",$assurance[0]) ."</option>";
                                    }
                                    fclose($fichierAssurance);
                                }
                                ?>

                            </select>

                        </div>

                    </div>

                </div>

            </form>

            <div class="buttons-container">

                <button form="ajoutGestionnaire" type="submit" class="button button--yellow">
                    <p class="button-text">Créer le gestionnaire</p>
                </button>

            </div>


        </div>
    </div>

    <?php include("../layouts/footer.php"); ?>

</div>

</body>
</html>
