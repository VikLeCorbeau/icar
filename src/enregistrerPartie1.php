<?php 
session_start();

$date = $_POST['date'];
$heure = $_POST['heure'];
$loca = $_POST['localisation'];
$degat = $_POST['degat'];
$blesse = $_POST['blesse'];


$chaineAjout = array(array('date' => $date, 'heure' => $heure, 'localisation' => $loca, 'degat' => $degat, 'blesse' => $blesse));

$tab = file_get_contents("../db/constat/".$_SESSION['identifiants'].'.json');
$array_data = json_decode($tab, true);
$data = json_encode($chaineAjout);
file_put_contents("../db/constat/".$_SESSION['identifiants'].'.json', $data);


$ft = fopen("../db/constat/tempTemoin.csv", 'r');
while ($data = fgetcsv($ft, 1000, ';')) {
	$tab = file_get_contents("../db/constat/".$_SESSION['identifiants'].'.json');
	$array_data = json_decode($tab, true);
	array_push($array_data, array('nom' => $data[0], 'prenom' => $data[1], 'adresse' => $data[2], 'telephone' => $data[3]));
	$data = json_encode($array_data);
	file_put_contents("../db/constat/".$_SESSION['identifiants'].'.json', $data);
}
fclose($ft);




header('Location: ajoutConstat2.php');
exit();
?>