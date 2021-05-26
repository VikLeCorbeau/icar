<?php
    session_start();
    require_once("../src/fonctions.php");

    verificationType(array('assure'));
?>

<!DOCTYPE html>
<html>
    <head>    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assuré</title>

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
                        <h1 class="content-title">Menu - Assuré</h1>
                    </div>

                </div>    

					<div class="menu-container">

						<div class="menu-buttons-container">

                            <a href="../src/ajoutConstat1.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_constats.svg">
                                        <p class="menu-button-text">déclarer un constat</p>
                                    </div>
                                </div>
                            </a>

                            <a href="declarer_changementcoordonnees.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/insured_coordinates.svg">
                                        <p class="menu-button-text">changer mes coordonnées</p>
                                    </div>
                                </div>
                            </a>

                            <a href="mesContrats.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_see_contracts.svg">
                                        <p class="menu-button-text">voir mes contrats d’assurance</p>
                                    </div>
                                </div>
                            </a>

                            <a href="certificatCession1.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_sell_car.svg">
                                        <p class="menu-button-text">je vends mon véhicule</p>
                                    </div>
                                </div>
                            </a>

                            <a href="contacterassurance.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_contact.svg">
                                        <p class="menu-button-text">contacter mon assurance</p>
                                    </div>
                                </div>
                            </a>

                            <a href="mesDeclarations.php">
                                <div class="menu-button-container">
                                    <div class="menu-button">
                                        <img class="menu-button-svg" src="../assets/svg/menu_icons/menu_see_constats.svg">
                                        <p class="menu-button-text">mes déclarations</p>
                                    </div>
                                </div>
                            </a>

						</div>

						<div class="menu-illustration-container">
							<img class="menu-illustration" src="../assets/svg/illustrations/illustration_insured.svg">
						</div>

					</div>

					

                </div>

            </div>
        </div>

		<?php include("../layouts/footer.php"); ?>  

    </div> 

</body>
</html>
