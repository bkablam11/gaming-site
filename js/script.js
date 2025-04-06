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

// Timer pour les promotions et maintenance
const promoEndDate = new Date("2025-04-10T23:59:59"); // Date de fin de la promotion actuelle
const maintenanceStartDate = new Date("2025-04-11T00:00:00"); // Début de la maintenance
const maintenanceEndDate = new Date("2025-04-11T23:59:59"); // Fin de la maintenance (1 jour)
const nextPromoStartDate = new Date("2025-04-12T00:00:00"); // Début de la prochaine promotion

const timerElement = document.getElementById("timer");

function updateTimer() {
    const now = new Date();

    if (now < promoEndDate) {
        // Pendant la promotion actuelle
        const timeRemaining = promoEndDate - now;
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        timerElement.textContent = `${days} jours, ${hours} heures, ${minutes} minutes, ${seconds} secondes avant la fin des promotions.`;
    } else if (now >= maintenanceStartDate && now <= maintenanceEndDate) {
        // Pendant la maintenance
        timerElement.textContent = "Le site est en maintenance. Revenez bientôt pour la prochaine promotion !";
    } else if (now > maintenanceEndDate && now < nextPromoStartDate) {
        // Entre la maintenance et la prochaine promotion
        const timeRemaining = nextPromoStartDate - now;
        const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

        timerElement.textContent = `La prochaine promotion commence dans ${days} jours, ${hours} heures, ${minutes} minutes, ${seconds} secondes.`;
    } else {
        // Pendant la prochaine promotion
        timerElement.textContent = "Les promotions actuelles sont en cours !";
    }
}

// Mettre à jour le timer toutes les secondes
const timerInterval = setInterval(updateTimer, 1000);
updateTimer(); // Appel initial pour éviter le délai d'une seconde