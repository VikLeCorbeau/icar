<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Constat</title>

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">	
 </head>
 <body>

	<div class="main-container">

		<div class="nav-container">
			<div class="nav-container-1440">

				<div class="nav-logo-container">
					<svg aria-hidden="true" class="logo">
						<use xlink:href="../assets/svg/logo/logo.svg#logo"></use>
					</svg>
				</div>

				<div class="nav-right-container">

					<div class="nav-side-container">

						<div class="nav-side-links-container">

							<div class="nav-side-link-container">

								<div class="nav-side-link">
									<p class="nav-side-svg-text">Actions</p>
									<img src="../assets/svg/icons/down_arrow.svg" class="nav-side-arrow">
								</div>

								<div class="nav-side-link-dropdown-container">
									<ul class="nav-side-link-dropdown-ul">
										<li class="nav-side-link-dropdown-li"><a href="">Déclarer un constat</a></li>
										<li class="nav-side-link-dropdown-li"><a href="">Voir mes cartes vertes</a></li>
										<li class="nav-side-link-dropdown-li"><a href="">Je vends mon véhicule</a></li>
										<li class="nav-side-link-dropdown-li"><a href="">Contacter mon assurance</a></li>
										<li class="nav-side-link-dropdown-li"><a href="">Mes déclarations de constat</a></li>
									</ul> 
								</div>

							</div>

							<div class="nav-side-link-container">

								<div class="nav-side-link">
									<svg aria-hidden="true" class="nav-side-svg">
										<use xlink:href="../assets/svg/type/type.svg#type_insured"></use>
									</svg>
									<p class="nav-side-svg-text">Prénom Nom</p>

								</div>

								<div class="nav-side-link-dropdown-container">
									<ul class="nav-side-link-dropdown-ul">
										<li class="nav-side-link-dropdown-li"><a href="">Changer mes coordonnées</a></li>
										<li class="nav-side-link-dropdown-li"><a href="">Déconnexion</a></li>
									</ul> 
								</div>

							</div>

						</div>
						
					</div>
				</div>

			</div>
		</div>
		
		<div class="container-1440">
			<div class="content-container content-column">

				<div class="content-banner">
						
					<div class="content-titles-container">
						<h1 class="content-title">Déclaration de constat</h1>
						<h1 class="content-subtitle">2-Votre véhicule</h1>
					</div>

				</div>
				

				<form id="car-selection" action="ajoutConstat2.php" method="POST">

					<div class="form-title-container">
                        <h1 class="form-title">Sélection du véhicule concerné</h1>
                    </div>

                    <div class="grid-form">

						<div class="input-container">

							<div class="custom-select">

								<select name="voitureA">
									<option value="0">Select car:</option>
									<option value="1">Audi</option>
									<option value="2">BMW</option>
									<option value="3">Citroen</option>
									<option value="4">Ford</option>
									<option value="5">Honda</option>
									<option value="6">Jaguar</option>
									<option value="7">Land Rover</option>
									<option value="8">Mercedes</option>
									<option value="9">Mini</option>
									<option value="10">Nissan</option>
									<option value="11">Toyota</option>
									<option value="12">Volvo</option>

									<?php 
										/*if ($fa = fopen('../db/InfoAssure/'.$_SESSION['identifiants'].'/contrats.csv', 'r')) {
											while ($data = fgetcsv($fa, 1000, ';')) {
												echo "<option value=".$data[9].">".$data[9]." ".$data[7]."</option>";
											}
											fclose($fa);
										}*/
									?>

								</select>

							</div>

						</div>

						<div class="input-container">

							<button form="car-selection" type="submit" class="button button--yellow">
								<p class="button-text">Choisir</p>
							</button>

						</div>

					</div>	

				</form>

			</div>
		</div>

		<footer>
			<div class="footer-center">
				<div class="footer-box">
					<h1 class="footer-title">contact</h1>
					<h2 class="footer-text">05 67 34 56 78 - icar@contact.fr</h2>
				</div>
				<div class="footer-box">
						<h1 class="footer-title">support</h1>
					<h2 class="footer-text"><a href="#">Signaler une erreur aux adminstrateurs</a></h2>
				</div>
			</div>
		</footer>

	</div>

 	
 	<?php 
 		if (isset($_POST['voitureA'])) {
 			$voiture = $_POST['voitureA'];
 		}
		/*$fa = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r');
 		if ($fa) {
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
				}
			}
			fclose($fa);
			
			$elementAdresse = explode(',', $adresseLongue);
			$adresse = $elementAdresse[0];
			$cp = $elementAdresse[2];
			$ville = $elementAdresse[1];
			$pays = $elementAdresse[3];
		}*/
 	 ?>
 	<h1>Déclaration de constat</h1>
 	<h2>3- Véhicule tiers</h2>
 	<form action="enregistrerPartie2.php" method="POST">
 		<p>Nom <input type="text" name="nom" required></p>
 		<p>Prénom <input type="text" name="prenom" required></p>
 		<p>Adresse <input type="text" name="adresse" required></p>
 		<p>Code Postal <input type="text" name="code postal" required></p>
 		<p>Pays <input type="text" name="pays" required></p>
 		<p>Télephone <input type="text" name="telephone" required></p>
 		<p>E-mail <input type="text" name="mail" required></p>
		
		<h1>Informations sur le véhicule</h1>
 		<p>Marque, Type <input type="text" name="marque" required></p>
 		<p>Numéro d'immatriculation <input type="text" name="numero immatriculation" required></p>
 		<p>Pays d'immatriculation <input type="text" name="Pays immatriculation" required></p>
		 
		<h2>Informations sur la remorque</h2>
 		<p>
		Possédez-vous une remorque <input type="radio" id="oui" name="drone" value="oui">
  		<label for="oui">Oui</label>
		<input type="radio" id="non" name="drone" value="non">
  		<label for="non">Non</label>
		</p>
 		<p>Numéro d'immatriculation <input type="text" name="numero immatriculation" required></p>
 		<p>Pays d'immatriculation <input type="text" name="Pays immatriculation" required></p>

		<h3>Informationsur la société d'assurance</h3>
 		<p>Nom <input type="text" name="nom" required></p>
 		<p>Numéro de contrat <input type="text" name="numero immatriculation" required></p>
 		<p>Numéro de carte verte <input type="text" name="numero immatriculation" required></p>
 		<p>Valable du <input type="text" name="numero immatriculation" required></p>
 		<p>Jusqu'au <input type="text" name="numero immatriculation" required></p>
 		<p>Agence (ou bureau, ou courtier) <input type="text" name="numero immatriculation" required></p>
 		<p>
		Les dégats matériel au véhicule sont-ils assuré par le contrat ?<input type="radio" id="oui" name="drone" value="oui">
  		<label for="oui">Oui</label>
		<input type="radio" id="non" name="drone" value="non">
  		<label for="non">Non</label>
		</p>

		<h4>Conducteur</h4>
 		<p>Nom <input type="text" name="nom" required></p>
 		<p>Prénom <input type="text" name="prenom" required></p>
 		<p>Date de naissance <input type="text" name="nom" required></p>
 		<p>Adresse <input type="text" name="prenom" required></p>
 		<p>Code Postal <input type="text" name="nom" required></p>
 		<p>Pays <input type="text" name="prenom" required></p>
 		<p>Téléphone <input type="text" name="nom" required></p>
 		<p>E-mail <input type="text" name="prenom" required></p>
 		<p>Numéro de permis de conduire <input type="text" name="nom" required></p>
 		<p>Catégorie <input type="text" name="prenom" required></p>
 		<p>Permis valable jusqu'au <input type="text" name="prenom" required></p>

		 <h5>Circonstances</h5>
		<p>
		En stationnement / à l’arrêt<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Quittait un stationnement / ouvrait une portière<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Prenait un stationnement<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Sortait d’un parking, d’un lieu privé, d’un chemin de terre<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		S’engageait dans un parking, un lieu privé, un chemin de terre<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		S’engageait sur une place à sens giratoire<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Roulait sur une place à sens giratoire<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Heurtait à l’arrière, en roulant dans lemême sens et sur une même file<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Roulait dans le même sens et sur une file différente<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Changeait de file<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Doublait<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Virait à droite<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Virait à gauche<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Reculait<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Empiétait sur une voie réservée à la circulation en sens inverse<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Venait de droite (dans une carrefour)<input type="radio" id="oui" name="drone" value="oui">
		</p>

		 <h6>Observations</h6>

		 <label for="story">Dégats apparents sur le véhicule tiers</label>

		<textarea id="story" name="story"
				rows="5" cols="33">
		Observations concernants les dégats apparents sur votre véhicule ...
		</textarea>

		<label for="story">Ses observations</label>

		<textarea id="story" name="story"
				rows="5" cols="33">
		Ses observations ...
		</textarea>
		
 		<p><input type="submit" value="continuer"></p>
 	</form>

	 
 </body>
 </html>