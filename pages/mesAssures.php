<?php
    session_start();
    require_once("../src/fonctions.php");

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
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mes assurés</title>

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
                        <h1 class="content-title">Mes assurés</h1>
                    </div>
                </div>


				<div class='boxes-container'>

					<?php

						$tabAssure = array();
						if ($fa = fopen("../db/assure.csv", 'r')) {
							while ($data = fgetcsv($fa, 1000, ';')) {
								if ($data[3] == $_SESSION['assurance']) {
									array_push($tabAssure, $data[0].$data[1]);
								}
							}
							fclose($fa);
						}

						foreach ($tabAssure as $element) {
							$fileLines = file("../db/InfoAssure/".$element."/contrats.csv");
							$nombreVoitureAssure = count($fileLines);
							if ($fa = fopen("../db/InfoAssure/".$element."/informations.csv", 'r')) {
								while ($data = fgetcsv($fa, 1000, ';')) {

									echo "
										<div class='box box-446'>

											<div class='box-title-container'>
												<h2 class='box-title'>" . $data[3] . " " . $data[2] . "</h2>
												<a href='creerContrat.php?assure=" . $data[3] . $data[2] . "'>
													<div class='box-actions-container'>
														<img class='box-actions-svg' src='../assets/svg/icons/gestionnaire_add_contract.svg'>
													</div>
												</a>
											</div>

											<div class='box-informations-container'>

												<div class='box-informations'>
													<h3 class='box-information box-information--primary'>Nom :</h3>
													<h3 class='box-information box-information--secondary'>" . $data[2] . "</h3>
												</div>

												<div class='box-informations'>
													<h3 class='box-information box-information--primary'>Prénom :</h3>
													<h3 class='box-information box-information--secondary'>" . $data[3] . "</h3>
												</div>

												<div class='box-informations'>
													<h3 class='box-information box-information--primary'>Adresse mail :</h3>
													<h3 class='box-information box-information--secondary'>" . $data[5] . "</h3>
												</div>

												<div class='box-informations'>
													<h3 class='box-information box-information--primary'>Téléphone :</h3>
													<h3 class='box-information box-information--secondary'>" . $data[4] . "</h3>
												</div>

											</div>

											<div class='box-separator box-separator-446'></div>

											<div class='box-vehicles-container'>

												<div class='box-informations'>
													<h3 class='box-information box-information--primary'>Véhicules :</h3>
													<h3 class='box-information box-information--secondary'>" . $nombreVoitureAssure . "</h3>
												</div>

												<div class='box-vehicles'>";
													
													
													if ($fv = fopen("../db/InfoAssure/".$element."/contrats.csv", 'r')) {
														while ($elem = fgetcsv($fv, 1000, ';')) {
														echo "
														<div class='box-vehicle'>	

															<a href='visualiserContrats.php?assure=".$element."&immatriculation=".$elem[7]."&voiture=".$elem[9]."' class='box-vehicle-a'>
																<p class='box-vehicle-svg-text'>".$elem[9]."</p>
																<img src='../assets/svg/icons/contract_enter.svg'>
															</a>

														</div>";
													
														}
														fclose($fv);
													}

												echo "</div>

											</div>

										</div>	
									";
								}
								fclose($fa);
							}
						}	

					?>

				</div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>