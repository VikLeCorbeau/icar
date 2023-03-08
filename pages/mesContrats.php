<?php
    session_start();
    require_once("../src/fonctions.php");

	verificationType(array('assure'));
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mes contrats</title>

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
                        <h1 class="content-title">Mes contrats d'assurance</h1>
                    </div>
                </div>


                <div class="boxes-container">

				<?php 
				if ($fa = verificationFichier("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r')) {
					while ($data = fgetcsv($fa, 1000, ';')) {
						if (isset($data[7])) {
							$immatriculation = $data[7];
							echo "
								<div class='box box-446'>

									<div class='box-title-container'>
										<h2 class='box-title'>Contrat d'assurance</h2>
									</div>

									<div class='box-informations-container'>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Nom de l’assurance :</h3>
											<h3 class='box-information box-information--secondary'>" . $data[5] . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Numéro du contrat d’assurance :</h3>
											<h3 class='box-information box-information--secondary'>" . $data[6] . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Numéro d’immatriculation : </h3>
											<h3 class='box-information box-information--secondary'>" . $data[7] . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Date de validité</h3>
											<h3 class='box-information box-information--secondary'>" . $data[8] . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Modèle du véhicule</h3>
											<h3 class='box-information box-information--secondary'>" . $data[9] . "</h3>
										</div>
									</div>

									<div class='box-separator box-separator-446'></div>

									<div class='box-informations-container'>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Type d’assurance :</h3>
											<h3 class='box-information box-information--secondary'>" . $data[10] . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Bonus</h3>
											<h3 class='box-information box-information--secondary'>" . $data[11] . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Paiement</h3>
											<h3 class='box-information box-information--secondary'>" . $data[12] . "</h3>
										</div>
									</div>

									<div class='box-separator box-separator-446'></div>
									<div class='box-informations-container'>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>QR Code associé :</h3>
											<h3 class='box-information box-information--secondary'>" ."<img src='../db/InfoAssure/".$_SESSION['identifiants']."/contrat-".$_SESSION['identifiants'].$immatriculation.".png'>" . "</h3>
										</div>
									</div>

								</div>
							";
						}
					}

					fclose($fa); 
				}
				?>
				</div>

            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>