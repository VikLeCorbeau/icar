<?php 
	session_start();
	$message = $_POST['message'];
	$assure = $_POST['assure'];
	$mess = array(array("assureur",$message));
	$fm = fopen("../db/InfoAssure/".$assure."/messagerie/".$_SESSION['assurance'].".csv", 'a+');
	foreach ($mess as $element) {
		fputcsv($fm, $element, ':');
	}
	fclose($fm);
	echo $message;
 ?>