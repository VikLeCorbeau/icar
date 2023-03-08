<?php 
    session_start();
    require_once("../src/fonctions.php");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Visiteur</title>

    <link rel="icon" href="../assets/svg/logo/icon.svg">

    <link href="../css/generics.css" rel="stylesheet">
    <link href="../css/boxes.css" rel="stylesheet">
    
</head>
<body>

    <div class="main-container">

        <?php include("../layouts/navigation.php"); ?>  

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner">
                    
                    <div class="content-titles-container">
                        <h1 class="content-title">Visiteur - QR Code</h1>
                    </div>

                </div>

                <div class="boxes-container-solo">

                    <div class="box box-610">
                        <div class="box-title-container">
                            <h2 class="box-title">Carte verte d'assurance</h2>
                        </div>
                        <div class="box-informations-container">
                        <?php 
                            if (isset($_GET['assure'], $_GET['immatriculation'])) {
                                $nomAssure = $_GET['assure'];
                                $immatriculation = $_GET['immatriculation'];
								if ($fa = fopen("../db/InfoAssure/".$nomAssure."/contrats.csv", 'r')) {
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