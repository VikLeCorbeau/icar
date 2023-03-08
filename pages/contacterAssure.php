<?php
    session_start();
    require_once("../src/fonctions.php");

    verificationType(array('gestionnaire'));
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>

        <link rel="icon" href="../assets/svg/logo/icon.svg">

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">
        <link href="../css/contact.css" rel="stylesheet">

    </head>
<body>

    <div class="main-container">

        <?php include("../layouts/navigation.php"); ?> 

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner"> 
                    <div class="content-titles-container">
                        <h1 class="content-title">Contacter Assurés</h1>
                    </div>
                </div>

                <div class="grid-form" style="margin-bottom: 20px;">
                    <div class="input-container" style="grid-column: span 2;">
                        <p id="erreur" class="error"></p>
                    </div>
                </div>

                <div class="contact-grid">

                    <div class="contact-left-container">
                        <div class="contact-left-title-container">
                            <h1 class="contact-title">répertoire</h1>
                        </div>
                        <ul class="contact-left-list" id="nom">
                            <?php
                                $assures = getAssures();

                                foreach ($assures as $assure) {
                                    if ($assure['assurance'] === $_SESSION['assurance']) {
                                        $messageAssurance = "../db/InfoAssure/".$assure['identifiant']."/messagerie/" . $assure['assurance'] . ".csv";
                                        fopen($messageAssurance, "a");
                                        echo "<li class='contact-left-name' onclick='affichage(this.textContent)'>" . $assure['identifiant'] ."</li>";
                                    }
                                }

                             ?>
                        </ul>
                    </div>

                    <div class="contact-right-container">

                        <div class="contact-right-top">

                            <h1 class="contact-title">en relation avec :</h1>

                            <div class="contact-right-top-contact-container">
                                <p class="contact-info contact-info-primary" id="first"></p>
                                <p class="contact-info contact-info-secondary" id="second"></p>
                            </div>

                        </div>

                        <div class="contact-right-middle" id="discussion">
                        </div>

                        <div class="contact-right-bottom">

                            <div class="contact-input-container">
                                <input type="text" id="contact-message" name="contact-message" placeholder="Votre message ..." class="contact-input" required>
                            </div>

                            <div class="contact-button-container">

                                <button type="button" class="button button--light round-button" onclick="envoyer()">
                                    <p class="button-text" id="text-contact">Envoyer</p>
                                    <img class="button-svg" src="../assets/svg/icons/back.svg" style="transform: rotate(90deg);">
                                </button>

                            </div>

                        </div>

                    </div>

                </div>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 
    <script type="text/javascript">
        function nouveauMessage(){
            assure = document.getElementById('NMessage').value;
            liste = document.getElementById("nom");
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState==4 && this.status==200) {
                    if (this.responseText == 'bon') {
                        let li = document.createElement("li");
                        let text = document.createTextNode(assure);
                        li.className = "contact-left-name";
                        li.setAttribute("onclick", "affichage(this.textContent)");
                        li.appendChild(text);
                        liste.appendChild(li);
                        document.getElementById('erreur').innerHTML = "";
                    }else if (this.responseText == 'mauvais') {
                        document.getElementById('erreur').innerHTML = "Cet assuré n'existe pas";
                    }
                }
            };
            xhttp.open("POST", "../src/verificationAssure.php",true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("assure="+assure);  
        }
        function envoyer(){
            texte = document.getElementById("contact-message").value;
            discussion = document.getElementById("discussion");
            assure = document.getElementById("first").textContent;
            if (assure == "") {
                document.getElementById('erreur').innerHTML = "Veuillez sélectionner l'assurance avant d'envoyer un message"
            }else{
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if (this.readyState==4 && this.status==200) {
                        let message = document.createElement("p");
                        message.className = "contact-message-container my-message";
                        message.innerHTML = this.responseText;
                        discussion.appendChild(message);
                    }
                };  
                xhttp.open("POST", "../src/ajouterMessageGestionnaire.php",true);
                xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhttp.send("message="+texte+"&assure="+assure);
                document.getElementById('contact-message').value = null;
            }
        }
        function affichage(assure){
            document.getElementById("first").innerHTML = assure;
            document.getElementById("second").innerHTML = assure+"@icar.contact.fr";
            discussion = document.getElementById("discussion");
            document.getElementById('erreur').innerHTML = "";
            while(discussion.firstChild){
                discussion.removeChild(discussion.firstChild);
            }
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState==4 && this.status==200) {
                    let affichage = JSON.parse(this.responseText);
                    for (var i = 0; i < affichage.length; i++) {
                        if(affichage[i][0] == "assureur"){
                            let message = document.createElement("p");
                            message.className = "contact-message-container my-message";
                            message.innerHTML = affichage[i][1];
                            discussion.appendChild(message);
                        }else if (affichage[i][0] == "me") {
                            let message = document.createElement("p");
                            message.className = "contact-message-container other-message";
                            message.innerHTML = affichage[i][1];
                            discussion.appendChild(message);
                        }
                    }
                }
            };  
            xhttp.open("POST", "../src/afficherMessagesGestionnaire.php",true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("assure="+assure);
        }
    </script>

</body>
</html>
