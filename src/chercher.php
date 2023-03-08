<?php 
	session_start();

	$chaine = $_POST['chaine'];
	$tab[] = json_decode($chaine);
	$mauvais = 0;
	$essai = 0;
	$witness = array();
	$ft = fopen("../db/assure.csv", 'r');
	while ($data = fgetcsv($ft, 1000, ';')) {
		if ($_SESSION['profil'] == 'police' || $data[5] == $_SESSION['assurance']) {
			if (isset($tab[0]->nom , $tab[0]->prenom)){
				$nom = $tab[0]->nom;
				$prenom = $tab[0]->prenom;
				if ($data[0] == $nom && $data[1] == $prenom) {
					array_push($witness, array($nom, $prenom, $data[3], $data[4], $data[2], $data[5]));
					$witness_json =  json_encode($witness);
				}else{
					$mauvais = $mauvais + 1;
				}
				$essai = $essai + 1;
			}else if (isset($tab[0]->mail)) {
				$mail = $tab[0]->mail;
				if ($data[3] == $mail) {
					array_push($witness, array($data[0], $data[1], $mail, $data[4], $data[2], $data[5]));
					$witness_json =  json_encode($witness);
				}else{
					$mauvais = $mauvais + 1;
				}
				$essai = $essai + 1;
			}else if (isset($tab[0]->tel)) {
				$tel = $tab[0]->tel;
				if ($data[4] == $tel) {
					array_push($witness, array($data[0], $data[1], $data[3], $tel, $data[2], $data[5]));
					$witness_json =  json_encode($witness);
				}else{
					$mauvais = $mauvais + 1;
				}
				$essai = $essai + 1;
			}else if(isset($tab[0]->contrat)){
				$contrat = $tab[0]->contrat;
				if ($data[2] == $contrat) {
					array_push($witness, array($data[0], $data[1], $data[3], $data[4], $contrat, $data[5]));
					$witness_json =  json_encode($witness);
				}else{
					$mauvais = $mauvais + 1;
				}
				$essai = $essai + 1;
			}else{
				$witness = array_push($witness, "mauvais");
				$witness_json = json_encode($witness);
			}
		}
	}
	fclose($ft);
	if ($essai == $mauvais) {
		array_push($witness, "mauvais", $essai, $mauvais);
		$witness_json = json_encode($witness);
		echo $witness_json;
	}else{
		echo $witness_json;
	}

 ?>