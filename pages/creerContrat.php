<?php
    session_start();
    require_once("../src/fonctions.php");

	verificationType(array('gestionnaire'));

	$traitement = false;


	if (isset($_POST['assure'])) {
		$nomA = $_POST['assure'];
		$traitement = true;
	}

	if (isset($_GET['assure'])) {
		$nomA = $_GET['assure'];
		$traitement = true;
	}

	if ($traitement) {
		if ($fa = verificationFichier("../db/InfoAssure/".$nomA."/informations.csv", 'r')) {
			while ($data = fgetcsv($fa, 1000, ';')) {
				$nom = $data[0];
				$prenom = $data[1];
			}
			fclose($fa);
		}
	}

?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout contrat</title>

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
                        <h1 class="content-title">Ajout contrat d'assurance</h1>
                        <h1 class="content-subtitle"><?php if (isset($nomA)) { echo $nomA; }?></h1>
                    </div>
                </div>


                <form id="insured-selection" action="creerContrat.php" method="POST">

					<div class="form-title-container">
                        <h1 class="form-title">sélection de l'assuré</h1>
                    </div>

                    <div class="grid-form">

						<div class="input-container">

							<div class="select-container">

								<select class="select" name="assure">
									<?php 
										if ($fa = verificationFichier('../db/assure.csv', 'r')) {
											while ($data = fgetcsv($fa, 1000, ';')) {
												if ($data[5] == $_SESSION['assurance']) {
													echo "<option value=".$data[0].$data[1].">".$data[0]." ".$data[1]."</option>";
												}
											}
											fclose($fa);
										}
									?>

								</select>

							</div>

						</div>

						<div class="input-container">

							<button form="insured-selection" type="submit" class="button button--light">
								<p class="button-text">Choisir</p>
							</button>

						</div>

					</div>	

				</form>

				<form id="ajoutContrat" action="../src/enregistrerContrat.php" method="POST">

					<div class="form-title-container">
                        <h1 class="form-title">informations assuré</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="nom" class="form-label">nom</label>
                            <input type="text" name="nom" class="form-slim-input" placeholder="Nom" value="<?php if (isset($nom)) { echo($nom); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="prenom" class="form-label">prénom</label>
                            <input type="text" name="prenom" class="form-slim-input" placeholder="Prénom" value="<?php if (isset($prenom)) { echo($prenom); } ?>" required>
                        </div>
										
					</div>

					<div class="form-title-container">
                        <h1 class="form-title">informations assurance</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="numeroAssurance" class="form-label">numéro du contrat d'assurance</label>
                            <input type="text" name="numeroAssurance" class="form-slim-input" placeholder="Numéro du contrat d'assurance" required>
                        </div>

						<div class="input-container">
                            <label for="immatriculation" class="form-label">numéro d'immatriculation</label>
                            <input type="text" name="immatriculation" class="form-slim-input" placeholder="Numéro d'immatriculation" required>
                        </div>

						<div class="input-container">
                            <label for="dateValidite" class="form-label">date de validité</label>
                            <input type="date" name="dateValidite" class="form-slim-input" placeholder="Date de validité" required>
                        </div>

						<div class="input-container">
                            <label for="modele" class="form-label">Modèle du véhicule</label>
                            <input type="text" name="modele" class="form-slim-input" placeholder="Modèle du véhicule" required>
                        </div>


										
					</div>

					<div class="form-title-container">
                        <h1 class="form-title">type d'assurance</h1>
                    </div>

					<div class="grid-form">
						
						<div class="input-container">

							<div class="select-container">

								<select class="select" name="typeAssurance">
									<option value="tiers">Tiers</option>
									<option value="tiers plus">Tiers plus</option>
									<option value="tous risques">Tous risques</option>
									<option value="au kilometre">Au kilomètre</option>
								</select>

							</div>

						</div>

						<div class="input-container">
                            <label for="bonus" class="form-label">bonus</label>
                            <input type="number" name="bonus" min="0" max="50" step="5" class="form-slim-input" value="30" required>
                        </div>

						<div class="input-container">

							<div class="select-container">

								<select class="select" name="paiement">
									<option value="Mensuel">Mensuel</option>
									<option value="Trimestriel">Trimestriel</option>
									<option value="Annuel">Annuel</option>
								</select>

							</div>

						</div>
						
					</div>

					<div class="buttons-container">

						<button form="ajoutContrat" type="submit" class="button button--dark">
                            <p class="button-text">Ajouter le contrat d'assurance</p>
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