<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>    
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assuré</title>

        <link href="../css/generics.css" rel="stylesheet">
        <link href="../css/visiteur.css" rel="stylesheet">
        <link href="../css/boxes.css" rel="stylesheet">
        <link href="../css/form.css" rel="stylesheet">

        <script type="text/javascript" src=""></script>
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

					<div class="menu-container">

						<div class="menu-buttons-container">

							<div class="menu-button-container">
								<div class="menu-button">
									<img class="menu-button-svg" src="../assets/svg/menu_icons/menu_constats.svg">
									<p class="menu-button-text">Déclarer un constat</p>
								</div>
							</div>

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
