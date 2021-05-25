<?php 
	session_start();
	include('../phpqrcode/qrlib.php');
	$ancienneImm = $_GET['AncienneImm'];
	$nom = $_POST['nomConducteur'];
	$prenom = $_POST['prenomConducteur'];
	$adresse = $_POST['adresse'];
	$cp = $_POST['codePostal'];
	$ville = $_POST['ville'];
	$pays = $_POST['pays'];
	$tel = $_POST['telephone'];
	$email = $_POST['mail'];
	$nomAssurance = $_POST['assurance'];
	$numeroAssurance = $_POST['numeroContrat'];
	$immatriculation = $_POST['immatriculation'];
	$dateValidite = $_POST['validite'];
	$modele = $_POST['modele'];
	$typeA = $_POST['typeAssurance'];
	$bonus = $_POST['bonus'];
	$paiement = $_POST['paiement'];

	unlink("../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$ancienneImm.".png");

	$lien = "http://localhost/Projet_Car/icar/pages/visiteur.php?assure=".$nom.$prenom."&immatriculation=".$immatriculation;
	QRcode::png($lien, "../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png");


	$contrat = array();

	$f = fopen("../db/InfoAssure/".$nom.$prenom."/contrats.csv", 'r');
	while ($data = fgetcsv($f, 1000, ';')) {
		if ($data[7] != $immatriculation && $ancienneImm != $immatriculation) {
			array_push($contrat, $data);
		}
	}
	fclose($f);

	array_push($contrat, array($nom,$prenom,$adresse.','.$ville.','.$cp.','.$pays,$tel,$email,$nomAssurance,$numeroAssurance,$immatriculation,$dateValidite,$modele,$typeA,$bonus,$paiement));
	$f = fopen("../db/InfoAssure/".$nom.$prenom."/contrats.csv", 'w');
	foreach ($contrat as $element) {
		fputcsv($f, $element, ';');
	}
	fclose($f);
	$fl = fopen("../db/logs.csv", 'a+');
	$date = date('d-m-y h:i:s');
	$donnees = array(array($date, 'contrat', $_SESSION['profil'].':'.$_SESSION['identifiants'], 'assure:'.$prenom.$nom, 'modification contrat'));
	foreach ($donnees as $element) {
		fputcsv($fl, $element, ';');
	}
	fclose($fl);
 	header('Location: ../pages/visualiserContrats.php?assure='.$nom.$prenom.'&immatriculation='.$immatriculation.'&voiture='.$voiture);
 	exit();
 ?>