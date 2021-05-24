<?php
    session_start();
    require_once("../src/fonctions.php");
?>

<!DOCTYPE html>
<html>
    <head>    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TITRE</title>
        <link rel="icon" type="image/png" href="../assets/svg/logo/logo_2.png">
        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
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

				<form id="changeCoordinates" class="form" action="" method="POST">

					<div class="form-title-container">
						<h1 class="form-title">vos coordonnées</h1>
					</div>

					<div class="grid-form">
						
						<div class="input-container">
							<label for="" class="form-label">addresse mail</label>
							<input type="email" name="" class="form-large-input" placeholder="Adresse mail" value="<?php ?>" required>
						</div>

						<div class="input-container">
							<label for="" class="form-label">téléphone</label>
							<input type="text" name="" class="form-large-input" placeholder="Téléphone" value="<?php ?>" required>
						</div>

						<div class="input-container">
							<label for="" class="form-label">adresse</label>
							<input type="text" name="" class="form-large-input" placeholder="Adresse" value="<?php ?>" required>
						</div>

						<div class="input-container">
							<label for="" class="form-label">ville</label>
							<input type="text" name="" class="form-large-input" placeholder="Ville" value="<?php ?>" required>
						</div>

						<div class="input-container">
							<label for="" class="form-label">code postal</label>
							<input type="text" name="" class="form-large-input" placeholder="Code postal" value="<?php ?>" required>
						</div>

						<div class="input-container">
							<label for="" class="form-label">pays</label>
							<input type="text" name="" class="form-large-input" placeholder="Pays" value="<?php ?>" required>
						</div>

					</div>

					<div class="form-title-container">
						<h1 class="form-title">justificatif de domicile</h1>
					</div>

					<div class="grid-form">

						<div>
							<div class="form-images-input-file-container">
								<input class="form-images-input-file" id="justificatif" type="file" name="">
								<label class="form-images-input-file-label" for="justificatif">Selectionner un justificatif de domicile</label>
							</div>
						</div>

						<div>
							<p class="file-return"></p>
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

</body>
</html>
