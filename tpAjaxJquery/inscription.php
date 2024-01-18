<?php

include "config.php";
include "database.php";

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Préparation de la requête d'insertion
    $query = $bdd->prepare('INSERT INTO user (username, email, password_hash) VALUES (?, ?, ?)');
    $query->execute([$username, $email, $password]);

    if ($query) {
        session_start();
        $_SESSION["username"]= $username; 
        echo 'Inscription réussie.';
    } else {
        echo 'Erreur lors de l\'inscription.';
    }
} else {
    echo 'Tous les champs sont requis.';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Inscription</h1>
    <!-- Formulaire d'inscription -->
    <form id="inscription-form">
        <!-- Champ pour le nom d'utilisateur -->
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br><br>
        <!-- Champ pour l'adresse e-mail -->
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        <!-- Champ pour le mot de passe -->
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <!-- Bouton pour soumettre le formulaire -->
        <button type="submit">S'inscrire</button>
    </form>
    <!-- Affichage des messages -->
    <div id="message"></div>
<?php 
if(isset($_SESSION['username'])):
 ?>
 <?=($_SESSION['username'])?>
 <a href="deconnection.php"><button>déconnection</button></a>

 <?php endif;?>

    <!-- Script JavaScript pour gérer la soumission du formulaire -->
    <script src="inscription.js"></script>
</body>
</html>