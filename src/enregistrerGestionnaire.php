<?php

    require_once("../src/fonctions.php");

    if (isset($_POST['identifiant'], $_POST['mdp'], $_POST['assurance'])) {

        $identifiant = $_POST['identifiant'];
        $mdp = $_POST['mdp'];
        $assurance = $_POST['assurance'];

        $string = htmlentities($assurance, null, 'utf-8');
        $assurance = str_replace("&nbsp;", " ", $string);
        $assurance = html_entity_decode($assurance);

        var_dump($assurance);

        $tablauGestionnaire = array(array($identifiant, $mdp, "gestionnaire", $assurance));

        if ($fichierIdentifiants = verificationFichier("../db/identifiants.csv", 'a+')) {
            foreach ($tablauGestionnaire as $nouveauGestionnaire) {
                fputcsv($fichierIdentifiants, $nouveauGestionnaire, ';');
            }
            fclose($fichierIdentifiants);
        }

    }

    header('Location: ../accueil.php');

?>
