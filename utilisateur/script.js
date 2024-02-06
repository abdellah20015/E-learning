// Sélectionner les éléments du diaporama
const slider = document.querySelector(".slider");
const slides = document.querySelectorAll(".slide");

// Définir un index pour le diaporama
let index = 1;

// Créer une fonction pour changer d'image
function changeSlide() {
    // Enlever la classe active de l'image actuelle
    slides[index].classList.remove("active");

    // Augmenter l'index de 1
    index++;

    // Si l'index dépasse le nombre d'images, le remettre à 0
    if (index >= slides.length) {
        index = 0;
    }

    // Ajouter la classe active à la nouvelle image
    slides[index].classList.add("active");
}

// Appeler la fonction toutes les 5 secondes
setInterval(changeSlide, 5000);
