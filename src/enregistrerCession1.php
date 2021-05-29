<?php 
	session_start();
	$filename = '../db/InfoAssure/'.$_SESSION['identifiants'].'/cession';


	$immatriculation = $_POST['immatriculation'];
	$identification = $_POST['identification'];
	$date = $_POST['date'];
	$marque = $_POST['marque'];
	$type = $_POST['type'];
	$genre = $_POST['genre'];
	$denomination = $_POST['denomination'];
	$kilometrage = $_POST['kilometrage'];
	$certificat = $_POST['certificat'];
	$observation = $_POST['observation'];
	$donnees = array(array('immatriculation' => $immatriculation, 'identification' => $identification, 'date' => $date, 'marque' => $marque, 'type' => $type, 'genre' => $genre, 'denomination' => $denomination, 'kilometrage' => $kilometrage, 'certificat' => $certificat, 'observation' => $observation));

	$fv = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r');
	while ($data = fgetcsv($fv, 1000, ';')) {
		echo $data[7].' '.$data[9];
		if ($data[7] == $immatriculation && $data[9] == $marque) {
			$tab = file_get_contents($filename.'/'.$immatriculation.'.json');
			$array_data = json_decode($tab, true);
			$data = json_encode($donnees);
			file_put_contents($filename.'/'.$immatriculation.'.json', $data);
			
			header('Location: ../pages/certificatCession2.php?imm='.$immatriculation);
			exit();
		}
	}
	header('Location: ../pages/certificatCession1.php');
	exit();
	fclose($fv);

?>