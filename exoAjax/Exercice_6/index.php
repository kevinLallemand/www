<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 6</title>
</head>

<body>
    <script>
        //Transité des donné en JSON
        async function postJSON(url = "", data = {}) {
            const reponse = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(data),
            });

            const resultat = await reponse.json();
            console.log(resultat.mdp);
        }

        const dataJson = {
            login: "Jean Neymar",
            password: 'blabla'
        };

        postJSON('json.php', dataJson);
    </script>
</body>

</html>