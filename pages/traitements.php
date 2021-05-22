<<<<<<< HEAD
<?php 
	session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Traitement en attente</title>
 </head>
 <body>
 	<style type="text/css">
 		div{
 			width: 30%;
 			border: 1px solid black;
 		}
 	</style>
 	<h1>Traitement en attente</h1>
 	<h2>Constats amiable</h2>
 	<div id="constats">
 		<?php 
 			$ft = fopen("../db/traitements.csv", 'r');
 			while ($data = fgetcsv($ft, 1000, ';')) {
		 		if ($data[0] == 'constat') {
 					$fi = fopen("../db/InfoAssure/".$data[2].'/contrats.csv', 'r');
	 				while ($donnees = fgetcsv($fi, 1000, ';')) {
	 					if ($donnees[5] == $_SESSION['assurance']) {
	 						$elem = file_get_contents("../db/InfoAssure/".$data[2]."/constats/constat".$data[1].".json");
	 						$obj = json_decode($elem);
	 						if ($obj[2]->immatriculation == $donnees[7]) {
			 					echo "<div>";
			 					echo "<h3>".$data[2]."</h3>";
			 					echo "<hr>";
			 					echo "<p>Date : ".$obj[0]->date."</p>";
			 					# s'il faut mettre le reste c'est éventuellement possible
			 					#ajouter les assets, je mettrai les liens
			 					echo "</div>";
	 						}
 						}
 					}
		 		}
		 		fclose($fi);
 			}
 			fclose($ft);
 			
 		 ?>
 	</div>
 	<h2>Changements d'adresse</h2>
 	<div id="changements">
 		<?php 
 			$ft = fopen("../db/traitements.csv", 'r');
 			while ($data = fgetcsv($ft, 1000, ';')) {
 				if ($data[0] == 'changement') {
 					$fi = fopen("../db/InfoAssure/".$data[2].'/contrats.csv', 'r');
 					while ($donnees = fgetcsv($fi, 1000, ';')) {
	 					if ($donnees[5] == $_SESSION['assurance']) {
		 					echo "<div>";
		 					echo "<h3>".$data[2]."</h3>";
		 					echo "<hr>";
		 					#ajouter les assets, je mettrai les liens
		 					echo "</div>";
 						}
 					}
 				}
 				fclose($fi);
 			}
 			fclose($ft);
 		 ?>
 	</div>
 	<h2>Cessions de véhicule</h2>
 	<div id="cessions">
 		<?php 
 			$ft = fopen("../db/traitements.csv", 'r');
 			while ($data = fgetcsv($ft, 1000, ';')) {
 				if ($data[0] == 'cession') {
 					$fi = fopen("../db/InfoAssure/".$data[2].'/contrats.csv', 'r');
 					while ($donnees = fgetcsv($fi, 1000, ';')) {
 						//echo $donnees[7].' '.$data[1];
	 					if ($donnees[5] == $_SESSION['assurance'] && $donnees[7] == $data[1]) {
	 						$elem = file_get_contents("../db/InfoAssure/".$data[2]."/cession/".$data[1].".json");
	 						$obj = json_decode($elem); 
	 						echo "<div>";
		 					echo "<h3>".$data[2]."</h3>";
		 					echo "<hr>";
		 					echo "<p>Véhicule ".$obj[0]->marque."</p>";
		 					echo "Immatriculation ".$obj[0]->immatriculation."</p>";
		 					echo "Date ".$obj[0]->date."</p>";
		 					echo "Nouveau propriétaire ".$obj[2]->prenom.' '.$obj[2]->nom."</p>";
		 					#ajouter les assets, je mettrai les liens
		 					echo "</div>";
 						}
 					}
 				}
 				fclose($fi);
 			}
 			fclose($ft);
 		 ?>
 	</div>
 </body>
 </html>
=======
<?php
    session_start();
    require_once("../src/fonctions.php");
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Traitements en attente</title>

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">

    </head>
