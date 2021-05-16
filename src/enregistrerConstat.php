<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
	    <title>Visualiser le Constat</title>
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
    <p>Votre constat a bien été pris en compte, vous pouvez voir tous vos constats <a href="../pages/mesConstats.php">ICI</a></p>

    <?php 
        $filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
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