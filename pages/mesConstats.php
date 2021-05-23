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
        <title>Mes constats</title>

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
                        <h1 class="content-title">Mes déclarations de constats</h1>
                    </div>
                </div>

				<div class="boxes-container">

					<?php
					$filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
					$files = glob($filename.'/*.json');
					$nombreConstat = count($files);
					$nbImage = 0;
					
					for ($i=1; $i <= $nombreConstat; $i++) { 
						
						$images = glob($filename.'/img/*.*');
						foreach ($images as $element) {
							$num = explode('-', $element)[0];
							if (substr($num, -1) == $i) {
								$nbImage = $nbImage + 1;
							}
						}

						$Json = file_get_contents("../db/InfoAssure/".$_SESSION['identifiants']."/constats/constat".$i.".json", true);
						$array = json_decode($Json, true);

						echo "
							<div class='box box-446'>
								<div class='box-title-container'>
									<h2 class='box-title'>" . $array[0]['date'] . "</h2>
								</div>
								<div class='box-informations-container'>
									<div class='box-informations'>
										<h3 class='box-information box-information--primary'>Etat</h3>
										<h3 class='box-information box-information--secondary'>A intégrer ...</h3>
									</div>
									<div class='box-informations'>
										<h3 class='box-information box-information--primary'>Images</h3>
										<h3 class='box-information box-information--secondary'>" . $nbImage . "</h3>
									</div>
									<div class='box-informations'>
										<h3 class='box-information box-information--primary'>Message de l'assureur</h3>
										<h3 class='box-information box-information--secondary'>A intégrer ...</h3>
									</div>
								</div>
								<div class='box-separator box-separator-446'></div>
								<div class='box-constats-actions-container'>
									<div class='box-constats-action'>
										<a href='visualiserConstat.php?numero='".$i.">
											<img src='../assets/svg/icons/see.svg' class='box-constats-action-svg'>
										</a>
									</div>
									<div class='box-constats-action'>
										<a href='supprimerConstat.php?numero='".$i.">
											<img src='../assets/svg/icons/delete.svg' class='box-constats-action-svg'>
										</a>
									</div>
									<div class='box-constats-action'>
										<a href='ajoutImageConstatConstat.php?numero='".$i.">
											<img src='../assets/svg/icons/insured_add_images.svg' class='box-constats-action-svg'>
										</a>
									</div>
								</div>
							</div>
						";
					}
					?>

				</div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>