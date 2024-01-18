<?php
include "C:/xampp/htdocs/www/streetFigh/model/Database.php";
include "C:/xampp/htdocs/www/streetFigh/model/personnage.php";

$personnage = new Personnage();

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the values from the form
    $personnage->name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    $personnage->atk = isset($_POST["atk"]) ? (int)$_POST["atk"] : 0;
    $personnage->life = isset($_POST["life"]) ? (int)$_POST["life"] : 0;
    $personnage->color = isset($_POST["color"]) ? trim($_POST["color"]) : "";

    // Check if the required values are provided
    if (!empty($personnage->name) && !empty($personnage->atk) && !empty($personnage->life) && !empty($personnage->color)) {
        // Attempt to add the character to the database
        $success = $personnage->addPersonnage();

        // Set session variables to store character details
        $_SESSION['character_created'] = $success;
        $_SESSION['character_name'] = $personnage->name;
        $_SESSION['character_atk'] = $personnage->atk;
        $_SESSION['character_life'] = $personnage->life;
        $_SESSION['character_color'] = $personnage->color;
    } else {
        // Handle the case where required values are missing
        echo "Veuillez fournir toutes les informations nécessaires.";
    }

        // Redirect to the create.php view
        header("Location: /www/streetFigh/view/list/modif.php");
        include "C:/xampp/htdocs/www/streetFigh/view/create/create.php";
        
        exit();
    } else {
        // Handle the case where required values are missing
        echo "Veuillez fournir toutes les informations nécessaires.";
}
