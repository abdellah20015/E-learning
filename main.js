// Ce script permet de rendre le site interactif

// On récupère les éléments de menu de la barre de navigation
var menuItems = document.querySelectorAll("nav ul li a");

// On récupère les sections du site
var sections = document.querySelectorAll("section");

// On crée une fonction pour activer le menu en fonction du scroll
function activateMenu() {
    // On récupère la position du scroll
    var scrollPosition = window.pageYOffset;

    // On parcourt les sections du site
    for (var i = 0; i < sections.length; i++) {
        // On récupère la hauteur de la section
        var sectionHeight = sections[i].offsetHeight;

        // On vérifie si le scroll est dans la section
        if (scrollPosition >= sections[i].offsetTop && scrollPosition < sections[i].offsetTop + sectionHeight) {
            // Si oui, on active le menu correspondant
            menuItems[i].classList.add("active");
        } else {
            // Sinon, on désactive le menu
            menuItems[i].classList.remove("active");
        }
    }
}

// On ajoute un écouteur d'événement sur le scroll
window.addEventListener("scroll", activateMenu);
