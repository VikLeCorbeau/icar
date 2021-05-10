<?php
session_start()
?>


<!DOCTYPE html>
<html>
    <head>
	    <title>Valider Constat</title>
    </head>
<body>
    <?php

        $var = $_SESSION["identifiants"].".csv";

        $fp = fopen($var, 'a+');

        $constat = array(
            array($_POST[""], $_POST[""])
        );

    foreach($constat as $fields) {
        fputcsv($fp, $fields, ";");
    }

    fclose($fp);
    ?>

</body>
</html>