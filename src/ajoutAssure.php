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
$assurance = $_POST['assurance'];


$id = $prenom.'.'.$nom;
$mdp = $prenom.$nom;

$identifiant = array(array($id, $mdp, 'assure', $nom.$prenom));
$fi = fopen("../db/identifiants.csv", 'a+');
foreach ($identifiant as $element) {
	fputcsv($fi, $element, ';');
}
fclose($fi);

$assure = array(array($nom,$prenom,$contrat, $mail, $tel, $assurance));
if ($fa = fopen("../db/assure.csv", 'a+')) {
	foreach ($assure as $element) {
			fputcsv($fa, $element, ';');
		}	
}
fclose($fa);


$dossier = "../db/InfoAssure/".$nom.$prenom;
$v = array(array($id,$mdp,$nom,$prenom,$tel,$email,$adresse,$ville,$cp,$pays,$contrat,$assurance));
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
header('Location: ../pages/creerAssure.php');
exit();
?>

