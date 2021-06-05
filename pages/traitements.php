<?php
session_start();
require_once("../src/fonctions.php");

verificationType(array('gestionnaire'));
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitements en attente</title>

    <link rel="icon" href="../assets/svg/logo/icon.svg">

    <link href="../css/generics.css" rel="stylesheet">
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
															<a href='../src/validerConstat.php?numero=".$data[1]."&assure=".$data[2]."&valide=0'>
																<img src='../assets/svg/icons/admin_validation.svg' class='box-constats-action-svg'>
															</a>
														</div>
														<div class='box-constats-action'>
															<a href='../src/validerConstat.php?numero=".$data[1]."&assure=".$data[2]."&valide=1'>
																<img src='../assets/svg/icons/admin_validation.svg' class='box-constats-action-svg' style='transform: rotate(180deg);'>
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
                            if ($fi = verificationFichier("../db/InfoAssure/".$data[1].'/changement/informations_temp.csv', 'r')) {
                                while ($donnees = fgetcsv($fi, 1000, ';')) {
                                    if ($donnees[9] == $_SESSION['assurance']) {
                                        echo "
											<div class='box box-446'>
												<div class='box-title-container'>
													<h2 class='box-title'>" . $data[1] . "</h2>
												</div>
												<div class='box-informations-container'>
													<div class='box-informations'>
														<h3 class='box-information box-information--primary'>Nouvelles coordonnées</h3>
													</div>
												</div>
												<div class='box-separator box-separator-446'></div>
												<div class='box-constats-actions-container'>
													<div class='box-constats-action'>
														<a href='visualiserChangement.php?assure=".$data[1]."'>
															<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
														</a>
													</div>
													<div class='box-constats-action'>
														<a href='../src/validerChangement.php?assure=".$data[1]."&valide=0'>
															<img src='../assets/svg/icons/admin_validation.svg' class='box-constats-action-svg'>
														</a>
													</div>
													<div class='box-constats-action'>
														<a href='../src/validerChangement.php?assure=".$data[1]."&valide=1'>
															<img src='../assets/svg/icons/admin_validation.svg' class='box-constats-action-svg' style='transform: rotate(180deg);'>
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
																<a href='visualiserCession.php?immatriculation=". $donnees[7] ."&assure=". $data[2] ."'>
																	<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='../src/validerCession.php?assure=".$data[2]."&immatriculation=".$obj[0]->immatriculation."&valide=0'>
																	<img src='../assets/svg/icons/admin_validation.svg' class='box-constats-action-svg'>
																</a>
															</div>
															<div class='box-constats-action'>
																<a href='../src/validerCession.php?assure=".$data[2]."&immatriculation=".$obj[0]->immatriculation."&valide=1'>
																	<img src='../assets/svg/icons/admin_validation.svg' class='box-constats-action-svg' style='transform: rotate(180deg);'>
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