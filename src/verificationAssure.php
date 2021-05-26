<?php 
	session_start();
	$assure = $_POST['assure'];
	$verif = 'mauvais';
	$fa = fopen("../db/assure.csv", 'r');
	while ($data = fgetcsv($fa, 1000, ';')) {
		if ($assure == $data[0].$data[1]) {
			$verif = 'bon';
		}
	}
	echo $verif;
	fclose($fa);
 ?>