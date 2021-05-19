<?php
    session_start();
    require_once("../src/fonctions.php");
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact</title>

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
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
                        <h1 class="content-title">Contacter mon assurance</h1>
                    </div>
                </div>


                <div class="contact-grid">

					<div class="contact-left-container">
						<div class="contact-left-title-container">
							<h1 class="contact-title">répertoire</h1>
						</div>
						<ul class="contact-left-list">
							<li class="contact-left-name">Michel Platini (MAIF)<li>
							<li class="contact-left-name">Pascal Dupraz (Pacifica)<li>
							<li class="contact-left-name">Brandon Mac (SJF)<li>
						</ul>
					</div>

					<div class="contact-right-container">

						<div class="contact-right-top">

							<h1 class="contact-title">en relation avec :</h1>

							<div class="contact-right-top-contact-container">
                                <p class="contact-info contact-info-primary">Michel Platini (MAIF)</p>
                                <p class="contact-info contact-info-secondary">07 09 98 87 89 - michel.platini@icar.contact.fr</p>
							</div>

						</div>

                        <div class="contact-right-middle">
                            <p class="contact-message-container my-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel ipsum in nibh condimentum dapibus eu euismod augue. Nulla ut vestibulum erat. Cras nec feugiat magna. Sed sed vulputate enim.</p>
                            <p class="contact-message-container other-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>

                        <div class="contact-right-bottom">

                            <div class="contact-input-container">
                                <input type="text" id="contact-message" name="contact-message" placeholder="Votre message ..." class="contact-input" required>
                            </div>

                            <div class="contact-button-container">

                                <button type="button" class="button button--light round-button">
                                    <p class="button-text">Envoyer</p>
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

</body>
</html>
