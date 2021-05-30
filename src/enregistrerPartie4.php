<?php 
session_start();

$filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats/";

$files = glob($filename.'*.json');
$numeroConstat = count($files);

for ($i=0; $i < count($_FILES["photo"]["name"]); $i++) { 		
	echo "<br>";
	$target_dir = $filename.'img/';
	$photo = explode('.',$_FILES["photo"]["name"][$i]);
	$target_file = $target_dir.$numeroConstat.'-imageConstat'.$i.'.'.$photo[1];
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["photo"]["tmp_name"][$i]);
	  if($check !== false) {
	    $uploadOk = 1;
	  } else {
	    $uploadOk = 0;
	  }
	}
	if (file_exists($target_file)) {
		$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		  echo "Désolé, est accepté seulement les fichiers : .png, .jpg et .jpeg";
		  $uploadOk = 0;
		}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "Désolé, votre photo n'a pas pu être ajouté.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["photo"]["tmp_name"][$i], $target_file)) {
	    echo "Le fichier ". htmlspecialchars( basename( $_FILES["photo"]["name"][$i])). " a bien été ajouté.";
	  } else {
	    echo "Il y a eu une erreur en ajoutant la photo.";
	  }
	}
}

#traitements
$traitements = array(array('constat', $numeroConstat, $_SESSION['identifiants']));
/*$ft = fopen("../db/traitements.csv", 'r');
while ($data= fgetcsv($ft, 1000, ';')) {
    if ($numeroConstat != $data[1]) {
        array_push($valeurTraitement, $data);
    }
}
array_push($valeurTraitement, $traitements);
fclose($ft);*/

$ft = fopen("../db/traitements.csv", 'a');
foreach ($traitements as $element) {
	fputcsv($ft, $element, ';');
}
fclose($ft);

#logs
$fl = fopen("../db/logs.csv", 'a+');
$date = date('d-m-y h:i:s');
$donnees = array(array($date, 'constat', $_SESSION['profil'].':'.$_SESSION['identifiants'], $_SESSION['profil'].':'.$_SESSION['identifiants'], 'nouvelle déclaration de constat'));
foreach ($donnees as $element) {
	fputcsv($fl, $element, ';');
}
fclose($fl);
header('Location: ../accueil.php');
exit();
?>