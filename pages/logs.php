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
        <title>Logs</title>

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
                        <h1 class="content-title">Logs des modifications</h1>
                    </div>
                </div>
                <table>
                    <thead>
                        <th>date - heure</th>
                        <th>type</th>
                        <th>par</th>
                        <th>sujet</th>
                        <th>quoi</th>
                        <th>supprimer ?</th>
                    </thead>
                    <tbody id="table-body">
                    <?php
                    if ($fl = verificationFichier("../db/logs.csv", 'r')) {

                        while ($data = fgetcsv($fl, 1000,';')) {
                            echo "
                                <tr>
                                    <td>" . $data[0] . "</td>
                                    <td>" . $data[1] . "</td>
                                    <td>" . $data[2] . "</td>
                                    <td>" . $data[3] . "</td>
                                    <td>" . $data[4] . "</td>
                                    <td><img src='../assets/svg/icons/delete.svg' class='datas-svg-l line-delete'></td>
                                </tr>
                                ";
                        }

                        fclose($fl);
                    }
                    ?>
                    </tbody>
                </table>


            </div>
        </div>

        <?php include("../layouts/footer.php"); ?>  

    </div>
    <script type="text/javascript" src="../src/table.js"></script>

</body>
</html>
