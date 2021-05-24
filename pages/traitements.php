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
        <link rel="icon" type="image/png" href="../assets/svg/logo/logo_2.png">
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
																<a href='visualiserConstat.php?assure=".$data[2]."&numero=".$data[1]."'>
																	<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='supprimerConstat.php?numero=".$data[1]."'>
																	<img src='../assets/svg/icons/delete.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='ajoutImageConstatConstat.php?numero=".$data[1]."'>
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
