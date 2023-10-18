<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="data"></div>
    
    <script>
        // Effectuez une requête GET avec l'API Fetch
        const data = {
    login: "username",
    password: "password"
};

fetch("json.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
        "Content-Type": "application/json"
    }
})
.then(response => response.json())
.then(data => {
    // Traiter la réponse
});
    </script>
</body>
</html>