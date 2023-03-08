<?php

    $date = $_POST['date'];
    $urgence = $_POST['urgence'];
    $type = $_POST['type'];
    $identite = $_POST['identite'];
    $email = $_POST['email'];
    $identifiant = $_POST['identifiant'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];

    $erreurs = array();

    if ($ft = fopen("../db/erreurs.csv", 'r')) {
        while ($data = fgetcsv($ft, 1000, ';')) {
            if ($data[0] != $date || $data[1] != $urgence || $data[2] != $type || $data[3] != $identite || $data[4] != $email || $data[5] != $identifiant || $data[6] != $titre || $data[7] != $message) {
                array_push($erreurs, $data);
            }
        }
        fclose($ft);
    }
    if ($fa = fopen("../db/erreurs.csv", 'w')) {
        foreach ($erreurs as $element) {
            fputcsv($fa, $element, ';');
        }
    }
    fclose($fa);


?>