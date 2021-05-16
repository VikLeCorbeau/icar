<!DOCTYPE html>
	<head>
		<title>Afficher Carte verte</title>
        
        <script type="text/javascript" src="visiteur.js"></script>
	</head>
	<body>
		<?php
		// Cherche la carte verte
			$fichier = "../db/".$_GET["nom"].$_GET["prenom"].".csv";
			if (file_exists($fichier)) {
				$handle = fopen($fichier, "r");

				// Ouvre le fichier et entre les données
				while (($data = fgetcsv($handle, 1000, ";"))) {
					echo "<p>Dates de validité de l’assurance :</p>";
                    echo $data[0].".<br>";
					echo "<p>Numéro d'immatriculation du véhicule : </p>".$data[1]."<br>";
					echo "<p>Numéro de contrat d’assurance : </p>".$data[2]."<br>";
					echo "<p>Nom de l’assurance : </p>".$data[3]."<br>";
				}
				// Ferme le fichier
				fclose($handle);
			}else{
				echo "Ce man n'existe pas dans la base de données.";
			}
		?>
	</body>
</html>