<body>

    <div class="main-container">

        <?php include("../layouts/navigation.php"); ?> 

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner"> 
                    <div class="content-titles-container">
                        <h1 class="content-title">Traitements en attente</h1>
                    </div>
                </div>

				<div class="grid-form" style="margin-bottom: 0px;">

					<div class="form-title-container">
						<h1 class="form-title">constats amiables</h1>
					</div>

				</div>

				<div class="boxes-container">
					<?php 

						if ($ft = verificationFichier("../db/traitements.csv", 'r')) {
							while ($data = fgetcsv($ft, 1000, ';')) {
								if ($data[0] == 'constat') {
									if ($fi = verificationFichier("../db/InfoAssure/".$data[2].'/contrats.csv', 'r')) {
										while ($donnees = fgetcsv($fi, 1000, ';')) {
											if ($donnees[5] == $_SESSION['assurance']) {
												$elem = file_get_contents("../db/InfoAssure/".$data[2]."/constats/constat".$data[1].".json");
												$obj = json_decode($elem);
												if ($obj[2]->immatriculation == $donnees[7]) {
													echo "
													<div class='box box-446'>
														<div class='box-title-container'>
															<h2 class='box-title'>" . $data[2] . "</h2>
														</div>
														<div class='box-informations-container'>
															<div class='box-informations'>
																<h3 class='box-information box-information--primary'>Date</h3>
																<h3 class='box-information box-information--secondary'>" . $obj[0]->date . "</h3>
															</div>
														</div>
														<div class='box-separator box-separator-446'></div>
														<div class='box-constats-actions-container'>
															<div class='box-constats-action'>
																<a href='visualiserConstat.php?numero='>
																	<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='supprimerConstat.php?numero='>
																	<img src='../assets/svg/icons/delete.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='ajoutImageConstatConstat.php?numero='>
																	<img src='../assets/svg/icons/insured_add_images.svg' class='box-constats-action-svg'>
																</a>
															</div>
														</div>
													</div>
													";
												}
											}
										}
									fclose($fi);
									}
								}
							}
							fclose($ft);
						}

					?>
				</div>

				<div class="grid-form" style="margin-bottom: 0px;">

					<div class="form-title-container">
						<h1 class="form-title">changement de coordonnées</h1>
					</div>

				</div>

				<div class="boxes-container">
				
					<?php 
						if ($ft = verificationFichier("../db/traitements.csv", 'r')) {
							while ($data = fgetcsv($ft, 1000, ';')) {
								if ($data[0] == 'changement') {
									if ($fi = verificationFichier("../db/InfoAssure/".$data[2].'/contrats.csv', 'r')) {
										while ($donnees = fgetcsv($fi, 1000, ';')) {
											if ($donnees[5] == $_SESSION['assurance']) {
												echo "
													<div class='box box-446'>
														<div class='box-title-container'>
															<h2 class='box-title'>" . $data[2] . "</h2>
														</div>
														<div class='box-informations-container'>
															<div class='box-informations'>
																<h3 class='box-information box-information--primary'>NOM</h3>
																<h3 class='box-information box-information--secondary'> DONNEES ? </h3>
															</div>
														</div>
														<div class='box-separator box-separator-446'></div>
														<div class='box-constats-actions-container'>
															<div class='box-constats-action'>
																<a href='visualiserConstat.php?numero='>
																	<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='supprimerConstat.php?numero='>
																	<img src='../assets/svg/icons/delete.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='ajoutImageConstatConstat.php?numero='>
																	<img src='../assets/svg/icons/insured_add_images.svg' class='box-constats-action-svg'>
																</a>
															</div>
														</div>
													</div>
													";
											}
										}
									fclose($fi);
									}
								}
							}
							fclose($ft);
						}
					?>
					
				</div>

				<div class="grid-form" style="margin-bottom: 0px;">

					<div class="form-title-container">
						<h1 class="form-title">cessions de véhicules</h1>
					</div>

				</div>

				<div class="boxes-container">
				
					<?php 
						if ($ft = verificationFichier("../db/traitements.csv", 'r')) {
							while ($data = fgetcsv($ft, 1000, ';')) {
								if ($data[0] == 'cession') {
									if ($fi = verificationFichier("../db/InfoAssure/".$data[2].'/contrats.csv', 'r')) {
										while ($donnees = fgetcsv($fi, 1000, ';')) {
											//echo $donnees[7].' '.$data[1];
											if ($donnees[5] == $_SESSION['assurance'] && $donnees[7] == $data[1]) {
												$elem = file_get_contents("../db/InfoAssure/".$data[2]."/cession/".$data[1].".json");
												$obj = json_decode($elem);
												echo "
													<div class='box box-446'>
														<div class='box-title-container'>
															<h2 class='box-title'>" . $data[2] . "</h2>
														</div>
														<div class='box-informations-container'>
															<div class='box-informations'>
																<h3 class='box-information box-information--primary'>Véhicule</h3>
																<h3 class='box-information box-information--secondary'>" . $obj[0]->marque . "</h3>
															</div>

															<div class='box-informations'>
																<h3 class='box-information box-information--primary'>Immatriculation</h3>
																<h3 class='box-information box-information--secondary'>" . $obj[0]->immatriculation . "</h3>
															</div>

															<div class='box-informations'>
																<h3 class='box-information box-information--primary'>Date</h3>
																<h3 class='box-information box-information--secondary'>" . $obj[0]->date . "</h3>
															</div>

															<div class='box-informations'>
																<h3 class='box-information box-information--primary'>Nouveau propriétaire</h3>
																<h3 class='box-information box-information--secondary'>" . $obj[1]->prenom . " " . $obj[1]->nom . "</h3>
															</div>
															
														</div>
														<div class='box-separator box-separator-446'></div>
														<div class='box-constats-actions-container'>
															<div class='box-constats-action'>
																<a href='visualiserConstat.php?numero='>
																	<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='supprimerConstat.php?numero='>
																	<img src='../assets/svg/icons/delete.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='ajoutImageConstatConstat.php?numero='>
																	<img src='../assets/svg/icons/insured_add_images.svg' class='box-constats-action-svg'>
																</a>
															</div>
														</div>
													</div>
													";
											}
										}
									}
								fclose($fi);
								}
							}
							fclose($ft);
						}
					?>

				</div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>
>>>>>>> 6bead6cb3d072d40a8f3ed3f0a78a11aa2daffe1
