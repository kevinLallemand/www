<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 8</title>
</head>

<body>
    <p id="error"></p>
    <form>
        <input type="email" id="login" value="" required>
        <input type="password" id="password" value="" required>
        <button type="button" id="btnForm">Valider</button>
    </form>
    <script>
        //Regex email return true ou false
        function validateEmail(email) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(email);
        }

        var btn = document.getElementById('btnForm');
        btn.addEventListener("click", function() {
            var login = document.getElementById('login').value;
            var password = document.getElementById('password').value;

            if (login != "" && password != "") {

                if (validateEmail(login)) {
                    console.log(validateEmail(login));
                    let promise = new URLSearchParams({
                        'login': login,
                        'password': password
                    });
                    postData("json.php", promise).then((response) => {
                        console.log(JSON.stringify(response)); // Les données JSON analysées par l'appel `donnees.json()`
                    });
                } else {
                    const elem = document.getElementById("error");
                    elem.innerHTML = "Veuillez entrer un email valide !";
                }
            } else {
                const elem = document.getElementById("error");
                elem.innerHTML = "Veuillez remplir tous les champs !";
            }
        });

        //Faire transité des données et traité une reponse
        async function postData(url = "", data = {}) {
            // Les options par défaut sont indiquées par *
            const response = await fetch(url, {
                method: "POST", // *GET, POST, PUT, DELETE, etc.
                mode: "cors", // no-cors, *cors, same-origin
                cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                credentials: "same-origin", // include, *same-origin, omit
                headers: {
                    //"Content-Type": "application/json",
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: "follow", // manual, *follow, error
                referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: data, // le type utilisé pour le corps doit correspondre à l'en-tête "Content-Type"
            });
            return response.json(); // transforme la réponse JSON reçue en objet JavaScript natif
        }
    </script>
</body>

</html>