// Fonction qui formate la date en français
function formatDate(date) {
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString('fr-FR', options);
  }
  
  // Fonction qui formate l’heure en français
  function formatTime(time) {
    var options = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
    return time.toLocaleTimeString('fr-FR', options);
  }
  
  // Fonction qui récupère et affiche la date et l’heure
  function displayDateTime() {
    // Créer un objet Date
    var now = new Date();
  
    // Récupérer les éléments span par leur id
    var dateElement = document.getElementById('date');
    var timeElement = document.getElementById('time');
  
    // Afficher la date et l’heure formatées
    dateElement.textContent = formatDate(now);
    timeElement.textContent = formatTime(now);
  }
  
  // Appeler la fonction displayDateTime au chargement de la page
  window.onload = displayDateTime;
  
  // Appeler la fonction displayDateTime toutes les secondes
  window.setInterval(displayDateTime, 1000);
  