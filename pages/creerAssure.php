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
 		<p>Numéro de contrat : <input type="text" name="contrat"></p>
 		<input type="submit" value="valider">
 	</form>
 	<h1>Liste des assurés</h1>
 </body>
 </html>