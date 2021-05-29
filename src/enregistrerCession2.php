<?php 
	session_start();
	$filename = '../db/InfoAssure/'.$_SESSION['identifiants'].'/cession';
	$immatriculation = $_GET['imm'];

	$donnees = array('personne' => $_POST['personne'], 'sexe' => $_POST['sexe'], 'nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'dateNaissance' => $_POST['dateNaissance'], 'adresse' => $_POST['adresse'], 'ville' => $_POST['ville'], 'cp' => $_POST['cp'], 'pays' => $_POST['pays'], 'certification' => $_POST['certification'], 'dateCession' => $_POST['dateCession'], 'heureCession' => $_POST['heureCession'], 'certif' => $_POST['certif'], 'lieuSignature' => $_POST['lieuSignature'], 'dateSignature' => $_POST['dateSignature'], 'signature' => $_POST['signature']);

		$tab = file_get_contents($filename.'/'.$immatriculation.'.json');
		$array_data = json_decode($tab, true);
		array_push($array_data, $donnees);
		$data = json_encode($array_data);
		file_put_contents($filename.'/'.$immatriculation.'.json', $data);
		header('Location: ../pages/certificatCession3.php?imm='.$immatriculation);
		exit();
?>
