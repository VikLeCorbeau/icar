<?php 
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['telephone'];
$email = $_POST['email'];
$contrat = $_POST['contrat'];
$adresse = $_POST['adresse'];
$cp = $_POST['CP'];
$pays = $_POST['pays'];
$contrat = $_POST['contrat'];


$id = $prenom.'.'.$nom;
$mdp = $prenom.$nom;

$identifiant = array(array($id, $mdp, 'assure'));
$fi = fopen("../db/identifiants.csv", 'a+');
foreach ($identifiant as $element) {
	fputcsv($fi, $element, ';');
}
fclose($fi);
$assure = array(array($nom,$prenom,$contrat));
if ($fa = fopen("../db/assure.csv", 'a+')) {
	foreach ($assure as $element) {
			fputcsv($fa, $element, ';');
		}	
}
fclose($fa);


$dossier = "../db/InfoAssure/".$nom.$prenom;
$v = array(array($id, $mdp, $nom ,$prenom,$tel,$email,$adresse, $cp, $pays,$contrat));
mkdir($dossier, 0777, true);

if ($fa = fopen("../db/InfoAssure/".$nom.$prenom."/informations.csv", 'a+')) {
	foreach ($v as $element) {
		fputcsv($fa, $element,';');
	}
}
fclose($fa);

header('Location: ../pages/creerAssure.php');
exit();
?>