$(document).ready(function() {
    // Générer un nombre aléatoire entre 0 et 100
    var randomNumber = Math.floor(Math.random() * 101);

    // Gérer la soumission du formulaire
    $("#guessForm").submit(function(event) {
        event.preventDefault(); // Empêcher la soumission par défaut du formulaire

        // Récupérer la valeur entrée par l'utilisateur
        var userGuess = parseInt($("#userGuess").val());

        // Vérifier si la valeur est correcte
        if (userGuess === randomNumber) {
            $("#message").text("Bravo ! Vous avez deviné le bon nombre.");
            // Ajouter la classe "alert-success" pour changer la couleur en vert
            $("#message").addClass("alert-success").removeClass("alert-failure");
        } else if (userGuess < randomNumber) {
            $("#message").text("Le nombre que vous cherchez est plus grand.");
            // Ajouter la classe "alert-failure" pour changer la couleur en rouge
            $("#message").addClass("alert-failure").removeClass("alert-success");
        } else {
            $("#message").text("Le nombre que vous cherchez est plus petit.");
            // Ajouter la classe "alert-failure" pour changer la couleur en rouge
            $("#message").addClass("alert-failure").removeClass("alert-success");
        }
    });
});