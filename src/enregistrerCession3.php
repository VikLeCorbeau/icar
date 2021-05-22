<?php 
	session_start();
	$filename = '../db/InfoAssure/'.$_SESSION['identifiants'].'/cession';
	$immatriculation = $_GET['imm'];

	$donnees = array('personne' => $_POST['personne'], 'sexe' => $_POST['sexe'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'dateNaissance' => $_POST['dateNaissance'], 'adresse' => $_POST['adresse'], 'ville' => $_POST['ville'], 'cp' => $_POST['cp'], 'name' => $_POST['name'], 'pays' => $_POST['pays'], 'certification' => $_POST['certification'], 'lieuSignature' => $_POST['lieuSignature'], 'dateSignature' => $_POST['dateSignature'], 'signature' => $_POST['signature']);

		$tab = file_get_contents($filename.'/'.$immatriculation.'.json');
		$array_data = json_decode($tab, true);
		array_push($array_data, $donnees);
		$data = json_encode($array_data);
		file_put_contents($filename.'/'.$immatriculation.'.json', $data);


		#traitements
		$traitements = array(array('cession', $immatriculation, $_SESSION['identifiants'], ));
		$ft = fopen("../db/traitements.csv", 'a+');
		foreach ($traitements as $element) {
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