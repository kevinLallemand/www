<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7</title>
</head>

<body>
    <script>
        //Transité des donné en JSON
        async function postJSON(url = "", data = {}) {
            const reponse = await fetch(url, {
                method: "POST",
                headers: {
                    // "Content-Type": "application/json",
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: data,
            });

            const resultat = await reponse.json();
            console.log(resultat.mdp);
        }

        let promise = new URLSearchParams();
        promise.append('login', 'test@gmail.com');
        promise.append('password', 'root');

        postJSON('json.php', promise);
    </script>
</body>

</html>