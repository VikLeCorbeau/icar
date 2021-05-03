<?php
	session_start();
	if (!isset($_SESSION['identifiants'])) {
		header('Location: connexion.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
</head>
<body>
	<?php echo "<p>Bonjour ".$_SESSION['identifiants']."</p>"; 
	if ($_SESSION['profil'] == 'visiteur') {
		echo "<p>dates de validité de l’assurance</p>";
		echo "<p>identification du véhicule</p>";
		echo "<p>numéro de contrat d’assurance</p>";
		echo "<p>nom de l’assurance</p>";
	}else if($_SESSION['profil'] == 'police'){
		echo "<p>vérifier les informations sur l'état du contrat d'assurance et de la carte verte</p>";
	}else if($_SESSION['profil'] == 'assure'){
		echo "<p>déclarer un sinistre</p>";
		echo "<p>déclarer un changement de coordonnées</p>";
		echo "<p>visualiser son ou ses contrat(s) d’assurance</p>";
		echo "<p>remplir la déclaration de vente de véhicule</p>";
		echo "<p>contacter l’assurance</p>";
		echo "<p>historique des déclaration de sinistre</p>";
	}else if ($_SESSION['profil'] == 'gestionnaire') {
		echo "<p>modifier les informations du ou des contrats</p>";
		echo "<p>répondre aux messages des assurés</p>";
		echo "<p>traiter les différentes déclarations (sinistre, changement de coordonnées, cession de véhicule)</p>";
		echo "<p>connaître le nombre de sinistres responsabilité : totale, partielle, non responsable</p>";
		echo "<p>remonter des problèmes de fonctionnalités à l'administrateur (sous forme de ticket GLPI)</p>";
		echo "<p>ouvrir un compte pour ses assurés créer un nouveau contrat d'assurance pour un assuré, et donc générer un QRCode spécifique à ce nouveau contrat.</p>";
		echo "recheche dans ses clients</p>";
	}
	?>
	<form action="connexion.php" method="POST">
		<input type="submit" name="OUT" value="déconnexion">
	</form>

</body>
</html>