<?php 
	session_start();
	$numero = $_GET['numero'];
	$assure = $_GET['assure'];
	$valide = $_GET['valide'];
	if ($valide == 0) {
		$fc = fopen("../db/InfoAssure/".$assure."/constats/valideConstat.csv", 'a+');
		fputcsv($fc, array("Validé", $numero, "constat Validé"));
		fclose($fc);

		$traitement=array();
		$ft = fopen("../db/traitements.csv", 'r');
		while ($data = fgetcsv($ft, 1000, ';')) {
			if ($data[0] != 'constat' || $data[1] != $numero) {
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
		$fc = fopen("../db/InfoAssure/".$assure."/constats/valideConstat.csv", 'a+');
		fputcsv($fc, array("Refusé", $numero, "Constat refusé, contacter votre assureur"));
		fclose($fc);

		$traitement=array();
		$ft = fopen("../db/traitements.csv", 'r');
		while ($data = fgetcsv($ft, 1000, ';')) {
			if ($data[0] != 'constat' || $data[1] != $numero) {
				array_push($traitement, $data);
			}
		}
		fclose($ft);
		$ft = fopen("../db/traitements.csv", 'w');
		foreach ($traitement as $value) {
			fputcsv($ft, $value, ';');
		}
		fclose($ft);
	}
	header('Location: ../pages/traitements.php');
	exit();
 ?>

