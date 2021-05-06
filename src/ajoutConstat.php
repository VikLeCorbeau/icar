<?php
session_start()
?>

<!DOCTYPE html>
<html>
    <head>
	    <title>Ajouter Constat</title>
    </head>
<body>
    <h1>Ajouter Constat</h1>

    <form action = "enregistrerConstat.php" method="POST">

    <select name = "assure" id="assure">
	<?php

        if (($handle = fopen("../db/assure.csv", "r"))){
            while (($data = fgetcsv($handle, 1000, ";"))){
                echo "<option value=".$data[0].$data[1].">".$data[0]." ".$data[1]."</option>";
            }
        }
    ?>
    </select>
   <!--mettre le forme du constat  -->
    </form>
</body>
</html>