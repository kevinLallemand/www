<?php
$host = "localhost"; // Remplacez par le nom de votre hôte MySQL
$dbname = "blogsjt"; // Nom de la base de données
$user = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL

try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Préparation de la requête d'insertion
    $query = $bdd->prepare('INSERT INTO user (username, email, password_hash) VALUES (?, ?, ?)');
    $query->execute([$username, $email, $password]);

    if ($query) {
        echo 'Inscription réussie.';
    } else {
        echo 'Erreur lors de l\'inscription.';
    }
} else {
    echo 'Tous les champs sont requis.';
}
?>