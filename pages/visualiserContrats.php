<?php
	session_start();
	require_once("../src/fonctions.php");

	verificationType(array('gestionnaire', 'police'));
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visualiser le contrat</title>

	<link rel="icon" href="../assets/svg/logo/icon.svg">

	<link href="../css/generics.css" rel="stylesheet">
    <link href="../css/connexion.css" rel="stylesheet">
    <link href="../css/boxes.css" rel="stylesheet">
</head>
<body>
	    
    <div class="main-container">

		<?php include("../layouts/navigation.php"); ?>  

        <?php 
			$assure = $_GET['assure'];
			$immatriculation = $_GET['immatriculation']; 
			$voiture = $_GET['voiture'];
		?>
        <div class="container-1440">

            <div class="content-container content-column">

                <div class="content-banner">
                    
                    <div class="content-titles-container">
                        <h1 class="content-title">Informations Véhicule</h1>
                        <h2 class="content-subtitle"><?php echo $voiture; ?></h2>
                    </div>

                    <div class="back-container">
                        <a href="<?php 
						if (isset($_SESSION['profil'])) {
							if ($_SESSION['profil'] === 'police') {
								echo "visualisationPolice.php";
							} elseif ($_SESSION['profil'] === 'gestionnaire') {
								echo "mesAssures.php";
							}
						}
						?>">
                            <img src="../assets/svg/icons/back.svg">
                        </a>
                    </div>

                </div>

                <div class="boxes-container">

                    <div class="box box-446" style="flex: auto;">
                        
						<?php
								if ($fa = verificationFichier("../db/InfoAssure/".$assure."/contrats.csv", "r")) {
									while ($data = fgetcsv($fa, 1000, ';')) {
										if ($data[7] == $immatriculation) {
											echo "
											<div class='box-title-container'>
												<h2 class='box-title'>Contrat d'assurance</h2>";
													if (isset($_SESSION['profil'])) {
														if ($_SESSION['profil'] === 'gestionnaire') {
															echo "
																<a href='modifierContrat.php?assure=" . $data[0] . $data[1] . "&immatriculation=".$data[7]."'>
																	<div class='box-actions-container'>
																		<img class='box-actions-svg' src='../assets/svg/icons/gestionnaire_modify_contract.svg'>
																	</div>
																</a>
															";
														}
													}
											echo "</div>";
											echo "<div class='box-informations-container'>";
											
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Conducteur principal :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[1].' '.$data[0]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Adresse :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[2]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Téléphone :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[3]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>E-mail :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[4]."</h3>";
											echo "</div>";
											echo "</div>";
											echo "<div class='box-separator box-separator-610'></div>";
											
											echo "<div class='box-informations-container'>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Nom de l'assurance :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[5]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Numéro de contrat d'assurance :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[6]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Numéro d'immatriculation :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[7]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Date de validité :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[8]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Modèle du véhicule :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[9]."</h3>";
											echo "</div>";
											echo "</div>";
											
											echo "<div class='box-separator box-separator-610'></div>";
	
											echo "<div class='box-informations-container'>";
												echo "<div class='box-informations'>";
												echo "<h3 class='box-information box-information--primary'>Type d'assurance :</h3>";
												echo "<h3 class='box-information box-information--secondary'>".$data[10]."</h3>";
											echo "</div>";
												echo "<div class='box-informations'>";
												echo "<h3 class='box-information box-information--primary'>Bonus :</h3>";
												echo "<h3 class='box-information box-information--secondary'>".$data[11]."</h3>";
											echo "</div>";
												echo "<div class='box-informations'>";
												echo "<h3 class='box-information box-information--primary'>Paiement :</h3>";
												echo "<h3 class='box-information box-information--secondary'>".$data[12]."</h3>";
											echo "</div>";

											echo "</div>";

											echo "<div class='box-separator box-separator-446'></div>

											<div class='box-informations-container'>
												<div class='box-informations'>
													<h3 class='box-information box-information--primary'>QR Code associé :</h3>
													<h3 class='box-information box-information--secondary'>" ."<img src='../db/InfoAssure/". $data[0] . $data[1] ."/contrat-". $data[0] . $data[1] . $data[7].".png'>" . "</h3>
												</div>
											</div>";
										}
									}
									fclose($fa);
								}
						?>
                    </div>

                     <div class="box box-446" style="flex: auto;">

                        <div class="box-title-container">
                            <h2 class="box-title">Carte verte associée</h2>
                        </div>
                        <div class="box-informations-container">
                        	<?php
								if ($fa = verificationFichier("../db/InfoAssure/".$assure."/contrats.csv", "r")) {
									while ($data = fgetcsv($fa, 1000, ';')) {
										if ($immatriculation == $data[7]) {
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Nom de l'assurance :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[5]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Numéro du contrat d'assurance :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[6]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Numéro d'immatriculation :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[7]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Date de validité :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[8]."</h3>";
											echo "</div>";
											echo "<div class='box-informations'>";
											echo "<h3 class='box-information box-information--primary'>Modèle du véhicule :</h3>";
											echo "<h3 class='box-information box-information--secondary'>".$data[9]."</h3>";
											echo "</div>";
										}
									}
								fclose($fa);
								}
							?>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <?php include "../layouts/footer.php"; ?>
		
    </div> 
</body>
</html>