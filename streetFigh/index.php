<?php

use App\Autoloader;

include "model/Autoloader.php";
Autoloader::register();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetFigh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!-- TETE DE PAGE-->
    <?php Autoloader::loadFile("view/navbar/navbar.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_GET["home"])) {
                include "view/home/home.php";
                
                }else if (isset($_GET["create"])) {
                    include "controller/create.php";
                    include "view/create/create.php";

                } else if (isset($_GET["figTest"])) {
                    include_once "controller/figTest.php";
                    include_once "view/figTest/figTest.php";
                    
                } else if (isset($_GET["list"])) {
                    include_once "controller/list.php";
                    include_once "view/list/list.php";
                    
                }else if (isset($_GET["modif"])) {
                    include_once "controller/update.php";
                    include_once "view/modif/modif.php";
                    
                }
            

                ?>
            </div>
        </div>
    </div>
    <footer>
        <!-- PIED DE PAGE -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>