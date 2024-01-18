<?php
session_start();
$result = $personnage->getPersonnageDetails($id);

// Display the list of characters
foreach ($result as $personnage) {
    echo "Nom : " . htmlspecialchars($personnage->name) . " ";
    echo "<a href='/www/streetFigh/view/detail/detail.php?id={$personnage->id}'>Voir les détails</a><br>";
    
}
    echo "<a href='/www/streetFigh/index.php'>Retour acceuil</a><br>";
    
?>(is_array($result as $personnage))