<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Assure</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
	<style type="text/css">
	div{
		border: 1px solid black;
		width: 30%;
		margin-left: 5%;
	}	
	</style>
	<?php 
		$assure = $_GET['assure'];
		$immatriculation = $_GET['immatriculation']; 
		$voiture = $_GET['voiture'];
		$fa = fopen("../db/InfoAssure/".$assure."/contrats.csv", 'r');
		?>
		<h1>informations du véhicule</h1>
		<?php
		echo "<h2>".$voiture."</h2>";
		while ($data = fgetcsv($fa, 1000, ';')) {
			if ($data[7] == $immatriculation) {
				echo "<div>";
				echo "<p>Conducteur principal : ".$data[1].' '.$data[0]."</p>";
				echo "<p>Adresse : ".$data[2]."</p>";
				echo "<p>Téléphone : ".$data[3]."</p>";
				echo "<p>E-mail : ".$data[4]."</p>";
				echo "<hr>";
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
		}
	?>
	<p>
		Le QRCode associé à ce contrat est :
		<?php echo "<img src='../db/InfoAssure/".$assure."/contrat-".$assure.$immatriculation.".png'>"; ?>
	</p>
</html>