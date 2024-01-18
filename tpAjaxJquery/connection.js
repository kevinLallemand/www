// Définissez la fonction validateEmail en premier
function validateEmail(email) {
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}

document.addEventListener("DOMContentLoaded", function () {
    // Attendez que le document soit chargé

    var btn = document.getElementById('btnForm'); // Récupérez le bouton de formulaire

    btn.addEventListener("click", function() {
        // Lorsque le bouton est cliqué

        var login = document.getElementById('login').value; // Récupérez la valeur du champ "login"
        var password = document.getElementById('password').value; // Récupérez la valeur du champ "password"

        if (login !== "" && password !== "") {
            // Vérifiez si les champs "login" et "password" ne sont pas vides
            if (validateEmail(login)) {
                // Utilisez la fonction validateEmail pour vérifier si l'e-mail est valide

                // Création d'un objet FormData pour les données du formulaire
                var formData = new FormData();
                formData.append('login', login);
                formData.append('password', password);

                // Envoi des données au serveur via une requête AJAX
                fetch("connection.php", {
                    method: "POST",
                    body: formData,
                })
                .then(response => response.json()) // Analysez la réponse en tant que JSON
                .then(responseData => {
                    if (responseData.type === "Success") {
                        // Si la réponse indique une connexion réussie, affiche un message de réussite
                        document.getElementById("response").textContent = "Connexion réussie.";

                        // Redirection vers index.html après 2 secondes (2000 ms)
                        setTimeout(function() {
                            window.location.href = "index.html";
                        }, 2000);
                    } else {
                        // Si la réponse indique un échec de la connexion, affiche un message d'échec
                        document.getElementById("response").textContent = "Échec de la connexion.";
                    }
                })
                .catch(error => {
                    console.error("Erreur : " + error);
                });
            } else {
                // Si l'e-mail n'est pas valide, affichez un message d'erreur
                const elem = document.getElementById("error");
                elem.innerHTML = "Veuillez entrer un e-mail valide !";
            }
        } else {
            // Si les champs ne sont pas remplis, affichez un message d'erreur
            const elem = document.getElementById("error");
            elem.innerHTML = "Veuillez remplir tous les champs !";
        }
    });
});