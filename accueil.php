<?php
	session_start();

	if (!isset($_SESSION['identifiants'])) {
		header('Location: pages/connexion.php');
		exit();
	} else {

		switch ($_SESSION['profil']) {
			case "visiteur":
					header('Location: pages/visiteur.php');
					exit();
				break;
			
			case "assure":
				header('Location: pages/assure.php');
				exit();
			break;

			case "police":
				header('Location: pages/visualisationPolice.php');
				exit();
			break;

			case "gestionnaire":
				header('Location: pages/gestionnaire.php');
				exit();
			break;

			case "admin":
				header('Location: pages/admin.php');
				exit();
			break;
		}

	}

?>
