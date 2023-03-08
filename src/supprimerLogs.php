<?php

    $date = $_POST['date'];
    $type = $_POST['type'];
    $nom = $_POST['nom'];
    $sujet = $_POST['sujet'];
    $quoi = $_POST['quoi'];

    $logs = array();

    if ($ft = fopen("../db/logs.csv", 'r')) {
    	while ($data = fgetcsv($ft, 1000, ';')) {
    		if ($data[0] != $date || $data[1] != $type || $data[2] != $nom || $data[3] != $sujet || $data[4] != $quoi) {
    			array_push($logs, $data);
    		}
    	}
    	fclose($ft);
    }
    if ($fa = fopen("../db/logs.csv", 'w')) {
    	foreach ($logs as $element) {
    		fputcsv($fa, $element, ';');
    	}
    }
    fclose($fa);


?>