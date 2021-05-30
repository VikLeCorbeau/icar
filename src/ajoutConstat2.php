<?php 
	
	session_start();

	require_once("fonctions.php");

	verificationType(array('assure'));

	if (isset($_POST['voitureA'])) {

		$voiture = $_POST['voitureA'];

        $string = htmlentities($voiture, null, 'utf-8');
        $voiture = str_replace("&nbsp;", " ", $string);
        $voiture = html_entity_decode($voiture);

		if ($fa = verificationFichier("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r')) {
			while ($data = fgetcsv($fa, 1000, ';')) {
				if ($data[9] == $voiture) {
					$nom = $data[0];
					$prenom = $data[1];
					$adresseLongue = $data[2];
					$tel = $data[3];
					$email = $data[4];
					$marque = $data[9];
					$immatriculation = $data[7];
					$assurance = $data[5];
					$numContrat = $data[6];
					$date = $data[8];

					$elementAdresse = explode(',', $adresseLongue);
			
					$adresse = $elementAdresse[0];
					$cp = $elementAdresse[2];
					$ville = $elementAdresse[1];
					$pays = $elementAdresse[3];
				}
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
        <title>Constat</title>

		<link rel="icon" href="../assets/svg/logo/icon.svg">

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
						<h1 class="content-title">Déclaration de constat</h1>
						<h1 class="content-subtitle">2 - Votre véhicule</h1>
					</div>

				</div>

				<form id="car-selection" action="ajoutConstat2.php" method="POST">

					<div class="form-title-container">
                        <h1 class="form-title">sélection du véhicule concerné</h1>
                    </div>

                    <div class="grid-form">

						<div class="input-container">

							<div class="select-container">

								<select class="select" name="voitureA">
									<option value="0">Selection du véhicule concerné:</option>

									<?php 
									echo ('../db/InfoAssure/'.$_SESSION['identifiants'].'/contrats.csv');

											if ($fa = verificationFichier('../db/InfoAssure/'.$_SESSION['identifiants'].'/contrats.csv', 'r')) {

												while ($data = fgetcsv($fa, 1000, ';')) {
													echo "<option value=".str_replace(" ","&nbsp;",$data[9]).">".$data[9]." ".$data[7]."</option>";
												}
												fclose($fa);

											}
									?>

								</select>

							</div>

						</div>

						<div class="input-container">

							<button form="car-selection" type="submit" class="button button--light">
								<p class="button-text">Choisir</p>
							</button>

						</div>

					</div>	

				</form>

				<form id="ajoutConstat2" action="enregistrerPartie2.php" method="POST">

					<div class="form-title-container">
                        <h1 class="form-title">information sur l'assuré</h1>
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
                            <label for="ville" class="form-label">ville</label>
                            <input type="text" name="ville" class="form-slim-input" placeholder="Ville" value="<?php if (isset($adresse)) { echo($adresse); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="cp" class="form-label">code postal</label>
                            <input type="text" name="cp" class="form-slim-input" placeholder="Code postal" value="<?php if (isset($ville)) { echo($ville); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="pays" class="form-label">pays</label>
                            <input type="text" name="pays" class="form-slim-input" placeholder="Pays" value="<?php if (isset($pays)) { echo($pays); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="tel" class="form-label">téléphone</label>
                            <input type="text" name="tel" class="form-slim-input" placeholder="Téléphone" value="<?php if (isset($tel)) { echo($tel); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="email" class="form-label">e-mail</label>
                            <input type="email" name="email" class="form-slim-input" placeholder="E-mail" value="<?php if (isset($email)) { echo($email); } ?>" required>
                        </div>
						
					</div>

					<div class="form-title-container">
                        <h1 class="form-title">information sur le véhicule</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="marque" class="form-label">marque, type</label>
                            <input type="text" name="marque" class="form-slim-input" placeholder="Marque, type" value="<?php if (isset($marque)) { echo($marque); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="immatriculation" class="form-label">numéro d'immatriculation</label>
                            <input type="text" name="immatriculation" class="form-slim-input" placeholder="Numéro d'immatriculation" value="<?php if (isset($immatriculation)) { echo($immatriculation); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="paysImm" class="form-label">pays d'immatriculation</label>
                            <input type="text" name="paysImm" class="form-slim-input" placeholder="Pays d'immatriculation" required>
                        </div>

					</div>

					<div class="form-title-container">
                        <h1 class="form-title">information sur la remorque</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <p class="radio-title">possédez-vous une remorque ?</p>
                            <div class="input-radio-container">
                                <label for="remorque" class="radio-container">
                                    <input type="radio" name="remorque" value="oui" class="input-radio" id="radio-show-yes" checked>
                                    <p class="input-radio-text">Oui</p>
                                </label>
                                <label for="remorque" class="radio-container">
                                    <input type="radio" name="remorque" value="non" class="input-radio" id="radio-show-no">
                                    <p class="input-radio-text">Non</p>
                                </label>
                            </div>
                        </div>

						<div class="input-container" id="radio-show-input">
                            <label for="immatriculationR" class="form-label">numéro d'immatriculation</label>
                            <input type="text" name="immatriculationR" class="form-slim-input" placeholder="Numéro d'immatriculation" value="<?php if (isset($immatriculation)) { echo($immatriculation); } ?>">
                        </div>

						<div class="input-container" id="radio-show-input">
                            <label for="paysImmR" class="form-label">pays d'immatriculation</label>
                            <input type="text" name="paysImmR" class="form-slim-input" placeholder="Pays d'immatriculation">
                        </div>

					</div>

					<div class="form-title-container">
                        <h1 class="form-title">information sur la société d'assurance</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="assurance" class="form-label">nom de l'assurance</label>
                            <input type="text" name="assurance" class="form-slim-input" placeholder="Nom de l'assurance" value="<?php if (isset($assurance)) { echo($assurance); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="numContrat" class="form-label">numéro de contrat</label>
                            <input type="text" name="numContrat" class="form-slim-input" placeholder="Numéro de contrat" value="<?php if (isset($numContrat)) { echo($numContrat); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="numCV" class="form-label">numéro de carte verte</label>
                            <input type="text" name="numCV" class="form-slim-input" placeholder="Numéro de carte verte" required>
                        </div>

						<div class="input-container">
                            <label for="dateValidite" class="form-label">date de validité</label>
                            <input type="date" name="dateValidite" class="form-slim-input" placeholder="Date de validité" value="<?php if (isset($date)) { echo($date); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="agence" class="form-label">agence (ou bureau, ou courtier)</label>
                            <input type="text" name="agence" class="form-slim-input" placeholder="Agence (ou bureau, ou courtier)" required>
                        </div>

						<div class="input-container">
                            <p class="radio-title">Les dégats matériels au véhicule sont-ils assurés par le contrat ?</p>
                            <div class="input-radio-container">
                                <label for="degat" class="radio-container">
                                    <input type="radio" name="degat" value="oui" class="input-radio" checked>
                                    <p class="input-radio-text">Oui</p>
                                </label>
                                <label for="degat" class="radio-container">
                                    <input type="radio" name="degat" value="non" class="input-radio">
                                    <p class="input-radio-text">Non</p>
                                </label>
                            </div>
                        </div>

					</div>

					<div class="form-title-container">
                        <h1 class="form-title">conducteur</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="nomC" class="form-label">nom</label>
                            <input type="text" name="nomC" class="form-slim-input" placeholder="Nom" value="<?php if (isset($nom)) { echo($nom); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="prenomC" class="form-label">prénom</label>
                            <input type="text" name="prenomC" class="form-slim-input" placeholder="Prénom" value="<?php if (isset($prenom)) { echo($prenom); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="adresseC" class="form-label">adresse</label>
                            <input type="text" name="adresseC" class="form-slim-input" placeholder="Adresse" value="<?php if (isset($adresse)) { echo($adresse); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="cpC" class="form-label">code postal</label>
                            <input type="text" name="cpC" class="form-slim-input" placeholder="Code postal" value="<?php if (isset($cp)) { echo($cp); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="paysC" class="form-label">pays</label>
                            <input type="text" name="paysC" class="form-slim-input" placeholder="Pays" value="<?php if (isset($pays)) { echo($pays); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="telC" class="form-label">téléphone</label>
                            <input type="text" name="telC" class="form-slim-input" placeholder="Téléphone" value="<?php if (isset($tel)) { echo($tel); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="emailC" class="form-label">e-mail</label>
                            <input type="email" name="emailC" class="form-slim-input" placeholder="E-mail" value="<?php if (isset($email)) { echo($email); } ?>" required>
                        </div>

						<div class="input-container">
                            <label for="numPermis" class="form-label">numéro du permis de conduire</label>
                            <input type="text" name="numPermis" class="form-slim-input" placeholder="Numéro du permis de conduire" required>
                        </div>

						<div class="input-container">
                            <label for="categorie" class="form-label">catégorie du véhicule</label>
                            <input type="text" name="categorie" class="form-slim-input" placeholder="Catégorie du véhicule" required>
                        </div>
						
						<div class="input-container">
                            <label for="datePermis" class="form-label">permis valable jusqu'au</label>
                            <input type="date" name="datePermis" class="form-slim-input" required>
                        </div>
						
					</div>	

					<div class="form-title-container">
                        <h1 class="form-title">circonstances</h1>
                    </div>
					
					<div class="radio-grid-container">

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" checked>
							<p class="radio-grid-text">En stationnement/à l'arrêt</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Prenait un stationnement">
							<p class="radio-grid-text">Prenait un stationnement</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Sortait d'un parking, d'un lieu privé, d'un chemin de terre">
							<p class="radio-grid-text">Sortait d'un parking, d'un lieu privé, d'un chemin de terre</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="S'engageait dans un parking, un lieu privé, un chemin de terre">
							<p class="radio-grid-text">S'engageait dans un parking, un lieu privé, un chemin de terre</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="S'engageait sur une place à sens giratoire">
							<p class="radio-grid-text">S'engageait sur une place à sens giratoire</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Roulait sur une place à sens giratoire">
							<p class="radio-grid-text">Roulait sur une place à sens giratoire</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Heurtait à l'arrière, en roulant dans le même sens et sur une même file">
							<p class="radio-grid-text">Heurtait à l'arrière, en roulant dans le même sens et sur une même file</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Roulait dans le même sens et sur une file différente">
							<p class="radio-grid-text">Roulait dans le même sens et sur une file différente</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Changeait de file">
							<p class="radio-grid-text">Changeait de file</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Doublait">
							<p class="radio-grid-text">Doublait</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Virait à droite">
							<p class="radio-grid-text">Virait à droite</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Reculait">
							<p class="radio-grid-text">Reculait</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Empiétait sur une voir réservée à la circulation en sens inverse">
							<p class="radio-grid-text">Empiétait sur une voir réservée à la circulation en sens inverse</p>
						</label>

						<label for="circonstance" class="radio-grid-label">
							<input type="radio" name="circonstance" class="radio-grid-input" value="Venait de droite(dans un carrefour)">
							<p class="radio-grid-text">Venait de droite(dans un carrefour)</p>
						</label>

					</div>

					<div class="form-title-container">
                        <h1 class="form-title">observations</h1>
                    </div>

					<div class="grid-form" style="grid-template-columns: repeat(2, 1fr);">

						<div class="input-container">
							<label for="degatsObservation" class="form-label">dégats apparents sur votre véhicule</label>
							<textarea name="degatsObservation" class="form-textarea" placeholder="Dégats apparents sur votre véhicule ..." required></textarea>
						</div>

						<div class="input-container">
							<label for="observation" class="form-label">mes observations</label>
							<textarea name="observation" class="form-textarea" placeholder="Mes observations ..." required></textarea>
						</div>

					</div>

					<div class="buttons-container">
						
						<button form="ajoutConstat2" type="submit" class="button button--yellow">
                            <p class="button-text">Continuer</p>
                            <img class="button-svg" src="../assets/svg/icons/back.svg" style="transform: rotate(180deg);">
                        </button>

                    </div>

				</form>

			</div>
		</div>

		<?php include "../layouts/footer.php"; ?>

	</div>

	<script src="../assets/js/radio.js"></script>
	 
 </body>
 </html>