<?php 
session_start();
 ?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>Changements de coordonnées</title>
 </head>
 <body>
    <h1>Changements de coordonnées</h1>
    <h2>Vos coordonnées</h2>
    <form action="updateCoord">
        <p>Adresse mail <input type="text" name="nom" required></p> 
        <p>Téléphone <input type="text" name="prenom" required></p>
        <p>Ville <input type="text" name="ville" required></p>
        <p>Adresse <input type="text" name="adresse" required></p>
        <p>Code Postal <input type="text" name="code postal" required></p>
        <p>Pays <input type="text" name="pays" required></p>
    </form>

    <div class="rCol"> 
     <div id ="prv" style="height:auto; width:auto; float:left; margin-bottom: 28px; margin-left: 200px;"></div>
       </div>
    <div class="rCol" style="clear:both;">

    <label > Upload Photo : </label> 
    <input type="file" id="file" name='file' onChange=" return submitForm();">
    <input type="hidden" id="filecount" value='0'>
 </body>
 </html>