<?php 
include('phpqrcode/qrlib.php');
<<<<<<< HEAD
$lien = "http://localhost/icar/pages/visiteur.php";
=======
$lien = "localhost/Projet_Car/icar/pages/visteur.php";
>>>>>>> 446a1eca480fe6a03812a255009744b4ce55010f
QRcode::png($lien, 'image-qrcode.png');
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Qr code</title>
	<script type="text/javascript" src="../src/visiteur.js"></script>
 </head>
 <body>
 	<p>Le qrCode de la page est : </p>
 	<img src="image-qrcode.png" width="150px">
 </body>
 </html>