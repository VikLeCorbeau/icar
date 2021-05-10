<?php 
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$chaineAjout = array('nom' => $nom, 'prenom' => $prenom);

$tab = file_get_contents("../db/constat/".$_SESSION['identifiants'].'.json');
$array_data = json_decode($tab, true);
array_push($array_data, $chaineAjout);
$data = json_encode($array_data);
file_put_contents("../db/constat/".$_SESSION['identifiants'].'.json', $data);


header('Location: ajoutConstat4.php');
exit();
 ?>