<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Contrat</title>
 </head>
 <body>
 	<h2>Contrat d'assurance</h2>
 	<form action="creerContrat.php" method="POST">
	 	<p><select name="assure">
	 	<?php 
	 		$fa = fopen('../db/assure.csv', 'r');
	 		while ($data = fgetcsv($fa, 1000, ';')) {
	 			echo "<option value=".$data[0].$data[1].">".$data[0]." ".$data[1]."</option>";
	 		}
	 		fclose($fa);
	 	?>
	 	</select></p>
	 	<input type="submit" value="Choisir">
 	</form>
 	<?php 
 		if (isset($_POST['assure'])) {
 			$nomA = $_POST['assure'];
 		}
 		$fa = fopen("../db/InfoAssure/".$nomA."/informations.csv", 'r');
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
 	 ?>

 	 <form action="../src/enregistrerContrat.php" method="POST">
 	 	<p>Nom : <input type="text" name="nom" <?php echo "value='".$nom."'"; ?>></p>
 	 	<p>Prénom : <input type="text" name="prenom" <?php echo "value='".$prenom."'"; ?>></p>
 	 	<p>Adresse : <input type="text" name="adresse" <?php echo "value='".$rue.', '.$ville.', '.$cp.', '.$pays."'"; ?>></p>
 	 	<p>Téléphone : <input type="text" name="tel" <?php echo "value='".$tel."'"; ?>></p>
 	 	<p>E-mail : <input type="email" name="email"<?php echo "value='".$email."'"; ?>></p>
 	 	<p>Nom de l'assurance : <input type="text" name="nomAssurance" <?php echo "value='".$assurance."'"; ?>></p>
 	 	<p>Numéro du contrat d'assurance : <input type="text" name="numeroAssurance" <?php echo "value='".$numeroAssurance."'"; ?>></p>
 	 	<p>Numéro d'immatriculation : <input type="text" name="immatriculation"></p>
 	 	<p>Date de validité : <input type="date" name="dateValidite"></p>
 	 	<p>Modèle du Véhicule : <input type="text" name="modele"></p>
 	 	<p>Type d'assurance : <select name="typeAssurance">
 	 		<option>Tiers</option>
 	 		<option>Tiers Plus</option>
 	 		<option>Tous risques</option>
 	 		<option>Au kilomètre</option>
 	 	</select></p>
 	 	<p>Bonus : <input type="number" name="bonus" min="" max="50" step="5"></p>
 	 	<p>Paiement : <select name="paiement">
 	 		<option>Mensuel</option>
 	 		<option>Trimestriel</option>
 	 		<option>Annuel</option>
 	 	</select></p>
 	 	<p><input type="submit" value="Valider"></p>
 	 </form>
 </body>
 </html>