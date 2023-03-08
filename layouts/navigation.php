

    <div class="nav-container <?php if (!isset($_SESSION['profil'])) {
        echo "nav-no-border";
    } ?>">
    <div class="nav-container-1440">

        <div class="nav-logo-container">

            <div class="mobile-name-container" id="mobile-name">
                <svg aria-hidden="true" class="mobile-name-svg">
                    <?php 
                        switch ($_SESSION['profil']) {
                            case "assure":?>
                                <use xlink:href="../assets/svg/type/type.svg#type_insured"></use>
                            <?php break;
                            case "police":?>
                                <use xlink:href="../assets/svg/type/type.svg#type_police"></use>
                            <?php break;
                            case "gestionnaire":?>
                                <use xlink:href="../assets/svg/type/type.svg#type_gestionnaire"></use>
                                <?php break;
                            case "admin":?>
                                <use xlink:href="../assets/svg/type/type.svg#type_admin"></use>
                                <?php break;
                        }
                    ?>
                </svg>
                <p class="mobile-name-text">
                    <?php 
                        if (isset($_SESSION['identifiants'], $_SESSION['profil'])) {
                            if ($_SESSION['profil'] != "visiteur") {
                                echo ($_SESSION['identifiants']);  
                            }
                        } 
                    ?>
                </p>

            </div>

            <a href="../accueil.php">
                <svg aria-hidden="true" class="logo" id="nav-logo">
                    <use xlink:href="../assets/svg/logo/logo.svg#logo"></use>
                </svg>
            </a>
        </div>

        <?php if (isset($_SESSION['profil'])) { ?>
        
            <div class="nav-right-container">

                <?php if ($_SESSION['profil'] === 'police' || $_SESSION['profil'] === 'gestionnaire') { ?>

                    <!--<div class="nav-search-container">
                        <div class="nav-search">
                            <label class="nav-search-label" for="site-search"></label>
                            <input class="nav-search-input" type="search" id="site-search" name="site-search"
                                aria-label="Rechercher ..." placeholder="Rechercher ...">
                            <button class="nav-search-button" type="submit" id=button-search>
                                <img src="../assets/svg/icons/search.svg">
                            </button>
                        </div>
                    </div>-->

                    

                <?php } ?>

                <div class="nav-side-container">

                    <div class="nav-side-links-container">

                    <?php if ($_SESSION['profil'] === 'police' || $_SESSION['profil'] === 'gestionnaire') { ?>

                        <div class="nav-side-link-container search-container">
                            <a href="../pages/recherche.php">
                                <div class="nav-side-link"> 
                                    <p class="nav-side-svg-text">Rechercher</p>
                                    <img src="../assets/svg/icons/search.svg" class="search-svg">
                                </div>
                            </a>
                        </div>
                        
                        <div class="burger-menu-container" style="margin-right : 25px;">
                            <a href="../pages/recherche.php">
                                <div class="nav-side-link" id="burger-search">
                                    <img src="../assets/svg/icons/search.svg" class="burger-menu-svg">
                                </div>
                            </a>
                        </div>

                    <?php } ?>

                        <?php if ($_SESSION['profil'] === "assure" || $_SESSION['profil'] === "gestionnaire" || $_SESSION['profil'] === "admin") { ?>

                            <div class="nav-side-link-container">

                                    <div class="nav-side-link">
                                        <p class="nav-side-svg-text">Actions</p>
                                        <img src="../assets/svg/icons/down_arrow.svg" class="nav-side-arrow">
                                    </div>

                                    <div class="nav-side-link-dropdown-container">
                                        <ul class="nav-side-link-dropdown-ul">
                                            <?php 
                                            switch ($_SESSION['profil']) {
                                                case "assure":?>
                                                    <li class="nav-side-link-dropdown-li"><a href="../src/ajoutConstat1.php">Déclarer un constat</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/mesContrats.php">Voir mes contrats d'assurance</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/certificatCession1.php">Je vends mon véhicule</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/contacterassurance.php">Contacter mon assurance</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/mesDeclarations.php">Mes déclarations</a></li>
                                                <?php break;
                                                case "gestionnaire":?>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/mesAssures.php">Voir mes assurés</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/contacterAssure.php">Voir mes messages</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/traitements.php">Voir les traitements en attente</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/creerAssure.php">Ouvrir un nouveau compte assuré</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/creerContrat.php">Ajouter un contrat d'assurance</a></li>
                                                    <?php break;
                                                case "admin":?>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/logs.php">Logs de modifications</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/listeErreurs.php">Erreurs signalées</a></li>
                                                    <li class="nav-side-link-dropdown-li"><a href="../pages/creerGestionnaire.php">Ajouter un gestionnaire</a></li>
                                                    <?php break;
                                            }
                                            ?>
                                        </ul> 
                                    </div>

                                            
                            </div>              

                        <?php } ?>

                        <?php if ($_SESSION['profil'] !== "visiteur") { ?>

                            <div class="burger-menu-container">
                                <div class="nav-side-link">
                                    <img src="../assets/svg/icons/burger_menu.svg" class="burger-menu-svg" id="burger-open">
                                    <img src="../assets/svg/icons/quit.svg" class="burger-menu-svg" id="burger-close" style="display: none;">
                                </div>
                            </div>

                        <?php } ?>

                        <div class="nav-side-link-container">

                            <div class="nav-side-link">
                                <svg aria-hidden="true" class="nav-side-svg">
                                    <?php 
                                        switch ($_SESSION['profil']) {
                                            case "assure":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_insured"></use>
                                            <?php break;
                                            case "police":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_police"></use>
                                            <?php break;
                                            case "gestionnaire":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_gestionnaire"></use>
                                                <?php break;
                                            case "admin":?>
                                                <use xlink:href="../assets/svg/type/type.svg#type_admin"></use>
                                                <?php break;
                                        }
                                    ?>
                                </svg>
                                <p class="nav-side-svg-text">
                                    <?php 
                                        if (isset($_SESSION['identifiants'], $_SESSION['profil'])) {
                                            if ($_SESSION['profil'] != "visiteur") {
                                                echo ($_SESSION['identifiants']);  
                                            }
                                        } 
                                    ?>
                                </p>

                            </div>

                            <?php if ($_SESSION['profil'] !== 'visiteur') { ?>
                            <div class="nav-side-link-dropdown-container">
                                <ul class="nav-side-link-dropdown-ul">
                                    <?php 
                                        if ($_SESSION['profil'] === 'assure') { ?>    
                                        <li class="nav-side-link-dropdown-li"><a href="../pages/declarer_changementcoordonnees.php">Changer mes coordonnées</a></li>
                                    <?php } ?>
                                      
                                    <li class="nav-side-link-dropdown-li"><a href="../src/deconnexion.php">Déconnexion</a></li>
                                    
                                </ul> 
                            </div>
                            <?php } ?>

                        </div>

                        
                        <?php if ($_SESSION['profil'] === 'visiteur') { ?>

                            <div class="nav-side-link-container-no-mobile">
                                
                            <div class="nav-side-link">
                                <img src="../assets/svg/icons/signin.svg">
                            </div>

                            <p class="nav-side-svg-text">
                                <a href='../src/deconnexion.php' style='margin-left: 10px;'>Connexion</a>
                            </p>

                            </div>

                        <?php } ?>

                    </div>
                    
                </div>

            </div>

        <?php } ?>

    </div>
