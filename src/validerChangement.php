<?php 
	session_start();
	require_once("../src/fonctions.php");

	$assure = $_GET['assure'];
	$valide = $_GET['valide'];
	function supprimerFichier ($file_name){
	    if (file_exists($file_name)) {
	        unlink($file_name);
	    }
	}

	if ($valide == 0) {
		$fc = fopen("../db/InfoAssure/".$assure."/changement/valideChangement.csv", 'w');
		fputcsv($fc, array("Validé", "changement de coordonnées Validé"));
		fclose($fc);
		
		rename('../db/InfoAssure/'.$assure.'/changement/informations_temp.csv' , '../db/InfoAssure/'.$assure.'/informations.csv');
		
		$traitement=array();
		$ft = fopen("../db/traitements.csv", 'r');
		while ($data = fgetcsv($ft, 1000, ';')) {
			if ($data[0] != 'changement') {
				array_push($traitement, $data);
			}
		}
		fclose($ft);
		$ft = fopen("../db/traitements.csv", 'w');
		foreach ($traitement as $value) {
			fputcsv($ft, $value, ';');
		}
		fclose($ft);

	}else if ($valide == 1) {
		$fc = fopen("../db/InfoAssure/".$assure."/changement/valideChangement.csv", 'w');
		fputcsv($fc, array("Refusé", "changement de coordonnées refusé"));
		fclose($fc);		

	 	$traitement=array();

		if ($ft = verificationFichier("../db/traitements.csv", 'r')) {
			while ($data = fgetcsv($ft, 1000, ';')) {
				if ($data[0] != 'changement') {
					array_push($traitement, $data);
				}
			}
			fclose($ft);
		}

		if ($ft = fopen("../db/traitements.csv", 'w')) {
			foreach ($traitement as $value) {
				fputcsv($ft, $value, ';');
			}
			fclose($ft);
		}
		
	}
	header('Location: ../pages/traitements.php');
	exit();
 ?>