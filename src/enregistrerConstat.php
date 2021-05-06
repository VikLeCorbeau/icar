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

        $var = $_POST["assure"].".csv";

        $fp = fopen($var, 'w');

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