<?php 
include('phpqrcode/qrlib.php');
$lien = "http://localhost/icar/pages/visiteur.php";
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