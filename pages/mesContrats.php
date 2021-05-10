<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contrats</title>
</head>
<body>
	<style type="text/css">
		div{

			width: 400px;
			margin-left: 20px;
			border: 2px solid black;
		}
	</style>
	<h1>Mes contrats d'assurance</h1>
	<?php 
		$fa = fopen("../db/InfoAssure/".$_SESSION['dossier']."/contrats.csv", 'r');
		while ($data = fgetcsv($fa, 1000, ';')) {
			echo "<div>";
			echo "<p>Nom de l'assurance : ".$data[5]."</p>";
			echo "<p>Numéro de contrat d'assurance : ".$data[6]."</p>";
			echo "<p>Numéro d'immatriculation : ".$data[7]."</p>";
			echo "<p>date de validité : ".$data[8]."</p>";
			echo "<p>Modèle du véhicule : ".$data[9]."</p>";
			echo "<hr>";
			echo "<p>Type d'assurance : ".$data[10]."</p>";
			echo "<p>Bonus : ".$data[11]."</p>";
			echo "<p>Paiement : ".$data[12]."</p>";
			echo "</div>";
		}
		fclose($fa);
	 ?>
	 <p>Revenir à la page d'accueil : <a href="../accueil.php">ICI</a></p>
</body>
</html>