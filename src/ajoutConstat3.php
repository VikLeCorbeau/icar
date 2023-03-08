<?php 
	session_start();
	require_once("fonctions.php");

	verificationType(array('assure'));
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
						<h1 class="content-subtitle">3 - Véhicule tiers</h1>
					</div>

				</div>

				<form id="ajoutConstat3" action="enregistrerPartie3.php" method="POST">

					<div class="form-title-container">
                        <h1 class="form-title">information sur l'assuré</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="nom" class="form-label">nom</label>
                            <input type="text" name="nom" class="form-slim-input" placeholder="Nom" required>
                        </div>

						<div class="input-container">
                            <label for="prenom" class="form-label">prénom</label>
                            <input type="text" name="prenom" class="form-slim-input" placeholder="Prénom" required>
                        </div>

						<div class="input-container">
                            <label for="ville" class="form-label">ville</label>
                            <input type="text" name="ville" class="form-slim-input" placeholder="Ville" required>
                        </div>

						<div class="input-container">
                            <label for="cp" class="form-label">code postal</label>
                            <input type="text" name="cp" class="form-slim-input" placeholder="Code postal" required>
                        </div>

						<div class="input-container">
                            <label for="pays" class="form-label">pays</label>
                            <input type="text" name="pays" class="form-slim-input" placeholder="Pays" required>
                        </div>

						<div class="input-container">
                            <label for="tel" class="form-label">téléphone</label>
                            <input type="text" name="tel" class="form-slim-input" placeholder="Téléphone" required>
                        </div>

						<div class="input-container">
                            <label for="email" class="form-label">e-mail</label>
                            <input type="email" name="email" class="form-slim-input" placeholder="E-mail" required>
                        </div>
						
					</div>

					<div class="form-title-container">
                        <h1 class="form-title">information sur le véhicule</h1>
                    </div>

					<div class="grid-form">

						<div class="input-container">
                            <label for="marque" class="form-label">marque, type</label>
                            <input type="text" name="marque" class="form-slim-input" placeholder="Marque, type" required>
                        </div>

						<div class="input-container">
                            <label for="immatriculation" class="form-label">numéro d'immatriculation</label>
                            <input type="text" name="immatriculation" class="form-slim-input" placeholder="Numéro d'immatriculation" required>
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
                            <input type="text" name="immatriculationR" class="form-slim-input" placeholder="Numéro d'immatriculation">
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
                            <input type="text" name="assurance" class="form-slim-input" placeholder="Nom de l'assurance" required>
                        </div>

						<div class="input-container">
                            <label for="numContrat" class="form-label">numéro de contrat</label>
                            <input type="text" name="numContrat" class="form-slim-input" placeholder="Numéro de contrat" required>
                        </div>

						<div class="input-container">
                            <label for="numCV" class="form-label">numéro de carte verte</label>
                            <input type="text" name="numCV" class="form-slim-input" placeholder="Numéro de carte verte" required>
                        </div>

						<div class="input-container">
                            <label for="dateValidite" class="form-label">date de validité</label>
                            <input type="date" name="dateValidite" class="form-slim-input" placeholder="Date de validité" required>
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
                            <input type="text" name="nomC" class="form-slim-input" placeholder="Nom"required>
                        </div>

						<div class="input-container">
                            <label for="prenomC" class="form-label">prénom</label>
                            <input type="text" name="prenomC" class="form-slim-input" placeholder="Prénom" required>
                        </div>

						<div class="input-container">
                            <label for="adresseC" class="form-label">adresse</label>
                            <input type="text" name="adresseC" class="form-slim-input" placeholder="Adresse" required>
                        </div>

						<div class="input-container">
                            <label for="cpC" class="form-label">code postal</label>
                            <input type="text" name="cpC" class="form-slim-input" placeholder="Code postal" required>
                        </div>

						<div class="input-container">
                            <label for="paysC" class="form-label">pays</label>
                            <input type="text" name="paysC" class="form-slim-input" placeholder="Pays" required>
                        </div>

						<div class="input-container">
                            <label for="telC" class="form-label">téléphone</label>
                            <input type="text" name="telC" class="form-slim-input" placeholder="Téléphone" required>
                        </div>

						<div class="input-container">
                            <label for="emailC" class="form-label">e-mail</label>
                            <input type="email" name="emailC" class="form-slim-input" placeholder="E-mail" required>
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
							<label for="degatsObservation" class="form-label">dégats apparents sur le véhicule tiers</label>
							<textarea name="degatsObservation" class="form-textarea" placeholder="Dégats apparents sur le véhicule tiers ..." required></textarea>
						</div>

						<div class="input-container">
							<label for="observation" class="form-label">ses observations</label>
							<textarea name="observation" class="form-textarea" placeholder="Ses observations ..." required></textarea>
						</div>

					</div>

					<div class="buttons-container">

						<button form="ajoutConstat3" type="submit" class="button button--yellow">
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