        // Sélectionnez l'élément image par son ID
        const image = document.getElementById("image");

        // Ajoutez un écouteur d'événements "mouseenter" (survol)
        image.addEventListener("mouseenter", () => {
            // Ajoutez la classe "bordered" pour afficher la bordure rouge
            image.classList.add("bordered");
        });

        // Ajoutez un écouteur d'événements "mouseleave" (fin du survol)
        image.addEventListener("mouseleave", () => {
            // Retirez la classe "bordered" pour masquer la bordure rouge
            image.classList.remove("bordered");
        });