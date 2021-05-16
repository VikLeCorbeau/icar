<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Constat</title>
 </head>
 <body>
 	<style type="text/css">
 		.style_input{
	 		width:200px;
	 		height:100px;
 		}
 	</style>
 	<form action="ajoutConstat2.php" method="POST">
 		<p><select name="voitureA">
 			<?php 
		 		$fa = fopen('../db/InfoAssure/'.$_SESSION['identifiants'].'/contrats.csv', 'r');
		 		while ($data = fgetcsv($fa, 1000, ';')) {
		 			echo "<option value=".$data[9].">".$data[9]." ".$data[7]."</option>";
		 		}
		 		fclose($fa);
	 		?>
 		</select></p>
 		<input type="submit" value="Choisir">
 	</form>
 	<?php 
 		if (isset($_POST['voitureA'])) {
 			$voiture = $_POST['voitureA'];
 		}
 		$fa = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r');
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

 	 ?>
 	<h1>Déclaration de constat</h1>
 	<h2>2- Votre véhicule</h2>
 	<form action="enregistrerPartie2.php" method="POST">
 		<h2>information sur l'assuré</h2>
 		<p>Nom : <input type="text" name="nom" <?php echo "value=".$nom."" ?>></p>
 		<p>Prénom : <input type="text" name="prenom" <?php echo "value=".$prenom."" ?>></p>
 		<p>Adresse : <input type="text" name="adresse" <?php echo "value=".$adresse."" ?>></p>
 		<p>Ville : <input type="text" name="ville" <?php echo "value=".$ville.""; ?>></p>
 		<p>Code Postal : <input type="text" name="cp" <?php echo "value=".$cp."" ?>></p>
 		<p>Pays : <input type="text" name="pays" <?php echo "value=".$pays."" ?>></p>
 		<p>Téléphone : <input type="text" name="tel"<?php echo "value=".$tel."" ?>></p>
 		<p>E-mail : <input type="email" name="email"<?php echo "value=".$email."" ?>></p>
 		<h2>Information sur le véhicule</h2>
 		<p>Marque, Type : <input type="texte" name="marque"<?php echo "value=".$marque."" ?>></p>
 		<p>Numéro d'immatriculation : <input type="text" name="immatriculation" <?php echo "value=".$immatriculation."" ?>></p>
 		<p>Pays d'immatriculation : <input type="text" name="paysImm"></p>
 		<h2>Information sur la remorque</h2>
 		<p>Possédez vous une remorque : <input type="radio" name="remorque">OUI <input type="radio" name="remorque">NON</p>
 		<p>Numéro d'immatriculation : <input type="text" name="immatriculationR" <?php echo "value=".$immatriculation."" ?>></p>
 		<p>Pays d'immatriculation : <input type="text" name="paysImmR"></p>
 		<h2>Information sur la société d'assurance</h2>
 		<p>Nom de l'assurance : <input type="text" name="assurance" <?php echo "value=".$assurance."" ?>></p>
 		<p>Numéro de contrat : <input type="text" name="numContrat" <?php echo "value=".$numContrat."" ?>></p>
 		<p>Numéro de carte verte <input type="text" name="numCV"></p>
 		<p>Date de validité : <input type="date" name="dateValidite" <?php echo "value=".$date."" ?>></p>
 		<p>Agence (ou Bureau, ou courtier) <input type="text" name="agence"></p>
 		<p>Les dégats matériels au véhicule sont-ils assurés par le contrat ? <input type="radio" name="degat">Oui<input type="radio" name="degat">Non</p>
 		<h2>Conducteur</h2>
 		<p>Nom : <input type="text" name="nomC" <?php echo "value=".$nom."" ?>></p>
 		<p>Prénom : <input type="text" name="prenomC" <?php echo "value=".$prenom."" ?>></p>
 		<p>Adresse : <input type="text" name="adresseC" <?php echo "value=".$adresse."" ?>></p>
 		<p>Code Postal : <input type="text" name="cpC" <?php echo "value=".$cp."" ?>></p>
 		<p>Pays : <input type="text" name="paysC" <?php echo "value=".$pays."" ?>></p>
 		<p>Téléphone : <input type="text" name="telC" <?php echo "value=".$tel."" ?>></p>
 		<p>E-mail : <input type="email" name="emailC" <?php echo "value=".$email."" ?>></p>
 		<p>Numéro du permis de conduire : <input type="text" name="numPermis"></p>
 		<p>Catégorie du véhicule : <input type="text" name="categorie"></p>
 		<p>Permis valable jusqu'au : <input type="date" name="datePermis"></p>
 		<p>Circonstance : <input type="radio" name="circonstance">En stationnement/à l'arrêt<input type="radio" name="circonstance">Quittait un stationnement/ouvrait une porte<input type="radio" name="circonstance">Prenait un stationnement<input type="radio" name="circonstance">Sortait d'un parking, d'un lieu privé, d'un chemin de terre<input type="radio" name="circonstance">S'engageait dans un parking, un lieu privé, un chemin de terre<input type="radio" name="circonstance">S'engageait sur une place à sens giratoire<input type="radio" name="circonstance">Roulait sur une place à sens giratoire<input type="radio" name="circonstance">Heurtait à l'arrière, en roulant dans le même sens et sur une même file<input type="radio" name="circonstance">Roulait dans le même sens et sur une file différente<input type="radio" name="circonstance">Changeait de file<input type="radio" name="circonstance">Doublait<input type="radio" name="circonstance">virait à droite<input type="radio" name="circonstance">reculait<input type="radio" name="circonstance">empiétait sur une voir réservée à la circulation en sens inverse<input type="radio" name="circonstance">venait de droite(dans un carrefour)</p>
 		<h2>Observations</h2>
 		<p>Dégats apparents sur votre véhicule <input type="text" name="degatsObservation" class=style_input></p>
 		<p>Mes observations <input type="text" name="observation" class=style_input></p>

 		<p><input type="submit" value="continuer"></p>
 	</form>
 </body>
 </html>