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

?>