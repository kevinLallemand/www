<?php

// Check if the character has been successfully created
if (isset($_SESSION['character_created']) && $_SESSION['character_created']) {
    // Retrieve the values from the session
    $name = isset($_SESSION["character_name"]) ? htmlspecialchars($_SESSION["character_name"]) : "";
    $atk = isset($_SESSION["character_atk"]) ? $_SESSION["character_atk"] : "";
    $life = isset($_SESSION["character_life"]) ? $_SESSION["character_life"] : "";
    $color = isset($_SESSION["character_color"]) ? htmlspecialchars($_SESSION["character_color"]) : "";

    // Display the created character details
    echo "Personnage créé avec succès:<br>";
    echo "Nom : " . $name . "<br>";
    echo "ATK : " . $atk . "<br>";
    echo "Vie : " . $life . "<br>";
    echo "Couleur : " . $color . "<br>";

    // Clear the session variables
    unset($_SESSION['character_created']);
    unset($_SESSION['character_name']);
    unset($_SESSION['character_atk']);
    unset($_SESSION['character_life']);
    unset($_SESSION['character_color']);
}
?>
<p>Menu créate</p>
<a class="nav-link active" href="/www/streetFigh/index.php">Home</a>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Créer un Personnage</h2>

            <form action="/www/streetFigh/controller/create.php" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du Personnage</label>
                    <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="atk" class="form-label">ATK</label>
                    <input type="number" class="form-control" id="atk" name="atk" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="life" class="form-label">Life</label>
                    <input type="number" class="form-control" id="life" name="life" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">Créer</button>
                <input type="hidden" name="csrf_token" value="<?php echo $personnage->generateCSRFToken(); ?>">
                
                
</form>
        </div>
    </div>
</div>