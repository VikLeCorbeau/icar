<?php
    session_start();

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];


    $temoin = array();
    if ($ft = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/constats/tempTemoin.csv", 'r')) {
    	while ($data = fgetcsv($ft, 1000, ';')) {
    		if ($data[0] != $nom || $data[1] != $prenom || $data[2] != $adresse || $data[3] != $tel) {
    			array_push($temoin, $data);
    		}
    	}
    	fclose($ft);
    }
    if ($fa = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/constats/tempTemoin.csv", 'w')) {
    	foreach ($temoin as $element) {
    		fputcsv($fa, $element, ';');
    	}
    }
    fclose($fa);


?>