<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Exemple de Fetch API</title>
</head>
<body>
    <script>
        // Effectuez une requête GET avec l'API Fetch
        fetch('get.php')
            .then(function(response) {
                // Affichez la promesse dans la console
                console.log('Promesse :', response);
                return response.text(); // Convertir la réponse en texte
            })
            .then(function(data) {
                // Affichez la réponse dans la console
                console.log('Réponse :', data);
            })
            .catch(function(error) {
                // Gérez les erreurs
                console.error('Erreur :', error);
            });
    </script>
</body>
</html>

<!--
    Ce code utilise l'API Fetch pour effectuer une requête GET vers get.php. Il affiche la promesse renvoyée par la première étape, puis, une fois que la promesse est résolue, affiche la réponse dans la console. Les erreurs éventuelles sont gérées via la méthode catch.

    Créez un fichier get.php qui contiendra la variable de type string à récupérer :

php
-->

<?php
$reponse = "Ceci est une chaîne de caractères provenant de get.php";
echo $reponse;
?>
<!--
Ce fichier PHP définit une variable $reponse avec une chaîne de caractères.

Assurez-vous que les fichiers (fetch.html et get.php) se trouvent dans le même répertoire, puis ouvrez le fichier fetch.html dans un navigateur. La console affichera la promesse renvoyée par Fetch, puis la réponse (la chaîne de caractères) de get.php.
        -->
</body>
</html>