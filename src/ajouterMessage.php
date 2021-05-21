<?php 
	session_start();
	$message = $_POST['message'];
	$assureur = $_POST['assureur'];
	$mess = array(array("me",$message));
	$fm = fopen("../db/InfoAssure/".$_SESSION['identifiants']."/messagerie/".$assureur.".csv", 'a+');
	foreach ($mess as $element) {
		fputcsv($fm, $element, ':');
	}
	fclose($fm);
	echo $message;
 ?>