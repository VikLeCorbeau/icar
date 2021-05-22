<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGS</title>
</head>
<body>
	<h1>Logs des modifications</h1>
	<table>
		<thead>
			<th>DATE - HEURE</th>
			<th>TYPE</th>
			<th>PAR</th>
			<th>SUJET</th>
			<th>QUOI</th>
			<th></th>
		</thead>
		<?php  
			$fl = fopen('../db/logs.csv', 'r');
			while ($data = fgetcsv($fl, 1000, ';')) {
				echo "<tr>";
				echo "<td>".$data[0]."</td>";
				echo "<td>".$data[1]."</td>";
				echo "<td>".$data[2]."</td>";
				echo "<td>".$data[3]."</td>";
				echo "<td>".$data[4]."</td>";
				echo "<td>SUPPRIMER</td>";
				echo "</tr>";
			}
			fclose($fl);
		?>

</table>
</body>
</html>