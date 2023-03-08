<?php 
	session_start();
	$filename = '../db/InfoAssure/'.$_SESSION['identifiants'].'/cession';
	$immatriculation = $_GET['imm'];

	$donnees = array('personne' => $_POST['personne'], 'sexe' => $_POST['sexe'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'dateNaissance' => $_POST['dateNaissance'], 'adresse' => $_POST['adresse'], 'ville' => $_POST['ville'], 'cp' => $_POST['cp'], 'pays' => $_POST['pays'], 'certification' => $_POST['certification'], 'lieuSignature' => $_POST['lieuSignature'], 'dateSignature' => $_POST['dateSignature'], 'signature' => $_POST['signature']);

		$tab = file_get_contents($filename.'/'.$immatriculation.'.json');
		$array_data = json_decode($tab, true);
		array_push($array_data, $donnees);
		$data = json_encode($array_data);
		file_put_contents($filename.'/'.$immatriculation.'.json', $data);

		#traitements
		$traitements = array('cession', $immatriculation, $_SESSION['identifiants']);
		$valeurTraitement = array();
    	$ft = fopen("../db/traitements.csv", 'r');
    	while ($data= fgetcsv($ft, 1000, ';')) {
    	    if ($data[0] != "cession" && $data[1] != $immatriculation) {
    	        array_push($valeurTraitement, $data);
    	    }
    	}
    	array_push($valeurTraitement, $traitements);
    	fclose($ft);

		$ft = fopen("../db/traitements.csv", 'w');
		foreach ($valeurTraitement as $element) {
			fputcsv($ft, $element, ';');
		}
		fclose($ft);

		# logs
		$fl = fopen("../db/logs.csv", 'a+');
		$date = date('d-m-y h:i:s');
		$donnees = array(array($date, 'cession', $_SESSION['profil'].':'.$_SESSION['identifiants'], $_SESSION['profil'].':'.$_SESSION['identifiants'], 'cession de véhicule'));
		foreach ($donnees as $element) {
			fputcsv($fl, $element, ';');
		}
		fclose($fl);
		header('Location: ../accueil.php');
		exit();
 ?>
