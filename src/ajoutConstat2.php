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
 	<h2>2- Votre véhicule</h2>
 	<form action="enregistrerPartie2.php" method="POST">
 		<p>Nom : <input type="text" name="nom"></p>
 		<p>Prénom : <input type="text" name="prenom"></p>
 		<p><input type="submit" value="continuer"></p>
 	</form>
 </body>
 </html>