<?php 
	session_start();
	
	if ($fid = fopen("identifiants.csv", 'r')) {
		while ($data = fgetcsv($fid, 1000, ';')) {
			if ($data[0] == $_POST["id"] && $data[1] == $_POST["password"]) {
				$_SESSION["identifiants"] = $data[0];
				header('Location: accueil.php');
				exit();
			}
		}
		fclose($fid);
	}
	header('Location; connexion.php');
 ?>