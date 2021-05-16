<?php 
	session_start();
	if (!isset($_SESSION['identifiants'])) {
		header('Location: connexion.php');
		exit();
	}else if ($_SESSION['identifiants'] != 'gestionnaire') {
		header('Location: ../accueil.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mes assurés</title>
</head>
<body>
	<style type="text/css">
		div{
			border:1px solid black;
			width: 30%;
			margin-left: 5%;
		}
	</style>
	<h1>Mes assurés</h1>
	<?php
	$tabAssure = array();
	$fa = fopen("../db/assure.csv", 'r');
	while ($data = fgetcsv($fa, 1000, ';')) {
		if ($data[3] == $_SESSION['assurance']) {
			array_push($tabAssure, $data[0].$data[1]);
		}
	}
	fclose($fa);
	foreach ($tabAssure as $element) {
		$fileLines=file("../db/InfoAssure/".$element."/contrats.csv");
		$nombreVoitureAssure = count($fileLines);
		$fa = fopen("../db/InfoAssure/".$element."/informations.csv", 'r');
		while ($data = fgetcsv($fa, 1000, ';')) {
			echo "<div>";
			echo "<p>".$data[3].' '.$data[2]."</p>";
			echo "<hr>";
			echo "<p>Nom : ".$data[2]."</p>";
			echo "<p>Prénom : ".$data[3]."</p>";
			echo "<p>Adresse mail : ".$data[5]."</p>";
			echo "<p>Téléphone : ".$data[4]."</p>";
			echo "<hr>";
			echo "<p>Véhicules en tant que conductueur principal : ".$nombreVoitureAssure."</p>";
			$fv = fopen("../db/InfoAssure/".$element."/contrats.csv", 'r');
			while ($elem = fgetcsv($fv, 1000, ';')) {
				echo "<p><a href='visualiserContrats.php?assure=".$element."&immatriculation=".$elem[7]."&voiture=".$elem[9]."'>".$elem[9]."</a></p>";
			}
			fclose($fv);
			echo "</div>";
		}
		fclose($fa);
	}
	 ?>
</body>
</html>