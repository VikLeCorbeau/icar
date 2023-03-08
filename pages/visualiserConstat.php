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
                        <h1 class="content-title">Visualisation constat</h1>
                        <h1 class="content-subtitle"><?php if (isset($_GET['assure'])) { echo $_GET['assure']; } ?></h1>
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

                    if (isset($_GET['numero'], $_GET['assure'])) {

                        $numeroConstat = $_GET['numero'];
                        $assure = $_GET['assure'];

                    }else if(isset($_GET['numero'], $_SESSION['identifiants'])){
                        $numeroConstat = $_GET['numero'];
                        $assure = $_SESSION['identifiants'];
                    }
                    if (isset($assure)) {   
                        $filename = "../db/InfoAssure/".$assure."/constats";

                        if (file_exists($filename."/constat".$numeroConstat.".json")) {
                            $Json = file_get_contents($filename."/constat".$numeroConstat.".json", true);
                            $array = json_decode($Json, true);
                        }

                        $titre1 = array("Informations générales","Votre véhicule","Véhicule tiers");
                        $titre2 = array("Informations générales","Liste des témoins","Votre véhicule","Véhicule tiers");

                        
                        for ($i=0; $i < count($array); $i++) {
                            echo "<div class='box visualisation-box'>";
                            if (count($array) == 3) {
                                echo 
                                "<div class='box-title-container'>
									<h2 class='box-title'>" . $titre1[$i] . "</h2>
								</div>";
                            }else{
                                echo 
                                "<div class='box-title-container'>
                                    <h2 class='box-title'>".$titre2[$i]."</h2>
                                </div>";
                            }

                            echo "<div class='box-informations-container'>";

                            foreach ($array[$i] as $key => $value) {

                                echo "
                                <div class='box-informations'>
                                    <h3 class='box-information box-information--primary'>" . $key . "</h3>
                                    <h3 class='box-information box-information--secondary'>" . $value . "</h3>
                                </div>
                                ";
                            }
                            echo "
                            </div>
                                </div>";
                        }

                        $images = glob($filename.'/img/*.*');
                        echo "
                            <h1 class='box-title' style='text-align: center; margin: 30px;'>Images du constat</h1>
                            <div class='grid-form'>
                            ";
                        foreach ($images as $element) {
                            $num = explode('-', $element)[0];

                            if (substr($num, -1) == $numeroConstat) {
                                echo
                                "<div class='input-container'>
                                    <img src='".$element."' class='visualisation-image'>
                                </div>
                                ";
                            }

                        }
                        echo "</div>";

                    }
                    ?>

                </div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>