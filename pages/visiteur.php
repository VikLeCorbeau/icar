<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		div{
			border:1px solid black;
			margin-left: 15px;
			width: 30%;
		}
	</style>
	<?php 
		$nomAssure = $_GET['assure'];
		$immatriculation = $_GET['immatriculation'];
	 ?>
	<p>Bonjour <?php echo $nomAssure; ?> </p>
	<?php 
		$fa = fopen("../db/InfoAssure/".$nomAssure."/contrats.csv", 'r');
		while ($data = fgetcsv($fa, 1000, ';')) {
			if ($immatriculation == $data[7]) {
				echo "<div>";
				echo "<p>Nom de l'assurance : ".$data[5]."</p>";
				echo "<p>Numéro de contrat d'assurance : ".$data[6]."</p>";
				echo "<p>Numéro d'immatriculation : ".$data[7]."</p>";
				echo "<p>date de validité : ".$data[8]."</p>";
				echo "<p>Modèle du véhicule : ".$data[9]."</p>";
				echo "</div>";
			}
		}
		fclose($fa);
	 ?>
</body>
</html>