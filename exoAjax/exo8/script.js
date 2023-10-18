document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const login = document.getElementById("login").value;
    const password = document.getElementById("password").value;

    // Évitez d'envoyer le mot de passe en texte brut
    // Vous devriez le hacher côté client avant l'envoi, mais je montre le processus ici pour des raisons pédagogiques
    const hashedPassword = btoa(password);

    const data = {
        login: login,
        password: hashedPassword
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
        if (data.type === "Success") {
            document.getElementById("response").textContent = "Connexion réussie.";
        } else {
            document.getElementById("response").textContent = "Échec de la connexion.";
        }
    });
});