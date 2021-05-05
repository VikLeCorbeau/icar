<?php 
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['telephone'];
$email = $_POST['email'];
$contrat = $_POST['contrat'];

$v = array(array($_POST['nom'],$_POST['prenom'],$_POST['telephone'],$_POST['email'],$_POST['contrat']));
if ($fa = fopen("../db/assure.csv", 'a+')) {
	foreach ($v as $element) {
		fputcsv($fa, $element,';');
	}
}
fclose($fa);
?>