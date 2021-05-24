<?php 
	session_start();
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Rechercher un assure</title>
 	<link rel="icon" type="image/png" href="../assets/svg/logo/logo_2.png">
 </head>
 <body>
 	<h1>Recherche d'assure</h1>
 	<div>
 		<p>Nom : <input type="text" name="nom" id="nom"></p>
 		<p>Prénom : <input type="text" name="prenom" id="prenom"></p>
 		<p>Numéro de téléphone : <input type="text" name="tel" id="tel"></p>
 		<p>Adresse mail : <input type="mail" name="mail" id="mail"></p>
 		<p>Numéro de contrat : <input type="text" name="contrat" id="contrat"></p>
 		<p><input type="button" value="Rechercher" onclick="rechercher()"></p>
 	</div>
 	<div>
 		<table border="1px">
 			<thead>
 				<th>Nom</th>
 				<th>Préom</th>
 				<th>E-mail</th>
 				<th>Numéro de téléphone</th>
 				<th>Numéro de contrat</th>
 				<th>Nom Assurance</th>
 			</thead>
 			<tbody id="affichage">
 			</tbody>	
 		</table>
 	</div>
 	<p id="erreur"></p>
 	<script type="text/javascript">
 		function rechercher(){
 			document.getElementById('affichage').innerHTML = "";
 			document.getElementById('erreur').innerHTML = "";
 			nom = document.getElementById('nom').value;
 			prenom = document.getElementById('prenom').value;
 			mail = document.getElementById('mail').value;
 			tel = document.getElementById('tel').value;
 			contrat = document.getElementById('tel').value;
 			if (nom !== "" || prenom !== "") {
 				element = {'nom':nom, 'prenom':prenom};
 				params = JSON.stringify(element);
 			}else if (mail !== "") {
 				element = {'mail':mail};
 				params = JSON.stringify(element);
 			}else if (tel !== "") {
 				element = {'tel':tel};
 				params = JSON.stringify(element);
 			}else if (contrat !== "") {
 				element = {'contrat':contrat};
 				params = JSON.stringify(element);
 			}
 			let xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function(){
		        if (this.readyState==4 && this.status==200) {
		        	console.log(this.responseText);
			        let infos = JSON.parse(this.responseText);
		        	if(infos[0] == "mauvais"){
		        		document.getElementById('erreur').innerHTML = "Pas de résultat pour votre recherche";
		        	}else{
			        	liste = document.getElementById('affichage');
			            for(let i = 0; i<infos.length; i++){
			            	tr = document.createElement('tr');
				            let champ = infos[i];
			            	for(let j = 0; j<champ.length; j++){
				            	let element = document.createElement("td");
				            	tr.appendChild(element);
				            	tr.cells[j].appendChild(document.createTextNode(champ[j]));
			            	}
			            	liste.appendChild(tr);
			            }
			        }
		        }
		    };
		    xhttp.open("POST", "../src/chercher.php", true);
		    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhttp.send("chaine="+params);
 		}

 	</script>
 </body>
 </html>