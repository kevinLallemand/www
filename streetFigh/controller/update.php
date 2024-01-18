<?php 

include_once "C:/xampp/htdocs/www/streetFigh/model/personnage.php";
$personnage = new Personnage();

// Verify CSRF token
if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // Proceed with processing the form
    // ...


// Retrieve all characters
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $character_id = isset($_POST["character_id"]) ? (int)$_POST["character_id"] : 0;
    $new_atk = isset($_POST["new_atk"]) ? (int)$_POST["new_atk"] : 0;
    $new_life = isset($_POST["new_life"]) ? (int)$_POST["new_life"] : 0;
    $new_color = isset($_POST["new_color"]) ? trim($_POST["new_color"]) : "";

    if ($character_id > 0 && $new_atk > 0 && $new_life > 0 && !empty($new_color)) {
        
        $success = $personnage->updatePersonnage($character_id, $new_atk, $new_life, $new_color);

        if ($success) {
            
            // Redirect to the updated character's details page or another appropriate page
            header("Location: /www/streetFigh/view/list/modif.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour du personnage.";
        }
    } else {
        echo "Veuillez fournir des valeurs valides pour la mise à jour.";
    }
}
} else {
    // Handle CSRF token mismatch
    echo "CSRF token mismatch. Access denied.";
}