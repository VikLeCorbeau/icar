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
 		<h2>information sur l'assuré</h2>
 		<p>Nom : <input type="text" name="nom"></p>
 		<p>Prénom : <input type="text" name="prenom"></p>
 		<p>Adresse : <input type="text" name="adresse"></p>
 		<p>Ville : <input type="text" name="ville"></p>
 		<p>Code Postal : <input type="text" name="cp"></p>
 		<p>Pays : <input type="text" name="pays"></p>
 		<p>Téléphone : <input type="text" name="tel"></p>
 		<p>E-mail : <input type="email" name="email"></p>
 		<h2>Information sur le véhicule</h2>
 		<p>Marque, Type : <input type="texte" name="marque"></p>
 		<p>Numéro d'immatriculation : <input type="text" name="immatriculation"></p>
 		<p>Pays d'immatriculation : <input type="text" name="paysImm"></p>
 		<h2>Information sur la remorque</h2>
 		<p>Possédez vous une remorque : <input type="radio" name="remorque">OUI <input type="radio" name="remorque">NON</p>
 		<p>Numéro d'immatriculation : <input type="text" name="immatriculationR"></p>
 		<p>Pays d'immatriculation : <input type="text" name="paysImmR"></p>
 		<h2>Information sur la société d'assurance</h2>
 		<p>Nom de l'assurance : <input type="text" name="assurance"></p>
 		<p>Numéro de contrat : <input type="text" name="numContrat"></p>
 		<p>Numéro de carte verte <input type="text" name="numCV"></p>
 		<p>Date de validité : <input type="date" name="dateValidite" >></p>
 		<p>Agence (ou Bureau, ou courtier) <input type="text" name="agence"></p>
 		<p>Les dégats matériels au véhicule sont-ils assurés par le contrat ? <input type="radio" name="degat">Oui<input type="radio" name="degat">Non</p>
 		<h2>Conducteur</h2>
 		<p>Nom : <input type="text" name="nomC"></p>
 		<p>Prénom : <input type="text" name="prenomC"></p>
 		<p>Adresse : <input type="text" name="adresseC"></p>
 		<p>Code Postal : <input type="text" name="cpC" ></p>
 		<p>Pays : <input type="text" name="paysC" ></p>
 		<p>Téléphone : <input type="text" name="telC"></p>
 		<p>E-mail : <input type="email" name="emailC"></p>
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