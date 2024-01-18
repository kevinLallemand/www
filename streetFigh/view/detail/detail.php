<?php
// Include necessary files and start the session
include "C:/xampp/htdocs/www/streetFigh/model/Database.php";
include "C:/xampp/htdocs/www/streetFigh/model/personnage.php";

session_start();

// Create an instance of the Personnage class
$personnage = new Personnage();

// Check if the character ID is provided in the URL
if (isset($_GET['id'])) {
    $characterId = $_GET['id'];

    // Retrieve character details using the new method
    $characterDetails = $personnage->getPersonnageDetails($characterId);

    // Display character details
    if ($characterDetails) {
        echo "Détails du personnage:<br>";
        echo "Nom : " . htmlspecialchars($characterDetails->name) . "<br>";
        echo "ATK : " . $characterDetails->atk . "<br>";
        echo "Vie : " . $characterDetails->life . "<br>";
        echo "Couleur : " . htmlspecialchars($characterDetails->color) . "<br>";

        // Form for updating character details
        ?>
        <a href="/www/streetFigh/view/list/list.php">Retour à la liste des personnages</a>
        <form action="/www/streetFigh/controller/update.php" method="post">
            <input type="hidden" name="character_id" value="<?php echo $characterDetails->id; ?>">
            <div class="mb-3">
                <label for="new_atk" class="form-label">Nouveau ATK</label>
                <input type="number" class="form-control" id="new_atk" name="new_atk" value="<?php echo $characterDetails->atk; ?>" required>
            </div>
            <div class="mb-3">
                <label for="new_life" class="form-label">Nouvelle Life</label>
                <input type="number" class="form-control" id="new_life" name="new_life" value="<?php echo $characterDetails->life; ?>" required>
            </div>
            <div class="mb-3">
                <label for="new_color" class="form-label">Nouvelle Couleur</label>
                <input type="text" class="form-control" id="new_color" name="new_color" value="<?php echo $characterDetails->color; ?>" required>
            </div>
            <input type="hidden" name="csrf_token" value="<?php echo $personnage->generateCSRFToken(); ?>">
    
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
        <?php
    } else {
        echo "Personnage non trouvé.";
    }
} else {
    echo "ID du personnage non spécifié.";
}
?>