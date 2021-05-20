<?php 
	session_start();
 	
 	$assureur = $_POST['assureur'];


 	$witness = array();
 	if ($fa = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/messagerie/".$assureur.".csv", "a+")) {
 		while ($data = fgetcsv($fa, 1000, ':')) {
 			array_push($witness, $data);
 		}
		$witness_json =  json_encode($witness);
		echo $witness_json;
 	}
 ?>

