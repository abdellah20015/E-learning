// Déclaration des constantes
const DUREE = 90 * 60; // La durée de l’examen en secondes
const MAX_NOTE = 20; // La note maximale possible

// Déclaration des variables globales
var timer = document.querySelector("#timer"); // L’élément qui affiche le temps restant
var form = document.querySelector("#form"); // Le formulaire qui contient les questions et les options
var note = 0; // La note obtenue par l’utilisateur
var reponses = ["a", "c", "d", "b", "c", "b", "b", "a", "b", "a", "a", "a", "a", "a", "b", "a", "a", "b", "a", "a"]; // Le tableau qui contient les bonnes réponses
var nbQuestions = reponses.length; // Le nombre de questions
var interval; // La variable qui contient l'identifiant du chronomètre

// Fonction qui démarre le chronomètre
function startTimer() {
  let duration = DUREE; // La durée restante en secondes
  var interval = setInterval(() => {
    let minutes = Math.floor(duration / 60); // Le nombre de minutes restantes
    let seconds = duration % 60; // Le nombre de secondes restantes

    // Formatage du temps restant
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;

    // Affichage du temps restant
    timer.innerHTML = minutes + ":" + seconds;

    // Décrémentation du temps restant
    duration--;

    // Si le temps est écoulé
    if (duration < 0) {
      // Arrêt du chronomètre
      clearInterval(interval);

      // Affichage d’un message d’alerte
      alert("Le temps est écoulé ! Vous devez recommencer demain.");

      // Redirection vers la page d’accueil
      window.location.href = "index.html";
    }
  }, 1000); // Le chronomètre s’actualise chaque seconde
}

// Fonction qui corrige l’examen
function corrigerExamen() {
  // Parcours des questions
  for (let i = 0; i < nbQuestions; i++) {
    // Récupération de la question et de la bonne réponse
    let question = form.elements["q" + (i + 1)];
    let reponse = reponses[i];

    // Vérification si l’utilisateur a coché une option
    if (question.value) {
      // Comparaison avec la bonne réponse
      if (question.value == reponse) {
        // Incrémentation de la note
        note++;
      }
    }
  }

  // Calcul du pourcentage de la note
  let pourcentage = Math.round((note / MAX_NOTE) * 100);

  // Affichage de la note
  alert("Votre note est : " + pourcentage + "%");

  // Si la note est supérieure ou égale à 50
  if (pourcentage >= 50) {
    // Arrêt du chronomètre
    clearInterval(interval);

    // Affichage d’un message de félicitations
    alert("Bravo ! Félicitations !");

    // Affichage du certificat de réussite dans la div
    certificat.style.display = "block";
    document.querySelector("#note").innerHTML = pourcentage;
  } else {
    // Affichage d’un message d’échec
    alert("Veuillez réessayer !");

    // Redirection vers la page de l’examen
    window.location.href = "examen.html";
  }
}

// Fonction qui gère l’envoi du formulaire
function envoyerForm(event) {
  // Empêchement du comportement par défaut du formulaire
  event.preventDefault();

  // Appel de la fonction de correction
   corrigerExamen();
 
// Arrêt du chronomètre
  clearInterval(interval);

}

// Fonction qui affiche une question et masque les autres
function showQuestion(id) {
  let questions = document.querySelectorAll(".question"); // La liste des questions
  for (var i = 0; i < questions.length; i++) {
    questions[i].style.display = "none"; // Masquage de la question
  }
  document.querySelector("#" + id).style.display = "block"; // Affichage de la question
}

// Appel de la fonction qui démarre le chronomètre
startTimer();

// Ajout d’un écouteur d’événement sur le formulaire
form.addEventListener("submit", envoyerForm);

// Ajout des écouteurs d’événement sur les boutons “Next”
for (let i = 1; i < nbQuestions; i++) {
  // Utilisation d’une fonction normale
  document.querySelector("#next" + i).addEventListener("click", () => {
    showQuestion("q" + (i + 1)); // Passage du paramètre i + 1
  });
  
}

// Affichage de la première question en dehors de la boucle
showQuestion("q1");


