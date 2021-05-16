<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Certificat cession véhicule</title>
 </head>
 <body>
 	<h1>Certificat de cession d'un véhicule d'occasion</h1>
 	<h2>3- Nouveau propriétaire</h2>
 	<h3>Information sur le nouveau propriétaire</h3>
 	<form action="../src/enregistrerCession.php" method="POST">
 		<p>Personne physique/morale : <input type="radio" name="personne">Physique <input type="radio" name="personne">Morale</p>
 		<p>Sexe : <input type="radio" name="sexe">Mâle<input type="radio" name="sexe">Femelle<input type="radio" name="sexe">Non-binaire </p>
 		<p>Nom : <input type="text" name="nom"></p>
 		<p>Prénom : <input type="text" name="prenom"></p>
 		<p>Date de naissance : <input type="date" name="dateNaissance"></p>
 		<p>Adresse : <input type="text" name="adresse"></p>
 		<p>Vlle : <input type="text" name="ville"></p>
 		<p>Code Postal : <input type="text" name="cp"></p>
 		<p>Pays : <input type="text" name="pays"></p>
 		<h3>Certifications</h3>
 		<p>Je certifie : <input type="radio" name="certification">Acquérir le véhicule désigné ci-dessus aux dates et heures indiquées par l'ancien propriétaire.<input type="radio" name="certification">Avoir été informé de la situation administrative du véhicule</p>
 		<p>Fait à : <input type="text" name="lieuSignature"></p>
 		<p>Le : <input type="date" name="dateSignature"></p>
 		<p>Je signe numériquement : <input type="radio" name="signature">Je signe numériquement</p>
 		<p><input type="submit" value="Finaliser la vente du véhicule"></p>
 	</form>
 </body>
 </html>