</div>


    <div class="nav-mobile-container" id="mobile-hover">
        <div class="nav-mobile-center">
        <?php 
            if (isset($_SESSION['profil'])) {

                switch ($_SESSION['profil']) {
                    case "assure":?>
                        <a href="../src/ajoutConstat1.php"><p class="nav-mobile-button">Déclarer un constat</p></a>
                        <a href="../pages/mesContrats.php"><p class="nav-mobile-button">Voir mes contrats d'assurance</p></a>
                        <a href="../pages/certificatCession1.php"><p class="nav-mobile-button">Je vends mon véhicule</p></a>
                        <a href="../pages/contacterassurance.php"><p class="nav-mobile-button">Contacter mon assurance</p></a>
                        <a href="../pages/mesDeclarations.php"><p class="nav-mobile-button">Mes déclarations de constat</p></a>
                        <a href="../pages/declarer_changementcoordonnees.php"><p class="nav-mobile-button">Changer mes coordonnees</p></a>
                    <?php break;
                    case "gestionnaire":?>
                        <a href="../pages/mesAssures.php"><p class="nav-mobile-button">Voir mes assurés</p></a>
                        <a href="../pages/"><p class="nav-mobile-button">Voir mes messages</p></a>
                        <a href="../pages/traitements.php"><p class="nav-mobile-button">Voir les traitements en attente</p></a>
                        <a href="../pages/creerAssure.php"><p class="nav-mobile-button">Ouvrir un nouveau compte assuré</p></a>
                        <a href="../pages/creerContrat.php"><p class="nav-mobile-button">Ajouter un contrat d'assurance</p></a>
                        <?php break;
                    case "admin":?>
                        <a href="../pages/logs.php"><p class="nav-mobile-button">Logs de modifications</p></a>
                        <a href="../pages/listeErreurs.php"><p class="nav-mobile-button">Erreurs signalées</p></a>
                        <?php break;
                }

                echo "<a href='../src/deconnexion.php'><p class='nav-mobile-button nav-mobile-button--yellow'>Déconnexion</p></a>";

        } else { ?>

            <a href="../pages/connexion.php">
                <p class="nav-mobile-button nav-mobile-button--yellow">
                    Connexion
                </p>
            </a>

        <?php } ?>

        </div>
        
    </div>



<script src="../assets/js/nav.js"></script>