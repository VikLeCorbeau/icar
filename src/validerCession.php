<?php 
	session_start();
	$assure = $_GET['assure'];
	$immatriculation = $_GET['immatriculation'];
	$valide = $_GET['valide'];

	if ($valide == 0) {
		$fc = fopen("../db/InfoAssure/".$assure."/cession/valideCession.csv", 'a+');
		fputcsv($fc, array("Validé", $immatriculation, "cession du véhicule validée"));
		fclose($fc);

		$traitement=array();
		$ft = fopen("../db/traitements.csv", 'r');
		while ($data = fgetcsv($ft, 1000, ';')) {
			if ($data[0] != 'cession' || $data[1] != $immatriculation) {
				array_push($traitement, $data);
			}
		}
		fclose($ft);
		$ft = fopen("../db/traitements.csv", 'w');
		foreach ($traitement as $value) {
			fputcsv($ft, $value, ';');
		}
		fclose($ft);
		$contrats = array();
		$fc = fopen("../db/InfoAssure/".$assure."/contrats.csv", 'r');
		while ($data = fgetcsv($fc, 1000, ';')) {
			if ($data[7] != $immatriculation) {
				array_push($contrats, $data);
			}
		}
		fclose($fc);
		$fc = fopen("../db/InfoAssure/".$assure."/contrats.csv", 'w');
		foreach ($contrats as $element) {
			fputcsv($fc, $element, ';');
		}
		fclose($fc);
		unlink("../db/InfoAssure/".$assure."/contrat-".$assure.$immatriculation.".png");
		unlink("../phpqrcode/contrat-".$assure.$immatriculation.'png-errors.txt');
	}else if ($valide == 1) {
		$fc = fopen("../db/InfoAssure/".$assure."/cession/valideCession.csv", 'a+');
		fputcsv($fc, array("Refusé", $immatriculation, "cession du véhicule refusée"));
		fclose($fc);

		$traitement=array();
		$ft = fopen("../db/traitements.csv", 'r');
		while ($data = fgetcsv($ft, 1000, ';')) {
			if ($data[0] != 'cession' || $data[1] != $immatriculation) {
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