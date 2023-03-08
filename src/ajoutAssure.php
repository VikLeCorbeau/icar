<?php 
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$tel = $_POST['telephone'];
$email = $_POST['email'];
$contrat = $_POST['contrat'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$cp = $_POST['CP'];
$pays = $_POST['pays'];
$contrat = $_POST['contrat'];
$assurance = $_SESSION['assurance'];


$id = $nom.$prenom;
$mdp = $prenom.$nom;

$identifiant = array(array($id, $mdp, 'assure', $assurance));
$fi = fopen("../db/identifiants.csv", 'a+');
foreach ($identifiant as $element) {
	fputcsv($fi, $element, ';');
}
fclose($fi);

$assure = array(array($nom,$prenom,$contrat, $email, $tel, $assurance));
if ($fa = fopen("../db/assure.csv", 'a+')) {
	foreach ($assure as $element) {
			fputcsv($fa, $element, ';');
		}	
}
fclose($fa);


$dossier = "../db/InfoAssure/".$nom.$prenom;
$v = array(array($nom,$prenom,$tel,$email,$adresse,$ville,$cp,$pays,$contrat,$assurance));
mkdir($dossier, 0777, true);

if ($fa = fopen("../db/InfoAssure/".$nom.$prenom."/informations.csv", 'a+')) {
	foreach ($v as $element) {
		fputcsv($fa, $element,';');
	}
}
fclose($fa);
$fl = fopen("../db/logs.csv", 'a+');
$date = date('d-m-y h:i:s');
$donnees = array(array($date, 'assuré', $_SESSION['profil'].':'.$_SESSION['identifiants'], 'assure:'.$nom.$prenom , "ajout d'un assuré"));
foreach ($donnees as $element) {
	fputcsv($fl, $element, ';');
}
fclose($fl);
mkdir("../db/InfoAssure/".$nom.$prenom."/constats", 0777);
mkdir("../db/InfoAssure/".$nom.$prenom."/cession", 0777);
mkdir("../db/InfoAssure/".$nom.$prenom."/messagerie", 0777);
mkdir("../db/InfoAssure/".$nom.$prenom."/changement", 0777);
if (file_exists("../db/InfoAssure/".$nom.$prenom."/constats")) {
	mkdir("../db/InfoAssure/".$nom.$prenom."/constats/img");
}

header('Location: ../pages/mesAssures.php');
exit();
?>

