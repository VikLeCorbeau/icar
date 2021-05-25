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

?>