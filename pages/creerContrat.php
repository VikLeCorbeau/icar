<?php
    session_start();
    require_once("../src/fonctions.php");

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
				$nom = $data[2];
				$prenom = $data[3];
				$tel = $data[4];
				$email = $data[5];
				$rue = $data[6];
				$ville = $data[7];
				$cp = $data[8];
				$pays = $data[9];
				$numeroAssurance = $data[10];
				$assurance = $data[11];
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
        <title>TITRE</title>

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
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
									<option value="0">Selection de l'assuré :</option>

									<?php 
										if ($fa = verificationFichier('../db/assure.csv', 'r')) {
											while ($data = fgetcsv($fa, 1000, ';')) {
												echo "<option value=".$data[0].$data[1].">".$data[0]." ".$data[1]."</option>";
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

						<div class="input-container">
                            <label for="adresse" class="form-label">adresse</label>
                            <input type="text" name="adresse" class="form-slim-input" placeholder="Adresse" value="<?php if (isset($rue, $ville, $cp, $pays)) { echo "" . $rue. ", " .$ville. ", " .$cp. ", " .$pays.""; } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="tel" class="form-label">téléphone</label>
                            <input type="text" name="tel" class="form-slim-input" placeholder="Téléphone" value="<?php if (isset($tel)) { echo($tel); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="email" class="form-label">adresse mail</label>
                            <input type="email" name="email" class="form-slim-input" placeholder="Adresse mail" value="<?php if (isset($email)) { echo($email); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="nom" class="form-label">nom</label>
                            <input type="text" name="nom" class="form-slim-input" placeholder="Nom" value="<?php if (isset($nom)) { echo($nom); } ?>" required>
                        </div>
										
					</div>

					<div class="form-title-container">
                        <h1 class="form-title">informations assurance</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="nomAssurance" class="form-label">nom de l'assurance</label>
                            <input type="text" name="nomAssurance" class="form-slim-input" placeholder="Nom de l'assurance" value="<?php if (isset($assurance)) { echo($assurance); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="numeroAssurance" class="form-label">numéro du contrat d'assurance</label>
                            <input type="text" name="numeroAssurance" class="form-slim-input" placeholder="Numéro du contrat d'assurance" value="<?php if (isset($numeroAssurance)) { echo($numeroAssurance); } ?>" required>
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
									<option value="0">Sélection type d'assurance :</option>
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
									<option value="0">Sélection type de paiement :</option>
									<option value="tiers">Mensuel</option>
									<option value="tiers plus">Trimestriel</option>
									<option value="tous risques">Annuel</option>
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