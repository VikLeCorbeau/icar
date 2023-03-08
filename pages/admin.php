<?php
    session_start();
    require_once("../src/fonctions.php");

    verificationType(array('admin'));
?>

<!DOCTYPE html>
<html>
    <head>    
    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>

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
                        <h1 class="content-title">Admin - Menu</h1>
                    </div>
                </div>


                <div class="menu-container menu-3">

						<div class="menu-buttons-container">

                            <a href="logs.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_logs.svg">
                                        <p class="menu-button-text">voir les logs des modifications</p>
                                    </div>
                                </div>
                            </a>

                            <a href="listeErreurs.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_errors.svg">
                                        <p class="menu-button-text">voir les erreurs signalées</p>
                                    </div>
                                </div>
                            </a>

                            <a href="creerGestionnaire.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_add_insured.svg">
                                        <p class="menu-button-text">ajouter un gestionnaire</p>
                                    </div>
                                </div>
                            </a>

                        </div>


                    <div class="menu-illustration-container">
                        <img class="menu-illustration" src="../assets/svg/illustrations/illustration_admin.svg">
                    </div>

				</div> 


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>
