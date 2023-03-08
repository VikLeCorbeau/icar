<?php 
	session_start();
  require_once("../src/fonctions.php");
 

$filename = "../db/InfoAssure/".$_SESSION['identifiants'];
$extension = getExtension("../db/InfoAssure/".$_SESSION['identifiants']."/changement/");

unlink($filename.'/changement/ImageChangementCoordonnees.'.$extension);


$target_dir = $filename.'/changement/';
print_r($_FILES);
$photo = explode('.',$_FILES["photo"]["name"][0]);
$target_file = $target_dir."ImageChangementCoordonnees".'.'.$photo[1];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["photo"]["tmp_name"][0]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Vous n'avez pas mis une photo";
    $uploadOk = 0;
  }
}
if (file_exists($target_file)) {
    echo "La photo que vous voulez ajouté existe déjà.";
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
	echo $target_file;
  if (move_uploaded_file($_FILES["photo"]["tmp_name"][0], $target_file)) {
    echo "Le fichier ". htmlspecialchars( basename( $_FILES["photo"]["name"][0])). " a bien été ajouté.";
  } else {
    echo "Il y a eu une erreur en ajoutant la photo.";
  }
}

#vide valideChangement
$vide=array();
$fv = fopen($filename."/changement/valideChangement.csv", 'w');
foreach ($vide as $element) {
    fputcsv($fv, $element);
}
fclose($fv);

#traitements
$traitements = array('changement', $_SESSION['identifiants']);
$valeurTraitement = array();

$ft = fopen("../db/traitements.csv", 'r');
while ($data = fgetcsv($ft, 1000, ';')) {
    if ($data[0] != "changement") {
        array_push($valeurTraitement, $data);
    }
}
array_push($valeurTraitement, $traitements);
fclose($ft);
$ft = fopen("../db/traitements.csv", 'w');
foreach ($valeurTraitement as $element) {
    fputcsv($ft, $element, ';');
}
fclose($ft);



# logs
$fl = fopen("../db/logs.csv", 'a+');
$date = date('d-m-y h:i:s');
$donnees = array(array($date, 'changements', $_SESSION['profil'].':'.$_SESSION['identifiants'], $_SESSION['profil'].':'.$_SESSION['identifiants'], 'nouveau justificatif'));
foreach ($donnees as $element) {
    fputcsv($fl, $element, ';');
}
fclose($fl);

header('Location: ../pages/mesDeclarations.php');
exit();
?>