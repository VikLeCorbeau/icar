<?php
	session_start();
	require_once("../src/fonctions.php");

    verificationType(array('police'));
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Police - Assurés</title>

    <link rel="icon" href="../assets/svg/logo/icon.svg">

	<link href="../css/generics.css" rel="stylesheet">
    <link href="../css/connexion.css" rel="stylesheet">
    <link href="../css/boxes.css" rel="stylesheet">
</head>
<body>
    
    <div class="main-container">

        <?php include("../layouts/navigation.php"); ?>  

        <?php
            $tabAssure = array();
            if ($fa = verificationFichier("../db/assure.csv", "r")) {
                
                while ($data = fgetcsv($fa, 1000, ';')) {
                    array_push($tabAssure, $data[0].$data[1]);
                }

                fclose($fa);
            }
        ?>

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner">
                    
                    <div class="content-titles-container">
                        <h1 class="content-title">Liste des assurés</h1>
                    </div>

                </div> 
                <div class='boxes-container'>
                <?php 
                    foreach ($tabAssure as $element) {

                        $nombreVoitureAssure = 0;

                        if ($test = verificationFichier("../db/InfoAssure/".$element."/contrats.csv", "r")) {
                            if ($fileLines = file("../db/InfoAssure/".$element."/contrats.csv")) {
                                $nombreVoitureAssure = count($fileLines);
                            }
                            fclose($test);
                        }

                        if ($fa = verificationFichier("../db/InfoAssure/".$element."/informations.csv", "r")) {

                            while ($data = fgetcsv($fa, 1000, ';')) {

                                        echo "<div class='box box-446'>";
                                            echo "<div class='box-title-container'>";
                                                echo "<h2 class='box-title'>".$data[1].' '.$data[0]."</h2>";
                                            echo "</div>";

                                            echo "<div class='box-informations-container'>";
                                            
                                                echo "<div class='box-informations'>";
                                                    echo "<h3 class='box-information box-information--primary'>Nom :</h3>";
                                                    echo "<h3 class='box-information box-information--secondary'>".$data[0]."</h3>";
                                                echo "</div>";

                                                echo "<div class='box-informations'>";
                                                    echo "<h3 class='box-information box-information--primary'>Prénom :</h3>";
                                                    echo "<h3 class='box-information box-information--secondary'>".$data[1]."</h3>";
                                                echo "</div>";

                                                echo "<div class='box-informations'>";
                                                    echo "<h3 class='box-information box-information--primary'>Adresse mail :</h3>";
                                                    echo "<h3 class='box-information box-information--secondary'>".$data[3]."</h3>";
                                                echo "</div>";

                                                echo "<div class='box-informations'>";
                                                    echo "<h3 class='box-information box-information--primary'>Téléphone :</h3>";
                                                    echo "<h3 class='box-information box-information--secondary'>".$data[2]."</h3>";
                                                echo "</div>";
                                                
                                            echo "</div>";

                                            echo "<div class='box-separator box-separator-446'></div>";

                                            echo "<div class='box-vehicles-container'>";

                                                echo "<div class='box-informations'>";
                                                    echo "<h3 class='box-information box-information--primary'>Véhicules :</h3>";
                                                    echo "<h3 class='box-information box-information--secondary'>".$nombreVoitureAssure."</h3>";
                                                echo "</div>";

                                                echo "<div class='box-vehicles'>";
                                                    if ($fv = verificationFichier("../db/InfoAssure/".$element."/contrats.csv", 'r')) {
                                                        while ($elem = fgetcsv($fv, 1000, ';')) {
                                                            echo "<div class='box-vehicle'>";
                                                                echo "<a href='visualiserContrats.php?assure=".$element."&immatriculation=".$elem[7]."&voiture=".$elem[9]."' class='box-vehicle-a'>";
                                                                    echo "<p class='box-vehicle-svg-text'>".$elem[9]."</p>";
                                                                    echo "<img src='../assets/svg/icons/contract_enter.svg'>";
                                                                echo "</a>";
                                                            echo "</div>";
                                                        }
                                                         fclose($fv);
                                                      }
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</div>";

                            }
                            fclose($fa);
                        }
                    }
                ?>
                </div>
            </div>
        </div>

        <?php include "../layouts/footer.php"; ?>

    </div> 

</body>
</html>