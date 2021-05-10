<?php 
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$tel = $_POST['tel'];
$temoin = array(array($nom, $prenom, $adresse, $tel));

$ft = fopen("../db/constat/tempTemoin.csv", 'a+');
foreach ($temoin as $element) {
	fputcsv($ft, $element, ';');
}
fclose($ft);
echo $nom."  ".$prenom."  -  ".$adresse."  ".$tel;


?>