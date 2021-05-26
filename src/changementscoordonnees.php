<?php

    function supprimerFichier ($file_name)
    {
        if (file_exists($file_name)) {
            unlink($file_name);
        }
    }
    session_start();

    supprimerFichier("../db/InfoAssure/".$_SESSION["identifiants"]."/informations_temp.csv");


    $newEmail = ($_POST['newEmail']);
    $newTelephone = ($_POST['newTelephone']);
    $newAdresse = ($_POST['newAdresse']);
    $newCP = ($_POST['newCP']);
    $newVille = ($_POST['newVille']);
    $newPays = ($_POST['newPays']);

    $fa = fopen("../db/InfoAssure/".$_SESSION["identifiants"]."/informations.csv", 'r');
    while ($data = fgetcsv($fa, 1000, ';')) {
        $pays = $data[9];
        $ville = $data[7];
        $cp = $data[8];
        $adresse = $data[6];
        $tel = $data[4];
        $email = $data[5];
        $id = $data[0];
        $mdp = $data[1];
        $nom = $data[2];
        $prenom = $data[3];
        $contrat = $data[10];
        $assurance = $data[11];

    }

    fclose($fa);

    $v = array(array($id,$mdp,$nom,$prenom,$newTelephone,$newEmail,$newAdresse,$newVille,$newCP,$newPays,$contrat,$assurance));
    if ($fa = fopen("../db/InfoAssure/".$nom.$prenom."/informations_temp.csv", 'a+')) {
        foreach ($v as $element) {
            fputcsv($fa, $element,';');
        }
    }
    fclose($fa);
    

    #traitements
    $traitements = array(array('changement', $_SESSION['identifiants']));
    $ft = fopen("../db/traitements.csv", 'a+');
    foreach ($traitements as $element) {
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

