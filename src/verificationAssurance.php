<?php 
	session_start();
	$assurance = $_POST['assurance'];
	$verif = 'mauvais';
	$fa = fopen("../db/assurance.csv", 'r');
	while ($data = fgetcsv($fa, 1000, ';')) {
		if ($assurance == $data[0]) {
			$verif = 'bon';
		}
	}
	echo $verif;
	fclose($fa);
 ?>