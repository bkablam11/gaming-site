// Sélectionner les éléments nécessaires
const zoomableImages = document.querySelectorAll('.zoomable-image');
const zoomContainer = document.getElementById('image-zoom-container');
const zoomedImage = document.getElementById('zoomed-image');
const closeZoom = document.getElementById('close-zoom');

// Ajouter un événement de clic sur chaque image
zoomableImages.forEach(image => {
    image.addEventListener('click', () => {
        zoomedImage.src = image.src; // Mettre à jour la source de l'image zoomée
        zoomContainer.classList.remove('hidden'); // Afficher le conteneur de zoom
    });
});

// Fermer le zoom lorsque l'utilisateur clique sur la croix
closeZoom.addEventListener('click', () => {
    zoomContainer.classList.add('hidden');
    zoomedImage.src = ''; // Réinitialiser la source de l'image
});

// Fermer le zoom lorsque l'utilisateur clique en dehors de l'image
zoomContainer.addEventListener('click', (e) => {
    if (e.target === zoomContainer) {
        zoomContainer.classList.add('hidden');
        zoomedImage.src = '';
    }
});

// Timer pour les promotions
const promoEndDate = new Date("2025-04-10T23:59:59"); // Date de fin des promotions (2 semaines après le 27/03/2025)
const timerElement = document.getElementById("timer");

function updateTimer() {
    const now = new Date();
    const timeRemaining = promoEndDate - now;

    if (timeRemaining > 0) {
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        timerElement.textContent = `${days} jours, ${hours} heures, ${minutes} minutes, ${seconds} secondes`;
    } else {
        timerElement.textContent = "Les promotions sont terminées.";
        clearInterval(timerInterval); // Arrêter le timer
    }
}

// Mettre à jour le timer toutes les secondes
const timerInterval = setInterval(updateTimer, 1000);
updateTimer(); // Appel initial pour éviter le délai d'une seconde