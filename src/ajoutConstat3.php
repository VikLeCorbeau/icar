<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Constat</title>
 </head>
 <body>
 	<h1>Déclaration de constat</h1>
 	<h2>3- Véhicule tiers</h2>
 	<h3>information sur l'assuré</h3>
 	<form action="enregistrerPartie3.php" method="POST">
 		<p>nom : <input type="text" name="nom"></p>
 		<p>prenom : <input type="text" name="prenom"></p>
 		<p><input type="submit" value="continuer"></p>
 	</form>
 </body>
 </html>