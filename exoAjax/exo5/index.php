<!DOCTYPE html>
<html>
<head>
    <title>Exemple de Fetch API pour JSON</title>
</head>
<body>
    <div id="data"></div>
    
    <script>
fetch("json.php")
    .then(response => response.json())
    .then(data => {
        console.log(data.type);
        // Afficher la data sur le DOM
        document.getElementById("output").textContent = data.data;
    });
    </script>
</body>
</html>
