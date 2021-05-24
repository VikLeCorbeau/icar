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
        <title>Erreurs signalées</title>
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
                        <h1 class="content-title">Erreurs signalées</h1>
                    </div>
                </div>


                <div class="datas-grid" id="witness-grid" style="grid-template-columns: repeat(9, 1fr);" data-row="99">

                    <span class="datas-title">date</span>
                    <span class="datas-title">urgence</span>
                    <span class="datas-title">type</span>
                    <span class="datas-title">identité</span>
                    <span class="datas-title">e-mail</span>
                    <span class="datas-title">identifiant</span>
                    <span class="datas-title">titre</span>
					<span class="datas-title">message</span>
                    <span class="datas-title">supprimer ?</span>

					<?php
						if ($fl = verificationFichier("../db/erreurs.csv", 'r')) {
							$i = 0;

							while ($data = fgetcsv($fl, 1000,';')) {
								echo "
								<span class='datas-data' id='". $i ."'>". $data[0] ."</span>
								<span class='datas-data' id='". $i ."'>". $data[1] ."</span>
								<span class='datas-data' id='". $i ."'>". $data[2] ."</span>
								<span class='datas-data' id='". $i ."'>". $data[3] ."</span>
                                <span class='datas-data' id='". $i ."'>". $data[4] ."</span>        
                                <span class='datas-data' id='". $i ."'>". $data[5] ."</span>        
                                <span class='datas-data' id='". $i ."'>". $data[6] ."</span>        
								<span class='datas-data' id='". $i ."'>". $data[7] ."</span>        
								<span class='datas-data' id='". $i ."'>
									<img src='../assets/svg/icons/delete.svg' class='datas-svg' id='". $i ."'>
								</span>
								";
							}

							fclose($fl);
						}
					?>

				</div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>