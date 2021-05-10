<?php 
	session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<h1>Créer un Assuré</h1>
 	<form action="../src/ajoutAssure.php" method="POST">
 		<p>nom : <input type="text" name="nom"></p>
 		<p>prénom : <input type="text" name="prenom"></p>
 		<p>numéro de téléphone : <input type="tel" name="telephone"></p>
 		<p>email : <input type="email" name="email"></p>
 		<p>Adresse postale : <input type="text" name="adresse"></p>
 		<p>Ville : <input type="text" name="ville"></p>
 		<p>Code postale : <input type="number" name="CP"></p>
 		<p>Pays : <input type="text" name="pays"></p>
 		<p>Numero de contrat : <input type="text" name="contrat"></p>
 		<p>Nom de l'assurance : <input type="text" name="assurance"></p>
 		<input type="submit" value="valider">
 	</form>
 	<h1>Liste des assurés</h1>
	<?php 
		echo $_SESSION['assurance'];
		echo "bon";
	?>
 	<table border=1px>
 		<tr>
 			<th>Nom</th>
 			<th>Prénom</th>
 			<th>Numéro de contrat</th>
 		</tr>
	 	<?php 
	 		$fl = fopen('../db/assure.csv', 'r');
	 		while ($data = fgetcsv($fl, 1000, ';')) {
	 			if ($data[3] == $_SESSION['assurance']) {
		 			echo "<tr>";
		 			echo "<td>".$data[0]."</td>";
		 			echo "<td>".$data[1]."</td>";
		 			echo "<td>".$data[2]."</td>";
		 			echo "</tr>";
	 			}
	 		}
	 	 ?>
 	</table>
 </body>
 </html>