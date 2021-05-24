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
        <title>Logs</title>

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
                        <h1 class="content-title">Logs des modifications</h1>
                    </div>
                </div>


                <div class="datas-grid" id="witness-grid" style="grid-template-columns: repeat(6, 1fr);" data-row="99">

                    <span class="datas-title">date - heure</span>
                    <span class="datas-title">type</span>
                    <span class="datas-title">par</span>
                    <span class="datas-title">sujet</span>
					<span class="datas-title">quoi</span>
                    <span class="datas-title">supprimer ?</span>

					<?php
						if ($fl = verificationFichier("../db/logs.csv", 'r')) {
							$i = 0;

							while ($data = fgetcsv($fl, 1000,';')) {
								echo "
								<span class='datas-data' id='". $i ."'>". $data[0] ."</span>
								<span class='datas-data' id='". $i ."'>". $data[1] ."</span>
								<span class='datas-data' id='". $i ."'>". $data[2] ."</span>
								<span class='datas-data' id='". $i ."'>". $data[3] ."</span>
								<span class='datas-data' id='". $i ."'>". $data[4] ."</span>        
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
