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

