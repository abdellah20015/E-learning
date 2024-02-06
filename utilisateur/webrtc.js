// Créer un élément vidéo pour afficher la caméra 
var video = document.createElement("video"); 
video.id = "camera"; 
video.autoplay = true; 
video.muted = true;

// Créer un élément canvas pour dessiner la caméra 
var canvas = document.createElement("canvas"); 
canvas.id = "canvas"; 
canvas.width = video.width; 
canvas.height = video.height;

// Créer un élément div pour contenir les icônes 
var icons = document.createElement("div"); 
icons.id = "icons"; 
icons.style.position = "absolute"; 
icons.style.bottom = "10px"; icons.style.left = "10px";

// Créer les icônes pour arrêter le meet, partager l’écran, envoyer des messages et améliorer la qualité de la vidéo 
var stopIcon = document.createElement("img"); stopIcon.id = "stop"; stopIcon.src = "stop.png"; // Remplacer par l’URL de l’icône 
stopIcon.style.width = "32px"; stopIcon.style.height = "32px"; 
stopIcon.style.margin = "5px"; stopIcon.style.cursor = "pointer";

var shareIcon = document.createElement("img"); 
shareIcon.id = "share"; 
shareIcon.src = "share.png"; // Remplacer par l’URL de l’icône 
shareIcon.style.width = "32px"; shareIcon.style.height = "32px"; 
shareIcon.style.margin = "5px"; shareIcon.style.cursor = "pointer";

var chatIcon = document.createElement("img"); 
chatIcon.id = "chat"; 
chatIcon.src = "chat.png"; // Remplacer par l’URL de l’icône 
chatIcon.style.width = "32px"; 
chatIcon.style.height = "32px"; 
chatIcon.style.margin = "5px"; chatIcon.style.cursor = "pointer";

var qualityIcon = document.createElement("img"); 
qualityIcon.id = "quality"; 
qualityIcon.src = "quality.png"; // Remplacer par l’URL de l’icône 
qualityIcon.style.width = "32px"; qualityIcon.style.height = "32px"; qualityIcon.style.margin = "5px"; 
qualityIcon.style.cursor = "pointer";

// Ajouter les icônes au div 
icons.appendChild(stopIcon); icons.appendChild(shareIcon); icons.appendChild(chatIcon); icons.appendChild(qualityIcon);

// Créer un élément div pour contenir le forum de messages 
var forum = document.createElement("div"); forum.id = "forum"; forum.style.position = "absolute"; forum.style.top = "10px"; forum.style.right = "10px"; forum.style.width = "300px"; forum.style.height = "400px"; forum.style.overflow = "auto"; forum.style.border = "1px solid black"; forum.style.display = "none";

// Créer un élément input pour saisir les messages 
var input = document.createElement("input"); input.id = "input"; input.type = "text"; input.placeholder = "Saisir un message"; input.style.width = "300px"; input.style.height = "20px"; input.style.display = "none";

// Ajouter le vidéo, le canvas, le div des icônes, le div du forum et l’input au body 
document.body.appendChild(video); document.body.appendChild(canvas); document.body.appendChild(icons); document.body.appendChild(forum); document.body.appendChild(input);

// Demander le code d’accès à l’utilisateur 
var code = prompt("Entrez le code d’accès");

// Vérifier si le code est valide 
if (code == "1234") { // Allumer la caméra 
  navigator.mediaDevices.getUserMedia({ video: true, audio: true }) .then(function(stream) { 
    // Afficher le flux vidéo dans l’élément vidéo 
    video.srcObject = stream; // Créer un objet Peer pour se connecter au serveur 
    var peer = new Peer(code, { host: "localhost", port: 9000 }); 
    // Créer un appel avec le flux vidéo 
    var call = peer.call(code, stream); // Recevoir le flux vidéo de l’autre pair 
    call.on("stream", function(remoteStream) { 
      // Dessiner le flux vidéo dans le canvas 
      var context = canvas.getContext("2d"); 
      context.drawImage(remoteStream, 0, 0, canvas.width, canvas.height); });
       // Créer une connexion de données avec l’autre pair 
       var conn = peer.connect(code); // Recevoir les messages de l’autre pair 
       conn.on("data", function(data) { 
        // Créer un élément p pour afficher le message 
        var p = document.createElement("p"); 
        p.textContent = data; 
        // Ajouter le p au forum 
        forum.appendChild(p); 
        // Faire défiler le forum vers le bas 
        forum.scrollTop = forum.scrollHeight; }); 
        // Ajouter un écouteur d’événement au bouton stop 
        stopIcon.addEventListener("click", function() { 
          // Arrêter le flux vidéo 
          stream.getTracks().forEach(function(track) { track.stop(); }); 
          // Fermer l’appel 
          call.close(); // Fermer la connexion 
          conn.close(); // Rediriger vers la page index.html 
          window.location.href = "index.html"; }); 
          // Ajouter un écouteur d’événement au bouton share 
          shareIcon.addEventListener("click", function() { 
            // Demander à l’utilisateur de choisir une fenêtre à partager 
            navigator.mediaDevices.getDisplayMedia({ video: true }) .then(function(screenStream) { 
              // Remplacer le flux vidéo par le flux d’écran 
              call.replaceTrack(stream.getVideoTracks()[0], screenStream.getVideoTracks()[0], stream); 
              // Ajouter un écouteur d’événement au bouton stop du flux d’écran 
              screenStream.getVideoTracks()[0].addEventListener("ended", function() { 
                // Remplacer le flux d’écran par le flux vidéo 
                call.replaceTrack(screenStream.getVideoTracks()[0], stream.getVideoTracks()[0], stream); }); }); }); 
                // Ajouter un écouteur d’événement au bouton chat 
                chatIcon.addEventListener("click", function() { 
                  // Basculer l’affichage du forum et de l’input 
                  if (forum.style.display == "none") { forum.style.display = "block"; 
                  input.style.display = "block"; } else { forum.style.display = "none"; input.style.display = "none"; } }); 
                  // Ajouter un écouteur d’événement à l’input 
                  input.addEventListener("keyup", function(event) { 
                    // Vérifier si la touche entrée est pressée 
                    if (event.keyCode == 13) { 
                      // Récupérer le message saisi 
                      var message = input.value; // Vider l’input 
                      input.value = ""; 
                      // Envoyer le message à l’autre pair 
                      conn.send(message); // Créer un élément p pour afficher le message 
                      var p = document.createElement("p"); 
                      p.textContent = message; // Ajouter le p au forum 
                      forum.appendChild(p); // Faire défiler le forum vers le bas 
                      forum.scrollTop = forum.scrollHeight; } }); // Ajouter un écouteur d’événement au bouton quality 
                      qualityIcon.addEventListener("click", function() { // Demander à l’utilisateur de choisir la qualité de la vidéo 
                        var quality = prompt("Entrez la qualité de la vidéo (144p, 360p, 1080p, HD)"); // Vérifier si la qualité est valide 
                        if (quality == "144p" || quality == "360p" || quality == "1080p" || quality == "HD") { 
                          // Modifier la résolution du flux 
                          video stream.getVideoTracks()[0].applyConstraints({ width: quality, height: quality }); } }); }); } else { 
                            // Afficher un message d’erreur 
                            alert("Code d’accès incorrect"); }