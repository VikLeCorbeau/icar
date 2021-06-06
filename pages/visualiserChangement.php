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
                    </div>
                    <div class="back-container">
                        <a href="<?php 
                        if (isset($_SESSION['profil'])) {
                            if ($_SESSION['profil'] === 'assure') {
                                echo "mesDeclarations.php";
                            } elseif ($_SESSION['profil'] === 'gestionnaire') {
                                echo "traitements.php";
                            }
                        }
                        ?>">
                            <img src="../assets/svg/icons/back.svg">
                       </a>
                    </div>
                </div>

                <div class="visualisation-container">



                    <?php
                    if (isset($_GET['assure'])) {
                    	$assure = $_GET['assure'];
                    }else{
                    	$assure = $_SESSION['identifiants'];
                    }
                    $filename = "../db/InfoAssure/".$assure;
                    if (file_exists($filename."/changement/informations_temp.csv")) {
                    	$file = $filename."/changement/informations_temp.csv";
                    }else if(file_exists($filename."/informations.csv")){
                        $file = $filename."/informations.csv";
                    }
                    if (isset($assure)) {
                        $fi = fopen($file, 'r');
                        while ($data = fgetcsv($fi, 1000, ';')) {
                            echo "<div class='box visualisation-box'>";
                                echo 
                                "<div class='box-title-container'>
									<h2 class='box-title'>" . $assure . "</h2>
								</div>";
                            echo "<div class='box-informations-container'>";
                            echo "
                                <div class='box-informations'>
									<h3 class='box-information box-information--primary'>Nom :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[0] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Prénom :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[1] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Téléphone :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[2] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Adresse mail :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[3] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Adresse :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[4] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Ville :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[5] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Code postal :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[6] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Pays :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[7] . "</h3>
								</div>
								
								<div class='box-informations'>
									<h3 class='box-information box-information--primary'>Numéro de contrat :</h3>
									<h3 class='box-information box-information--secondary'>" . $data[8] . "</h3>
								</div>
                            ";
                            echo "
                            </div>
                                </div>
                                
                                </div>";
                        }

                        $image = getExtension("../db/InfoAssure/".$assure."/changement/");
                        
                        echo "
                            <h1 class='box-title' style='text-align: center; margin: 30px;'>Justificatif de domicile</h1>
                            <div class='grid-form'>
                                <div class='input-container'>
                                    <img src='../db/InfoAssure/".$assure."/changement/ImageChangementCoordonnees.".$image."' class='visualisation-image'>
                                </div>
                            </div>
                        ";
                    }
                    ?>




            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>