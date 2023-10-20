<?php
$host = "localhost"; // Remplacez par le nom de votre hôte MySQL
$dbname = "blogsjt"; // Nom de la base de données
$user = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL

try {
    // Connexion à la base de données
    $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, renvoyer une réponse d'erreur JSON
    echo json_encode(["type" => "Error"]);
    exit;
}

$input = file_get_contents("php://input"); // Récupération des données JSON de la requête
$data = json_decode($input); // Décodage des données JSON

if ($data && isset($data->login) && isset($data->password)) {
    // Nettoyez les données entrantes pour éviter les attaques SQL (utilisez des requêtes préparées)
    $login = trim($data->login); // Supprime les espaces en début et fin
    $password = trim($data->password);

    // Utilisez des requêtes préparées pour éviter les injections SQL
    $query = $bdd->prepare("SELECT * FROM user WHERE email = :login AND password_hash = :password");
    $query->execute(["login" => $login, "password" => $password]);

    if ($query->rowCount() > 0) {
        // Si les identifiants sont valides, renvoyez une réponse JSON indiquant une connexion réussie
        echo json_encode(["type" => "Success"]); // Pour une connexion réussie
    } else {
        // Si les identifiants ne sont pas valides, renvoyez une réponse JSON indiquant une erreur
        echo json_encode(["type" => "Error"]); // Pour une erreur de connexion
    }
} else {
    // Si les données JSON ne sont pas correctement décodées ou manquantes, renvoyez une réponse JSON d'erreur
    echo json_encode(["type" => "Error"]);
}
