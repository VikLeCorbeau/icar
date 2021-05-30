<?php
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $immatriculation = $_POST['immatriculation'];

    $contrat = array();
    $fa = fopen("../db/InfoAssure/".$nom.$prenom."/contrats.csv", 'r');
    while ($data = fgetcsv($fa, 1000, ';')) {
        if ($data[7] != $immatriculation) {
            array_push($contrat, $data);
        }
    }
    fclose($fa);
    $fa = fopen("../db/InfoAssure/".$nom.$prenom."/contrats.csv", 'w');
    foreach ($contrat as $element) {
        fputcsv($fa, $element, ';');
    }
    fclose($fa);
    unlink("../db/InfoAssure/".$nom.$prenom."/contrat-".$nom.$prenom.$immatriculation.".png");

?>