<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-query.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="a.jpg" type="image/icon type">
    <body style="background-image: url('AA.jpg');">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><img src="logo.jpg" alt="Logo E-learning"></a> <!-- Ajout du lien vers la page d'accueil -->
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="cours.html">Cours</a></li>
                <li><a href="exercices.html">Exercices</a></li>
                <li><a href="meeting.html">Meeting</a></li>
                <li><a href="contact.html">Contact</a></li>
                
            </ul>
        </nav>
    </header>
    <main>



    <?php
// Démarrer ou reprendre la session
session_start();

// Récupération du code d’accès saisi
$code = $_POST["code"];

// Vérification du code d’accès
if ($code == $_SESSION["code"]) {
    // Affichage de la page du meeting
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<title>Meeting</title>";
    echo "<style>"; // Ajout des styles CSS
    echo "#meet {";
    echo "width: 1000px;";
    echo "height: 510px;";
    echo "margin: 0 auto;"; // Centrer horizontalement
    echo "display: flex;";
    echo "justify-content: center;"; // Centrer verticalement
    echo "align-items: center;";
    echo "}";
    echo "#quitButton {"; // Ajout des styles pour le bouton "Quitter"
    echo "background-color: #f44336;"; // Couleur de fond rouge
    echo "border: none;"; // Pas de bordure
    echo "color: white;"; // Texte blanc
    echo "padding: 15px 32px;"; // Padding
    echo "text-align: center;"; // Texte centré
    echo "text-decoration: none;"; // Pas de soulignement
    echo "display: inline-block;";
    echo "font-size: 16px;";
    echo "margin: 4px 2px;";
    echo "cursor: pointer;"; // Curseur en forme de main
    echo "}";
    echo "</style>";
    echo "<script src='https://meet.jit.si/external_api.js'></script>"; // Ajout du script Jitsi Meet
    echo "</head>";
    echo "<body>";
    echo "<h1>Meeting</h1>";
    echo "<div id='meet'></div>"; // Ajout de l'élément où la réunion sera affichée
    echo "<script>"; // Ajout du script pour créer une nouvelle instance de JitsiMeetExternalAPI
    echo "const domain = 'meet.jit.si';";
    echo "const options = {";
    echo "roomName: 'learning',";
    echo "width: '100%',"; // Utiliser 100% de la largeur de l'élément parent
    echo "height: '100%',"; // Utiliser 100% de la hauteur de l'élément parent
    echo "parentNode: document.querySelector('#meet')";
    echo "};";
    echo "const api = new JitsiMeetExternalAPI(domain, options);";
    echo "function quitMeeting() {"; // Fonction pour quitter la réunion
    echo "api.dispose();";
    echo "}";
    echo "</script>";
    echo "</body>";
    echo "</html>";
} else {
    // Affichage d’un message d’erreur et redirection vers la page meeting.html
    echo "<p>Code d’accès incorrect. Veuillez réessayer.</p>";
    header("Refresh: 3; URL=meeting.html");
}
?>





</main>
<footer>
        <p>© 2023 E-learning. Tous droits réservés.</p>
        <a href="https://www.linkedin.com/"><img src="linkedin.png" alt="LinkedIn"></a>
        <a href="https://www.facebook.com/"><img src="facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/"><img src="instagram.png" alt="Instagram"></a>
        <a href="mailto:abdellah.agnaou@um5r.ac.ma"><img src="email.png" alt="Email"></a>
        <p>Email : abdellah.agnaou@um5r.ac.ma</p>
        <p>Adresse : Faculté des sciences Rabat</p>
        <p>Téléphone : +212 6 37 45 10 36</p>
    </footer>
    <!-- Ajout d’un script pour rendre le site interactif -->
    <script src="main.js"></script>
    
    
</body>
</html>