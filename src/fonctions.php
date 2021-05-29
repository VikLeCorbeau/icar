<?php

    function verificationFichier($cheminFichier, $mode)
    {
        $reponse = false;

        if (file_exists($cheminFichier)) {
            if ($fichier = fopen($cheminFichier, $mode)) {
                $reponse = $fichier;
            }
        }

        return $reponse;
    }

    function verificationType(array $typeAutorises) 
    {
        $pass = false;

        if (isset($_SESSION['profil'])) {

            foreach ($typeAutorises as $typeAutorise) {

                if ($_SESSION['profil'] === $typeAutorise) {
                    $pass = true;
                }

            }
            
        }

        if (!$pass) {
            header('Location: ../accueil.php');
            exit();
        }
    }

    function getAssures ()
    {
        $assures = array();

        if ($fichierAssures = fopen("../db/assure.csv", 'r')) {
            while ($datas = fgetcsv($fichierAssures, 1000, ';')) {
                $assure = [
                    "nom" => $datas[0],
                    "prenom" => $datas[1],
                    "identifiant" => $datas[0] . $datas[1],
                    "assurance" => $datas[5],
                ];
                array_push($assures, $assure);
            }
            fclose($fichierAssures);
        }

        return $assures;
    }

?>