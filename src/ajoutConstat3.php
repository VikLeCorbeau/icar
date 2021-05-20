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
<<<<<<< HEAD
	<h3>Informations sur l'assuré</h3>
 	<form action="enregistrerPartie2.php" method="POST">
 		<p>Nom <input type="text" name="nom" required></p>
 		<p>Prénom <input type="text" name="prenom" required></p>
 		<p>Adresse <input type="text" name="adresse" required></p>
 		<p>Code Postal <input type="text" name="code postal" required></p>
 		<p>Pays <input type="text" name="pays" required></p>
 		<p>Télephone <input type="text" name="telephone" required></p>
 		<p>E-mail <input type="text" name="mail" required></p>
		
		<h1>Informations sur le véhicule</h1>
 		<p>Marque, Type <input type="text" name="marque" required></p>
 		<p>Numéro d'immatriculation <input type="text" name="numero immatriculation" required></p>
 		<p>Pays d'immatriculation <input type="text" name="Pays immatriculation" required></p>
		 
		<h2>Informations sur la remorque</h2>
 		<p>
		Possédez-vous une remorque <input type="radio" id="oui" name="drone" value="oui">
  		<label for="oui">Oui</label>
		<input type="radio" id="non" name="drone" value="non">
  		<label for="non">Non</label>
		</p>
 		<p>Numéro d'immatriculation <input type="text" name="numero immatriculation" required></p>
 		<p>Pays d'immatriculation <input type="text" name="Pays immatriculation" required></p>

		<h3>Informationsur la société d'assurance</h3>
 		<p>Nom <input type="text" name="nom" required></p>
 		<p>Numéro de contrat <input type="text" name="numero immatriculation" required></p>
 		<p>Numéro de carte verte <input type="text" name="numero immatriculation" required></p>
 		<p>Valable du <input type="text" name="numero immatriculation" required></p>
 		<p>Jusqu'au <input type="text" name="numero immatriculation" required></p>
 		<p>Agence (ou bureau, ou courtier) <input type="text" name="numero immatriculation" required></p>
 		<p>
		Les dégats matériel au véhicule sont-ils assuré par le contrat ?<input type="radio" id="oui" name="drone" value="oui">
  		<label for="oui">Oui</label>
		<input type="radio" id="non" name="drone" value="non">
  		<label for="non">Non</label>
		</p>

		<h4>Conducteur</h4>
 		<p>Nom <input type="text" name="nom" required></p>
 		<p>Prénom <input type="text" name="prenom" required></p>
 		<p>Date de naissance <input type="text" name="nom" required></p>
 		<p>Adresse <input type="text" name="prenom" required></p>
 		<p>Code Postal <input type="text" name="nom" required></p>
 		<p>Pays <input type="text" name="prenom" required></p>
 		<p>Téléphone <input type="text" name="nom" required></p>
 		<p>E-mail <input type="text" name="prenom" required></p>
 		<p>Numéro de permis de conduire <input type="text" name="nom" required></p>
 		<p>Catégorie <input type="text" name="prenom" required></p>
 		<p>Permis valable jusqu'au <input type="text" name="prenom" required></p>

		 <h5>Circonstances</h5>
		<p>
		En stationnement / à l’arrêt<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Quittait un stationnement / ouvrait une portière<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Prenait un stationnement<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Sortait d’un parking, d’un lieu privé, d’un chemin de terre<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		S’engageait dans un parking, un lieu privé, un chemin de terre<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		S’engageait sur une place à sens giratoire<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Roulait sur une place à sens giratoire<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Heurtait à l’arrière, en roulant dans lemême sens et sur une même file<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Roulait dans le même sens et sur une file différente<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Changeait de file<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Doublait<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Virait à droite<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Virait à gauche<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Reculait<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Empiétait sur une voie réservée à la circulation en sens inverse<input type="radio" id="oui" name="drone" value="oui">
		</p>
		<p>
		Venait de droite (dans une carrefour)<input type="radio" id="oui" name="drone" value="oui">
		</p>

		 <h6>Observations</h6>

		 <label for="story">Dégats apparents sur le véhicule tiers</label>

		<textarea id="story" name="story"
				rows="5" cols="33">
		Observations concernants les dégats apparents sur votre véhicule ...
		</textarea>

		<label for="story">Ses observations</label>

		<textarea id="story" name="story"
				rows="5" cols="33">
		Ses observations ...
		</textarea>
		
		<p><input type="submit" value="Retour"></p>
 		<p><input type="submit" value="Continuer"></p>
=======
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
>>>>>>> c05d9e6e0d675d8bf8036b1fb0727b213e26d898
 	</form>
 </body>
 </html>