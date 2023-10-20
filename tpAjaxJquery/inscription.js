$(document).ready(function() {
    // Lorsque la page est chargée, cette fonction est exécutée
    $('#inscription-form').submit(function(event) {
        event.preventDefault(); // Empêche la soumission normale du formulaire

        // Récupération des valeurs des champs du formulaire
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();

        // Envoi des données du formulaire au script PHP via AJAX
        $.ajax({
            type: 'POST',
            url: 'inscription.php', // Le fichier PHP qui gère l'inscription
            data: {
                username: username,
                email: email,
                password: password
            },
            success: function(response) {
                // Affichage de la réponse du script PHP dans la div "message"
                $('#message').html(response);
            }
        });
    });
});






