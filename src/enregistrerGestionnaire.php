<?php

    require_once("../src/fonctions.php");

    if (isset($_POST['identifiant'], $_POST['mdp'], $_POST['assurance'])) {

        $identifiant = $_POST['identifiant'];
        $mdp = $_POST['mdp'];
        $assurance = $_POST['assurance'];

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