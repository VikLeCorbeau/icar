<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
	    <title>Visualiser le Constat</title>
        <link rel="icon" type="image/png" href="../assets/svg/logo/logo_2.png">
    </head>
<body>
    <style type="text/css">
        div{
            width: 50%;
            text-align: center;
            margin-left: 10%;
            border: 1px solid black;
        }
        img{
            width: 100px;
        }
    </style>
    <?php 
        $numeroConstat = $_GET['numero'];
        $assure = $_GET['assure'];
        $filename = "../db/InfoAssure/".$assure."/constats";
        $numeroConstat = $_GET['numero'];
        $Json = file_get_contents($filename."/constat".$numeroConstat.".json", true);
        $array = json_decode($Json, true);
        $titre1 = array("Informations générales","Votre véhicule","Véhicule tiers");
        $titre2 = array("Informations générales","Liste des témoins","Votre véhicule","Véhicule tiers");
        echo "<div>";
        for ($i=0; $i < count($array); $i++) {
            if (count($array) == 3) {
                echo "<h1>".$titre1[$i]."</h1>";
            }else{
                echo "<h1>".$titre2[$i]."</h1>";
            }
            foreach ($array[$i] as $key => $value) {
                echo $key.' : '.$value.'<br>';
            }
            echo "<hr>";
        }
        $images = glob($filename.'/img/*.*');
        foreach ($images as $element) {
            $num = explode('-', $element)[0];
            if (substr($num, -1) == $numeroConstat) {
                echo "<img src='".$element."'>";
            }
        }
        echo "</div>";
    ?>
</body>
</html>