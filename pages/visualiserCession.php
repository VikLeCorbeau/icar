<?php
    session_start();
    require_once("../src/fonctions.php");
    verificationType(array('gestionnaire', 'assure'));

    if (isset($_GET['immatriculation'], $_GET['assure'])) {
         $immatriculation = $_GET['immatriculation'];
         $assure = $_GET['assure'];
    }else if(isset($_GET['immatriculation'], $_SESSION['identifiants'])){
        $immatriculation = $_GET['immatriculation'];
        $assure = $_SESSION['identifiants'];
    }
                    
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualisation cession</title>

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
                        <h1 class="content-title">Visualisation cession</h1>
                        <h1 class="content-subtitle"><?php if (isset($assure)) {echo $assure;} ?></h1>
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
                    if (isset($assure)) {  
                        $filename = "../db/InfoAssure/".$assure."/cession";

                        if (file_exists($filename."/".$immatriculation.".json")) {

                            $Json = file_get_contents($filename."/".$immatriculation.".json", true);
                            $array = json_decode($Json, true);
                            $titre = array("Informations générales du véhicule","ancien propriétaire","Nouveau propriétaire");

                            
                            for ($i=0; $i < count($array); $i++) {
                                echo "<div class='box visualisation-box'>";
                                    echo 
                                    "<div class='box-title-container'>
                                        <h2 class='box-title'>" . $titre[$i] . "</h2>
                                    </div>";

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
                            foreach ($images as $element) {
                                $num = explode('-', $element)[0];
                                if (substr($num, -1) == $numeroConstat) {
                                    echo "<img src='".$element."'>";
                                }
                            }

                        }
                    }
                    ?>

                </div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 
</body>
</html>