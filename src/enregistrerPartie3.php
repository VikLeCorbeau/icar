<?php 
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
$files = glob($filename.'/*.json');
$numeroConstat = count($files);
if ($_POST['remorque'] == 'oui') {
    $chaineAjout = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'adresse' => $_POST['adresse'].','.$_POST['cp'].','.$_POST['ville'].','.$_POST['pays'], 'telephone' => $_POST['tel'], 'email' => $_POST['email'],'marque' => $_POST['marque'],'immatriculation' => $_POST['immatriculation'],'paysImm' => $_POST['paysImm'],'remorque' => $_POST['remorque'],'immatriculationRemorque' => $_POST['immatriculationR'],'paysImm' => $_POST['paysImmR'],'assurance' => $_POST['assurance'],'numContrat' =>$_POST['numContrat'], 'numCarteVerte' => $_POST['numCV'],'dateValidite' => $_POST['dateValidite'],'agence' => $_POST['agence'],'degatMateriel'=>$_POST['degat'],'nom' => $_POST['nomC'], 'prenom' => $_POST['prenomC'], 'adresse' => $_POST['adresseC'].','.$_POST['cpC'].','.$_POST['villeC'].','.$_POST['paysC'], 'telephone' => $_POST['telC'], 'email' => $_POST['emailC'],'numeroPermis' => $_POST['numPermis'], 'Categorie' => $_POST['categorie'], 'datePermis' => $_POST['datePermis'], 'Circonstance' => $_POST['circonstance'], 'degatsApparents' => $_POST['degatsObservation'], 'Observations' => $_POST['observation']);
}else{
     $chaineAjout = array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'adresse' => $_POST['adresse'].','.$_POST['cp'].','.$_POST['ville'].','.$_POST['pays'], 'telephone' => $_POST['tel'], 'email' => $_POST['email'],'marque' => $_POST['marque'],'immatriculation' => $_POST['immatriculation'],'paysImm' => $_POST['paysImm'],'remorque' => $_POST['remorque'],'assurance' => $_POST['assurance'],'numContrat' =>$_POST['numContrat'], 'numCarteVerte' => $_POST['numCV'],'dateValidite' => $_POST['dateValidite'],'agence' => $_POST['agence'],'degatMateriel'=>$_POST['degat'],'nom' => $_POST['nomC'], 'prenom' => $_POST['prenomC'], 'adresse' => $_POST['adresseC'].','.$_POST['cpC'].','.$_POST['villeC'].','.$_POST['paysC'], 'telephone' => $_POST['telC'], 'email' => $_POST['emailC'],'numeroPermis' => $_POST['numPermis'], 'Categorie' => $_POST['categorie'], 'datePermis' => $_POST['datePermis'], 'Circonstance' => $_POST['circonstance'], 'degatsApparents' => $_POST['degatsObservation'], 'Observations' => $_POST['observation']);
}

$tab = file_get_contents($filename.'/constat'.$numeroConstat.'.json');
$array_data = json_decode($tab, true);
array_push($array_data, $chaineAjout);
$data = json_encode($array_data);
file_put_contents($filename.'/constat'.$numeroConstat.'.json', $data);


header('Location: ajoutConstat4.php');
exit();
 ?>