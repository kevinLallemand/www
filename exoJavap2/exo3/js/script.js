        // Sélectionnez toutes les images avec la classe "image-container"
        const imageContainers = document.querySelectorAll(".image-container");

        // Ajoutez des écouteurs d'événements aux conteneurs d'images pour gérer le survol
        imageContainers.forEach(container => {
            container.addEventListener("mouseenter", () => {
                container.classList.add("hovered");
            });

            container.addEventListener("mouseleave", () => {
                container.classList.remove("hovered");
            });
        });