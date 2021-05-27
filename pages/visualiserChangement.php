<?php 
	session_start();

    require_once("../src/fonctions.php");

    verificationType(array('gestionnaire', 'assure'));
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualisation constat</title>

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
                        <h1 class="content-title">Visualisation Changement de coordonnées</h1>
                        <h1 class="content-subtitle"><?php echo $_SESSION['identifiants']; ?></h1>
                    </div>
                </div>


                <div class="boxes-container">

                    <?php
                    $assure = $_SESSION['identifiants'];
                    $filename = "../db/InfoAssure/".$assure;
                    if (file_exists($filename."/informations_temp.csv")) {
                    	$file = $filename."/informations_temp.csv";
                    }else if(file_exists($filename."/informations.csv")){
                        $file = $filename."/informations.csv";
                    }
                    if (isset($assure)) {
                        $fi = fopen($file, 'r');
                        while ($data = fgetcsv($fi, 1000, ';')) {
                            echo "<div class='box box-446'>";
                                echo 
                                "<div class='box-title-container'>
									<h2 class='box-title'>" . $assure . "</h2>
								</div>";
                            echo "<div class='box-informations-container'>";
                            echo "
                            <div class='box-informations'>
                                <h3 class='box-information box-information--primary'>" . $data[0] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[1] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[2] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[3] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[4] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[5] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[6] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[7] . "</h3><br>
                                <h3 class='box-information box-information--primary'>" . $data[8] . "</h3><br>
                            </div>
                            ";
                            echo "
                            </div>
                                </div>";
                        }
                        echo "<img src='../db/InfoAssure/".$_SESSION['identifiants']."/ImageChangementCoordonnees.png'>";
                    }
                    ?>

                </div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>