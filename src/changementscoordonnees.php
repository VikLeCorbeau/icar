<?php

    function supprimerFichier ($file_name)
    {
        if (file_exists($file_name)) {
            unlink($file_name);
        }
    }
    session_start();

    $filename = "../db/InfoAssure/".$_SESSION['identifiants'];
    supprimerFichier($filename."/changement/informations_temp.csv");
    if (file_exists($filename.'/changement/valideChangement.csv')) {
        unlink($filename.'/changement/valideChangement.csv');
    }

    $newEmail = ($_POST['newEmail']);
    $newTelephone = ($_POST['newTelephone']);
    $newAdresse = ($_POST['newAdresse']);
    $newCP = ($_POST['newCP']);
    $newVille = ($_POST['newVille']);
    $newPays = ($_POST['newPays']);

    $fa = fopen($filename."/informations.csv", 'r');
    while ($data = fgetcsv($fa, 1000, ';')) {
        $pays = $data[7];
        $ville = $data[5];
        $cp = $data[6];
        $adresse = $data[4];
        $tel = $data[2];
        $email = $data[3];
        $nom = $data[0];
        $prenom = $data[1];
        $contrat = $data[8];
        $assurance = $data[9];

    }

    fclose($fa);

    $v = array(array($nom,$prenom,$newTelephone,$newEmail,$newAdresse,$newVille,$newCP,$newPays,$contrat,$assurance));
    if ($fa = fopen($filename."/changement/informations_temp.csv", 'w')) {
        foreach ($v as $element) {
            fputcsv($fa, $element,';');
        }
    }
    fclose($fa);



    $target_dir = $filename.'/changement/';
    print_r($_FILES["photo"]["name"][0]);
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
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
          echo "Désolé, est accepté seulement les fichiers : .png, .jpg et .jpeg";
          $uploadOk = 0;
        }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Désolé, votre photo n'a pas pu être ajouté.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["photo"]["tmp_name"][0], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["photo"]["name"][0])). " a bien été ajouté.";
      } else {
        echo "Il y a eu une erreur en ajoutant la photo.";
      }
    }

    

    #traitements
    $traitements = array('changement', $_SESSION['identifiants']);
    $valeurTraitement = array();
    $ft = fopen("../db/traitements.csv", 'r');
    while ($data= fgetcsv($ft, 1000, ';')) {
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
    $donnees = array(array($date, 'changements', $_SESSION['profil'].':'.$_SESSION['identifiants'], $_SESSION['profil'].':'.$_SESSION['identifiants'], 'changement de coordonnées'));
    foreach ($donnees as $element) {
        fputcsv($fl, $element, ';');
    }
    fclose($fl);

    header('Location: ../accueil.php');
    exit();
?>

