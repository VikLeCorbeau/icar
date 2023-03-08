<?php 
session_start();
require_once("fonctions.php");

$filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";


$files = glob($filename.'/*.json');
$compteur = count($files);
$numeroConstat = $compteur + 1;

$date = $_POST['date'];
$heure = $_POST['heure'];
$loca = $_POST['localisation'];
$degat = $_POST['degat'];
$blesse = $_POST['blesse'];


$chaineAjout = array(array('date' => $date, 'heure' => $heure, 'localisation' => $loca, 'degat' => $degat, 'blesse' => $blesse));

$tab = file_get_contents($filename.'/constat'.$numeroConstat.'.json');
$array_data = json_decode($tab, true);
$data = json_encode($chaineAjout);
file_put_contents($filename.'/constat'.$numeroConstat.'.json', $data);


if ($ft = verificationFichier($filename."/tempTemoin.csv", 'r')) {
	while ($data = fgetcsv($ft, 1000, ';')) {
		$tab = file_get_contents($filename.'/constat'.$numeroConstat.'.json');
		$array_data = json_decode($tab, true);
		array_push($array_data, array('nom' => $data[0], 'prenom' => $data[1], 'adresse' => $data[2], 'telephone' => $data[3]));
		$data = json_encode($array_data);
		file_put_contents($filename.'/constat'.$numeroConstat.'.json', $data);
	}
	fclose($ft);
	unlink($filename.'/tempTemoin.csv');
}else{
	$tab = file_get_contents($filename.'/constat'.$numeroConstat.'.json');
	$array_data = json_decode($tab, true);
	array_push($array_data,array("Il n'y a pas de témoin"));
	$data = json_encode($array_data);
	file_put_contents($filename.'/constat'.$numeroConstat.'.json', $data);
}



header('Location: ajoutConstat2.php');
exit();
?>