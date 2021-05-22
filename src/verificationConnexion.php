<?php 
	session_start();
	
	if ($fid = fopen("../db/identifiants.csv", 'r')) {
		while ($data = fgetcsv($fid, 1000, ';')) {
			if ($data[0] == $_POST["id"] && $data[1] == $_POST["password"]) {
				$_SESSION["identifiants"] = $data[0];
				$_SESSION['profil'] = $data[2];
				if ($data[2] == 'gestionnaire') {
					$_SESSION['assurance'] = $data[3];
				}
				$fl = fopen("../db/logs.csv", 'a+');
				$date = date('d-m-y h:i:s');
				$donnees = array(array($date, 'connexion', $_SESSION['profil'].':'.$_SESSION['identifiants'], $_SESSION['profil'].':'.$_SESSION['identifiants'], 'connexion'));
				foreach ($donnees as $element) {
					fputcsv($fl, $element, ';');
				}
				fclose($fl);
				header('Location: ../accueil.php');
				exit();
			}
		}
		fclose($fid);
	}
	header('Location: ../pages/connexion.php');
 ?>