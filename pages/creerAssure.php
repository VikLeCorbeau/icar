<?php
    session_start();
    require_once("../src/fonctions.php");

    verificationType(array('gestionnaire'));

?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout Assuré</title>

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
                        <h1 class="content-title">Ouverture compte assuré</h1>
                    </div>
                </div>


                <form id="ajoutAssure" action="../src/ajoutAssure.php" method="POST">

					<div class="form-title-container">
                        <h1 class="form-title">information sur l'assuré</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="nom" class="form-label">nom</label>
                            <input type="text" name="nom" class="form-large-input" placeholder="Nom" required>
                        </div>

						<div class="input-container">
                            <label for="prenom" class="form-label">prénom</label>
                            <input type="text" name="prenom" class="form-large-input" placeholder="Prénom" required>
                        </div>

						<div class="input-container">
                            <label for="telephone" class="form-label">numéro de téléphone</label>
                            <input type="text" name="telephone" class="form-large-input" placeholder="Numéro de téléphone" required>
                        </div>

						<div class="input-container">
                            <label for="email" class="form-label">email</label>
                            <input type="email" name="email" class="form-large-input" placeholder="Email" required>
                        </div>

						<div class="input-container">
                            <label for="adresse" class="form-label">adresse</label>
                            <input type="text" name="adresse" class="form-large-input" placeholder="Adresse" required>
                        </div>

						<div class="input-container">
                            <label for="ville" class="form-label">ville</label>
                            <input type="text" name="ville" class="form-large-input" placeholder="Ville" required>
                        </div>

						<div class="input-container">
                            <label for="CP" class="form-label">code postal</label>
                            <input type="text" name="CP" class="form-large-input" placeholder="Code postal" required>
                        </div>

						<div class="input-container">
                            <label for="pays" class="form-label">pays</label>
                            <input type="text" name="pays" class="form-large-input" placeholder="Pays" required>
                        </div>

					</div>

					<div class="form-title-container">
                        <h1 class="form-title">information sur l'assurance</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="contrat" class="form-label">numéro de contrat</label>
                            <input type="text" name="contrat" class="form-large-input" placeholder="Numéro de contrat" required>
                        </div>

					</div>

					<div class="buttons-container">

						<button form="ajoutAssure" type="submit" class="button button--yellow">
                            <p class="button-text">Ajouter l'assuré</p>
                            <img class="button-svg" src="../assets/svg/icons/back.svg" style="transform: rotate(180deg);">
                        </button>

                    </div>

				</form>	


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>