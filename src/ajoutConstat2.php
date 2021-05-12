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
 	</form>
 </body>
 </html>