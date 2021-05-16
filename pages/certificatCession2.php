<?php 
	session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>certificat cession véhicule</title>
 </head>
 <body>
 	<h1>Certificat de cession d'un véhicule d'occasion</h1>
 	<h2>2- Ancien propriétaire</h2>
 	<h3>Informations sur l'ancien propriétaire</h3>
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
 		<p>Je certifie : <input type="radio" name="certification">Céder<input type="radio" name="certification">Céder pour destruction </p>
 		<p>Le : <input type="date" name="dateCession"><input type="time" name="heureCession"></p>
 		<p>Je certifie en outre : <input type="radio" name="certif">Avoir remis au nouveau propriétaire un certificat établi depuis moinsde quinze jours par le ministre de l'intérieur, atesstant à sa date d'édition de la situation admnistrative du véhicule <input type="radio" name="certif">Que ce véhicule n'a pas subi de transformation notable susceptible de modifier les indications du certificat de conformité ou de l'actuel certificat d'immatriculation. <input type="radio" name="cert">Que ce véhicule est dédé pour destruction à un professionnel de la destruction des véhicules hors d'usage (VHU) portant le n° d'agrément : .........(Le numéro d'agrément VHU du professionnel acquéreur est obligatoire si le véhicule est une voiture particulière, une camionette ou un cyclomoteur à trois roues. La liste des professionnells agréés est disponible sur <a href="https://immatriculation.ans.gouv.fr"></a>)</p>
 		<p>Fait à : <input type="text" name="lieuSignature"></p>
 		<p>Le : <input type="date" name="dateSignature"></p>
 		<p>Je signe numériquement : <input type="radio" name="signature">Je signe numériquement</p>
 		<p><input type="submit" value="Continuer"></p>
 	</form>
 </body>
 </html>