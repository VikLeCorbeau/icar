<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mes Constats</title>
</head>
<body>
	<style type="text/css">
		.constat{
			width: 20%;
			margin: 50px;
			border: 1px solid black;
		}
		.all{
			width: 100%;
		}
		img{
			width: 50px;
			margin-left:40px;
		}
	</style>
	<h1>Mes déclarations de constats</h1>
	<?php 
		$filename = "../db/InfoAssure/".$_SESSION['identifiants']."/constats";
		$files = glob($filename.'/*.json');
		$nombreConstat = count($files);
		$nbImage = 0;

		echo "<div class='all'>";
		for ($i=1; $i <= $nombreConstat; $i++) { 
			
			$images = glob($filename.'/img/*.*');
	        foreach ($images as $element) {
	            $num = explode('-', $element)[0];
	            if (substr($num, -1) == $i) {
	                $nbImage = $nbImage + 1;
	            }
	        }
			echo "<div class='constat'>";
			$Json = file_get_contents("../db/InfoAssure/".$_SESSION['identifiants']."/constats/constat".$i.".json", true);
	        $array = json_decode($Json, true);
	        echo "<h2>".$array[0]['date']."</h2>";
	        echo "<hr>";
	        echo "<p>Images : ".$nbImage."</p>";
	        echo "<p>Message de l'assureur</p>";
	        echo "<hr>";
	        echo "<a href='visualiserConstat.php?numero='".$i."><img src='../db/oeil.png'></a>";
	        echo "<a href='supprimerConstat.php?numero='".$i."><img src='../db/poubelle.png'></a>";
	        echo "<a href='ajouterImageConstat.php?numero='".$i."><img src='../db/ajouter-image.png'></a>";
	        echo "</div>";
		}
		echo "</div>";
	 ?>

</body>
</html>