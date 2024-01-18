<?php
try {
    $bdd = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";charset=utf8", USER , PASSWORD);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
