<?php 
	session_start();

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$tel = $_POST['tel'];


	$temoin = array(array($nom, $prenom, $adresse, $tel));
	$ft = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/constats/tempTemoin.csv", 'a+');
	if ($ft) {
		foreach ($temoin as $element) {
			fputcsv($ft, $element, ';');
		}
		fclose($ft);
	}


	if (!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($tel)) {
		$witness = array($nom, $prenom, $adresse, $tel);
		$witness_json =  json_encode($witness);

		echo $witness_json;
	}
?>