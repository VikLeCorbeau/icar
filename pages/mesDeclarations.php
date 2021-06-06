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
        <title>Mes Déclarations</title>

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
                        <h1 class="content-title">Mes déclarations</h1>
                    </div>

                </div>

                <div class="grid-form" style="margin-bottom: 0px;">

	                <div class="form-title-container">
	                    <h1 class="form-title">Constats</h1>
	                </div>

	            </div>


				<div class="boxes-container">

					<?php
					$filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
					$files = glob($filename.'/*.json');
					$nombreConstat = count($files);
					$nbImage = 0;


					for ($i=1; $i <= $nombreConstat; $i++) { 
						$messageCO = "en traitement";
						$etatCO = "en traitement";
						$valide = 0;
						
						
						$images = glob($filename.'/img/*.*');
						foreach ($images as $element) {
							$num = explode('-', $element)[0];
							if (substr($num, -1) == $i) {
								$nbImage = $nbImage + 1;
							}
						}

						$Json = file_get_contents("../db/InfoAssure/".$_SESSION['identifiants']."/constats/constat".$i.".json", true);
						$array = json_decode($Json, true);

						if ($fc = verificationFichier($filename."/valideConstat.csv", 'r')) {
							while ($data = fgetcsv($fc, 1000, ',')) {
								if ($i == $data[1]) {
									$etatCO = $data[0];
									$messageCO = $data[2];
									if ($etatCO == "Validé") {
										$valide = 1;
									}
								}
							}
							fclose($fc);
						}
						if ($valide == 0) {
							echo "
								<div class='box box-446'>
									<div class='box-title-container'>
										<h2 class='box-title'>" . $array[0]['date'] . "</h2>
									</div>
									<div class='box-informations-container'>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Etat</h3>
											<h3 class='box-information box-information--secondary'>".$etatCO."</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Images</h3>
											<h3 class='box-information box-information--secondary'>" . $nbImage . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Message de l'assureur</h3>
											<h3 class='box-information box-information--secondary'>".$messageCO."</h3>
										</div>
									</div>
									<div class='box-separator box-separator-446'></div>
									<div class='box-constats-actions-container'>
										<div class='box-constats-action'>
											<a href='visualiserConstat.php?numero=".$i."'>
												<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
											</a>
										</div>
										<div class='box-constats-action'>
											<a href='ajoutImageConstat.php?numero=".$i."&images=".$nbImage."'>
												<img src='../assets/svg/icons/insured_add_images.svg' class='box-constats-action-svg'>
											</a>
										</div>
									</div>
								</div>
							";
						}else if ($valide == 1) {
							echo "
								<div class='box box-446'>
									<div class='box-title-container'>
										<h2 class='box-title'>" . $array[0]['date'] . "</h2>
									</div>
									<div class='box-informations-container'>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Etat</h3>
											<h3 class='box-information box-information--secondary'>".$etatCO."</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Images</h3>
											<h3 class='box-information box-information--secondary'>" . $nbImage . "</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Message de l'assureur</h3>
											<h3 class='box-information box-information--secondary'>".$messageCO."</h3>
										</div>
									</div>
									<div class='box-separator box-separator-446'></div>
									<div class='box-constats-actions-container'>
										<div class='box-constats-action'>
											<a href='visualiserConstat.php?numero=".$i."'>
												<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
											</a>
										</div>
									</div>
								</div>
							";
						}
						$nbImage = 0;
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
						$messageCH = "en traitement";
						$etatCH = "en traitement";

						if ($fc = verificationFichier("../db/InfoAssure/".$_SESSION['identifiants']."/changement/valideChangement.csv", 'r')) {
							while ($data = fgetcsv($fc, 1000, ',')) {
								$etatCH = $data[0];
								$messageCH = $data[1];
							}
							fclose($fc);
						}

						if (file_exists("../db/InfoAssure/".$_SESSION['identifiants']."/changement/informations_temp.csv")) {
							echo "
								<div class='box box-446'>
									<div class='box-title-container'>
										<h2 class='box-title'>Changement de coordonnées</h2>
									</div>
									<div class='box-informations-container'>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Etat</h3>
											<h3 class='box-information box-information--secondary'>".$etatCH."</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Message de l'assureur</h3>
											<h3 class='box-information box-information--secondary'>".$messageCH."</h3>
										</div>
									</div>
									<div class='box-separator box-separator-446'></div>
									<div class='box-constats-actions-container'>
										<div class='box-constats-action'>
											<a href='visualiserChangement.php'>
												<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
											</a>
										</div>
										<div class='box-constats-action'>
											<a href='changerJustificatif.php'>
												<img src='../assets/svg/icons/insured_add_images.svg' class='box-constats-action-svg'>
											</a>
										</div>
									</div>
								</div>
							";
						}else{
							echo "
								<div class='box box-446'>
									<div class='box-title-container'>
										<h2 class='box-title'>Changement de coordonnées</h2>
									</div>
									<div class='box-informations-container'>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Etat</h3>
											<h3 class='box-information box-information--secondary'>".$etatCH."</h3>
										</div>
										<div class='box-informations'>
											<h3 class='box-information box-information--primary'>Message de l'assureur</h3>
											<h3 class='box-information box-information--secondary'>".$messageCH."</h3>
										</div>
									</div>
									<div class='box-separator box-separator-446'></div>
									<div class='box-constats-actions-container'>
										<div class='box-constats-action'>
											<a href='visualiserChangement.php'>
												<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
											</a>
										</div>
									</div>
								</div>
							";
						}
					?>

				</div>

				<div class="grid-form" style="margin-bottom: 0px;">

	                <div class="form-title-container">
	                    <h1 class="form-title">Cessions véhicules</h1>
	                </div>

	            </div>

				<div class="boxes-container">

					<?php
					$filename = "../db/InfoAssure/".$_SESSION['identifiants']."/cession";
					$files = glob($filename.'/*.json');
					$nombreCession = count($files);
					 
					if ($fr = verificationFichier("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r')) {
						while ($data = fgetcsv($fr, 1000, ';')) {

							$messageCE = "en traitement";
							$etatCE = "en traitement";
							$immatriculation = $data[7];
							
							if (file_exists("../db/InfoAssure/".$_SESSION['identifiants']."/cession/".$data[7].".json")) {
								$Json = file_get_contents("../db/InfoAssure/".$_SESSION['identifiants']."/cession/".$data[7].".json", true);
								$array = json_decode($Json, true);
							}
							
							if ($nombreCession != 0 && isset($immatriculation, $etatCE, $messageCE) && $array[0]["immatriculation"] == $immatriculation) {
								echo "
									<div class='box box-446'>
										<div class='box-title-container'>
											<h2 class='box-title'>Cession : ".$immatriculation."</h2>
										</div>
										<div class='box-informations-container'>
											<div class='box-informations'>
												<h3 class='box-information box-information--primary'>Etat</h3>
												<h3 class='box-information box-information--secondary'>".$etatCE."</h3>
											</div>
											<div class='box-informations'>
												<h3 class='box-information box-information--primary'>Message de l'assureur</h3>
												<h3 class='box-information box-information--secondary'>".$messageCE."</h3>
											</div>
										</div>
										<div class='box-separator box-separator-446'></div>
										<div class='box-constats-actions-container'>
											<div class='box-constats-action'>
												<a href='visualiserCession.php?immatriculation=".$immatriculation."'>
													<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
												</a>
											</div>
										</div>
									</div>
								";
							}
						}
						fclose($fr);
					}
					if ($fc = verificationFichier($filename."/valideCession.csv", 'r')) {
						while ($d = fgetcsv($fc, 1000, ',')) {

							if (file_exists($filename.'/'.$d[1].".json")) {
								$etatCE = $d[0];
								$messageCE = $d[2];
								$immatriculation = $d[1];
							}

							if (isset($immatriculation, $etatCE, $messageCE)) {
								echo "
									<div class='box box-446'>
										<div class='box-title-container'>
											<h2 class='box-title'>Cession : ".$immatriculation."</h2>
										</div>
										<div class='box-informations-container'>
											<div class='box-informations'>
												<h3 class='box-information box-information--primary'>Etat</h3>
												<h3 class='box-information box-information--secondary'>".$etatCE."</h3>
											</div>
											<div class='box-informations'>
												<h3 class='box-information box-information--primary'>Message de l'assureur</h3>
												<h3 class='box-information box-information--secondary'>".$messageCE."</h3>
											</div>
										</div>
										<div class='box-separator box-separator-446'></div>
										<div class='box-constats-actions-container'>
											<div class='box-constats-action'>
												<a href='visualiserCession.php?immatriculation=".$immatriculation."'>
													<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
												</a>
											</div>
										</div>
									</div>
								";
							}


						}

						

						fclose($fc);
					}


					?>

				</div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>