<?php
	session_start();
	if (!isset($_SESSION['identifiants'])) {
		header('Location: pages/connexion.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
</head>
<body>
	<?php 
	if ($_SESSION['profil'] == 'visiteur') {
		echo "<p>dates de validité de l’assurance</p>";
		echo "<p>identification du véhicule</p>";
		echo "<p>numéro de contrat d’assurance</p>";
		echo "<p>nom de l’assurance</p>";
	}else if($_SESSION['profil'] == 'police'){
		echo "<p>vérifier les informations sur l'état du contrat d'assurance et de la carte verte</p>";
	}else if($_SESSION['profil'] == 'assure'){
		header('Location: pages/assure.php');
		exit();
	}else if ($_SESSION['profil'] == 'gestionnaire') {
		header('Location: pages/gestionnaire.php');
		exit();
	}
	?>
</body>
</html>
