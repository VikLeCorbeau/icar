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

        <title>Gestionnaire</title>

        <link rel="icon" href="../assets/svg/logo/icon.svg">
        
        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">

    </head>
<body>

    <div class="main-container">

        <?php include("../layouts/navigation.php"); ?> 

        <div class="container-1440">
            <div class="content-container content-column">

                <div class="content-banner"> 
                    <div class="content-titles-container">
                        <h1 class="content-title">Gestionnaire - Menu</h1>
                    </div>
                </div>


                <div class="menu-container menu-3">

						<div class="menu-buttons-container">

                            <a href="mesAssures.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_see_insured.svg">
                                        <p class="menu-button-text">voir mes assurés</p>
                                    </div>
                                </div>
                            </a>

                            <a href="traitements.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_treatment.svg">
                                        <p class="menu-button-text">traitement en attente</p>
                                    </div>
                                </div>
                            </a>

                            <a href="creerAssure.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_add_insured.svg">
                                        <p class="menu-button-text">ouvrir un compte assuré</p>
                                    </div>
                                </div>
                            </a>

                            <a href="contacterAssure.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_contact.svg">
                                        <p class="menu-button-text">voir mes messages</p>
                                    </div>
                                </div>
                            </a>

                            <a href="creerContrat.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_add_contract.svg">
                                        <p class="menu-button-text">ajouter un contrat</p>
                                    </div>
                                </div>
                            </a>



						</div>


                        <div class="menu-illustration-container">
                            <img class="menu-illustration" src="../assets/svg/illustrations/Illustration_gestionnaire.svg">
                        </div>

					</div> 


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>
