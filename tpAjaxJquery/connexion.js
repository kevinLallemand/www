function validateEmail(email) {
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email);
}

document.addEventListener("DOMContentLoaded", function () {
    var btn = document.getElementById('btnForm');

    btn.addEventListener("click", function() {
        var login = document.getElementById('login').value;
        var password = document.getElementById('password').value;

        if (login !== "" && password !== "") {
            if (validateEmail(login)) {
                // Création d'un objet FormData pour les données du formulaire
                var formData = new FormData();
                formData.append('login', login);
                formData.append('password', password);

                // Envoi des données au serveur via une requête AJAX
                fetch("connexion.php", {
                    method: "POST",
                    body: formData,
                })
                .then(response => response.json())
                .then(responseData => {
                    if (responseData.type === "Success") {
                        // Si la réponse indique une connexion réussie, affiche un message de réussite
                        document.getElementById("response").textContent = "Connexion réussie.";
                    } else {
                        // Si la réponse indique un échec de la connexion, affiche un message d'échec
                        document.getElementById("response").textContent = "Échec de la connexion.";
                    }
                })
                .catch(error => {
                    console.error("Erreur : " + error);
                });
            } else {
                const elem = document.getElementById("error");
                elem.innerHTML = "Veuillez entrer un e-mail valide !";
            }
        } else {
            const elem = document.getElementById("error");
            elem.innerHTML = "Veuillez remplir tous les champs !";
        }
    });
});