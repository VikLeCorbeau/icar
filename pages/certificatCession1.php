<?php 
session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Cession Véhicule</title>
 </head>
 <body>
 	<h1>Certificat de cession d'un véhicule d'occasion</h1>
 	<h2>1 - Le véhicule (à remplir par l'ancien propriétaire)</h2>
 	<h3>information sur le véhicule</h3>
 	<form action="../src/enregistrerCession.php" method="POST">
 		<p>Numéro d'immatriculation : <input type="text" name="immatriculation"></p>
 		<p>Numéro d'identification du véhicule : <input type="text" name="identification"></p>
 		<p>Date de première immatriculation du véhicule : <input type="date" name="date"></p>
 		<p>Marque : <input type="text" name="marque"></p>
 		<p>Type, Variante, version : <input type="text" name="type"></p>
 		<p>Genre national : <input type="text" name="genre"></p>
 		<p>Dénomination commerciale : <input type="text" name="denomination"></p>
 		<p>Kilométrage inscrit au compteur : <input type="text" name="kilométrage"></p>
 		<p>Possédez-vous un certificat d'immatriculation : <input type="radio" name="certificat">OUI<input type="radio" name="certificat">NON</p>
 		<p>Motif d'absence de certificat d'immatriculation <input type="text" name="motif"></p>
 		<p><input type="submit" value="Continuer"></p>
 	</form>
 </body>
 </html>