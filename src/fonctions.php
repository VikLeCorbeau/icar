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

    function verifExistVoiture($assure){

        $voiture = false;

        if ($fa = verificationFichier("../db/InfoAssure/".$_SESSION['identifiants']."/contrats.csv", 'r')) {
            while ($data = fgetcsv($fa, 1000, ';')) {
                if (isset($data[7])) {
                    $voiture = true;
                }
            }
            fclose($fa);
        } else if (!file_exists("../db/InfoAssure/".$assure."/contrats.csv")){
            $voiture = false;
        }

        return $voiture;
    }

    function getExtension ($filename) {

        $filesPNG = glob($filename.'*.PNG');
        $filespng = glob($filename.'*.png');

        $filesJPG = glob($filename.'*.JPG');
        $filesjpg = glob($filename.'*.jpg');

        $filesJPEG = glob($filename.'*.JPEG');
        $filesjpeg = glob($filename.'*.jpeg');

        if (!empty($filesPNG)) {
            $image = "PNG";
        }else if (!empty($filesJPG)) {
            $image = "JPG";
        }else if (!empty($filesJPEG)) {
            $image = "JPEG";
        }else if (!empty($filespng)) {
            $image = "png";
        }else if (!empty($filesjpg)) {
            $image = "jpg";
        }else if (!empty($filesjpeg)) {
            $image = "jpeg";
        }
                        
        return $image;
    }
?>