<?php
    session_start();
    require_once("../src/fonctions.php");

	verificationType(array('assure'));

	if (isset($_GET['imm'])) {
		$immatriculation = $_GET['imm'];
	}
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cession véhicule</title>

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
                        <h1 class="content-title">Certificat de cession d'un véhicule d'occasion</h1>
                        <h1 class="content-subtitle">3 - Nouveau propriétaire</h1>
                    </div>
                </div>

                <?php  
                	echo "<form id='cession2' class='form' action='../src/enregistrerCession3.php?imm=".$_GET['imm']."' method='POST'>";
                ?>

					<div class="form-title-container">
						<h1 class="form-title">informations sur le nouveau propriétaire</h1>
					</div>

					<div class="grid-form">

						<div class="input-container">
							<p class="radio-title">personne physique/morale</p>
							<div class="input-radio-container">
								<label for="personne" class="radio-container">
									<input type="radio" name="personne" value="morale" class="input-radio">
									<p class="input-radio-text">Morale</p>
								</label>
								<label for="personne" class="radio-container">
									<input type="radio" name="personne" value="physique" class="input-radio" checked>
									<p class="input-radio-text">Physique</p>
								</label>
							</div>
						</div>

						<div class="input-container">
							<p class="radio-title">sexe</p>
							<div class="input-radio-container">
								<label for="sexe" class="radio-container">
									<input type="radio" name="sexe" value="male" class="input-radio" checked>
									<p class="input-radio-text">Mâle</p>
								</label>
								<label for="sexe" class="radio-container">
									<input type="radio" name="sexe" value="femelle" class="input-radio">
									<p class="input-radio-text">Femelle</p>
								</label>
								<label for="sexe" class="radio-container">
									<input type="radio" name="sexe" value="non-binaire" class="input-radio">
									<p class="input-radio-text">Non-binaire</p>
								</label>
							</div>
						</div>

					</div>

					<div class="grid-form">
			
						<div class="input-container">
							<label for="nom" class="form-label">nom</label>
							<input type="text" name="nom" class="form-slim-input" placeholder="Nom" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="prenom" class="form-label">prénom</label>
							<input type="text" name="prenom" class="form-slim-input" placeholder="Prénom" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="dateNaissance" class="form-label">date de naissance</label>
							<input type="date" name="dateNaissance" class="form-slim-input" placeholder="Date de naissance" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="lieuNaissance" class="form-label">lieu de naissance</label>
							<input type="text" name="lieuNaissance" class="form-slim-input" placeholder="Lieu de naissance" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="adresse" class="form-label">adresse</label>
							<input type="text" name="adresse" class="form-slim-input" placeholder="Adresse" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="ville" class="form-label">ville</label>
							<input type="text" name="ville" class="form-slim-input" placeholder="Ville" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="cp" class="form-label">code postal</label>
							<input type="text" name="cp" class="form-slim-input" placeholder="Code Postal" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="pays" class="form-label">pays</label>
							<input type="text" name="pays" class="form-slim-input" placeholder="Pays" value="<?php  ?>" required>
						</div>

					</div>

					<div class="form-title-container">
						<h1 class="form-title">certifications</h1>
					</div>

					<div class="grid-form">

						<div class="input-container span-3">
							<p class="radio-title">je certifie</p>
							<div class="input-radio-container" style="flex-direction: column; align-items: flex-start;">
								<label for="certification" class="radio-container radio-mt10">
									<input type="radio" name="certification" value="vendre" class="input-radio">
									<p class="input-radio-text">Acquérir le véhicule désigné ci-dessus aux dates et heures indiquées par l’ancien propriétaire.</p>
								</label>
								<label for="certification" class="radio-container radio-mt10">
									<input type="radio" name="certification" value="detruire" class="input-radio">
									<p class="input-radio-text">Avoir été informé de la situation administrative du véhicule.</p>
								</label>
							</div>
						</div>

						<div class="input-container">
							<label for="lieuSignature" class="form-label">fait à</label>
							<input type="text" name="lieuSignature" class="form-slim-input" placeholder="Fait à" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<label for="dateSignature" class="form-label">le</label>
							<input type="date" name="dateSignature" class="form-slim-input" placeholder="Le" value="<?php  ?>" required>
						</div>

						<div class="input-container">
							<p class="radio-title">je signe numériquement</p>
							<div class="input-radio-container">
								<label for="signature" class="radio-container">
									<input type="radio" name="signature" value="signature" class="input-radio">
									<p class="input-radio-text">Je signe numériquement</p>
								</label>
							</div>
						</div>

					</div>

					<div class="buttons-container">

						<button form="cession2" type="submit" class="button button--yellow">
                            <p class="button-text">Continuer</p>
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