<?php 
	session_start();
 	
 	$assure = $_POST['assure'];


 	$witness = array();
 	if ($fa = fopen("../db/InfoAssure/".$assure."/messagerie/".$_SESSION['assurance'].".csv", "a+")) {
 		while ($data = fgetcsv($fa, 1000, ':')) {
 			array_push($witness, $data);
 		}
		$witness_json =  json_encode($witness);
		echo $witness_json;
 	}
 ?>

