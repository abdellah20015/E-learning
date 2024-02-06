<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-learning</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-query.css">
    <link rel="icon" href="logo.png" type="image/icon type">
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <button id="mode-switch" onclick="switchMode()"><i class="fa fa-moon-o"></i> Night Mode</button>
    <!-- Add a container for the translation dropdown -->
    <div id="google_translate_element"></div>
    
    <style>
        #google_translate_element {
    display: flex;
    justify-content: center;
}



    </style>

    
</head>

    <header>
        <div class="logo">
            <img src="logo.png" alt="Logo E-learning">
        </div>
        <nav>
            <ul>
                <li><a href="index.php"><i class="fa fa-home"></i> Accueil</a></li>
                <li><a href="cours.html"><i class="fa fa-book"></i> Cours</a></li>
                <li><a href="exercices.html"><i class="fa fa-pencil"></i> Exercices</a></li>
                <li><a href="meeting.html"><i class="fa fa-users"></i> Meeting</a></li>
                <li><a href="contact.html"><i class="fa fa-envelope"></i> Contact</a></li>
                <li><a href="propos.html"><i class="fa fa-info-circle"></i> A propos</a></li>
                <li><a href="../login.php" onclick="logout()"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
            </ul>
        </nav>
        
    </header>
    
    <main>
        
        
        <div class="date-time"> 
            <span id="date"><i class="fa fa-calendar"></i></span> 
            <span id="time"><i class="fa fa-clock-o"></i></span> 
        </div>
        <?php
echo "<h1 style='color: #000000; font-family: Arial, sans-serif; text-align: center; padding: 20px 0; background-color: #f1f1f1; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);'>Bienvenue ";
if(isset($_SESSION['nom'])){
    echo "<span style='color: #8B4513; font-family: Georgia, serif; font-size: inherit; font-style: italic;'>";
    echo $_SESSION['prenom'].' '.$_SESSION['nom'];
    echo "</span>";
}
echo " sur E-learning</h1>";
?>


        <p>Ce site vous propose des cours et des exercices en ligne sur différents sujets.</p>
        <p>Pour accéder aux quizzs ou examens, vous devez vous inscrire ou vous connecter.</p>
        <div class="buttons">
            <a href="inscription.html" class="button"><i class="fa fa-user-plus"></i> Inscription</a>
            <a href="connexion.html" class="button"><i class="fa fa-sign-in"></i> Connexion</a>
        </div>
        <!-- Ajout du diaporama des images des étudiants -->
        <div class="slider">
            <img class="slide" src="e1.jpg" alt="Image 1" width="600" height="400">
            <img class="slide" src="e2.jpg" alt="Image 2" width="600" height="400">
            <img class="slide" src="e3.jpg" alt="Image 3" width="600" height="400">
            <img class="slide" src="e4.jpg" alt="Image 4" width="600" height="400">
            <div class="controls">
              <button class="prev"><</button>
              <button class="next">></button>
            </div>
          </div>
          <marquee style="background: linear-gradient(to right, #5e5756, #8f8488); margin-top: 50px; font-family: Arial, sans-serif; color: #FFFFFF; letter-spacing: 1px; word-spacing: 2px; font-size: 20px;" direction="left" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="20">
            <div class="marqu">L’éducation est le passeport pour l’avenir, car demain appartient à ceux qui s’y préparent aujourd’hui. « C’est votre attitude, et non vos aptitudes, qui déterminera votre altitude. » « Si vous pensez que l’éducation coûte cher, essayez l’ignorance. » « La seule personne qui est éduquée est celle qui a appris à apprendre... et le changement.</div>
        </marquee>
          
          <style> 
            .date-time { /* Ajouter un cadre */ 
      border: 2px solid rgb(241, 238, 238); 
    }
  
        #date { /* Changer la couleur de la date */ color: rgb(155, 155, 155); }
        
        #time { /* Changer la couleur de l’heure */ color: rgb(95, 99, 95); }
        
        .date-time img { /* Minimiser la taille de l’icône du calendrier */ width: 20px; height: 20px; } 

            </style>
    
    
    <style>
        body.dark-mode {
    background-color: #222;
    color: #fff;
}

.button, #mode-switch {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 10px;
    color: #fff;
    background-color: #050505;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-size: 15px;
    transition: background-color 0.3s ease;
}

.button:hover, #mode-switch:hover {
    background-color: #161816;
}

.button .fa, #mode-switch .fa {
    margin-right: 5px;
}

#mode-switch {
    position: absolute;
    right: 20px;
    top: 20px;
    background-color: #000;
    color: #fff;
}
body.dark-mode .logo img {
    filter: invert(1);
}

    </style>
          
    </main>
    <footer>
        <p>© 2023 E-learning. Tous droits réservés.</p>
        <a href="https://www.linkedin.com/"><img src="linkedin.png" alt="LinkedIn"></a> <!-- Ajout de l'icône de LinkedIn -->
        <a href="https://www.facebook.com/"><img src="facebook.png" alt="Facebook"></a> <!-- Ajout de l'icône de Facebook -->
        <a href="https://www.instagram.com/"><img src="instagram.png" alt="Instagram"></a> <!-- Ajout de l'icône de Instagram -->
        <a href="mailto:abdellah.agnaou@um5r.ac.ma"><img src="email.png" alt="Email"></a> <!-- Ajout de l'icône de Email -->
        <p><i class="fa fa-envelope"></i> Email : abdellah.agnaou@um5r.ac.ma</p> <!-- Ajout de l'adresse email -->
        <p><i class="fa fa-map-marker"></i> Adresse : Faculté des sciences Rabat</p> <!-- Ajout de l'adresse -->
        <p><i class="fa fa-phone"></i> Téléphone : +212 6 37 45 10 36</p> <!-- Ajout du numéro de téléphone -->
    </footer>
    <!-- Ajout d’un script pour rendre le site interactif -->
    <!-- Ajout d’un script pour rendre le site interactif -->
<script>
    // Fonction pour basculer entre le mode sombre et le mode jour
    function switchMode() {
        var element = document.body;
        element.classList.toggle("dark-mode"); // Ajoute ou supprime la classe dark-mode
        var button = document.getElementById("mode-switch");

        // Stocke l'état actuel du mode sombre dans le stockage local
        localStorage.setItem("darkMode", element.classList.contains("dark-mode"));

        // Met à jour le texte du bouton en fonction du mode sombre
        if (element.classList.contains("dark-mode")) {
            button.innerHTML = '<i class="fa fa-sun-o"></i> Day Mode';
        } else {
            button.innerHTML = '<i class="fa fa-moon-o"></i> Night Mode';
        }
    }

    // Fonction pour charger l'état du mode sombre au chargement de la page
    window.onload = function () {
        var darkMode = localStorage.getItem("darkMode");
        var element = document.body;
        var button = document.getElementById("mode-switch");

        // Applique le mode sombre si l'état précédent était sombre
        if (darkMode === "true") {
            element.classList.add("dark-mode");
            button.innerHTML = '<i class="fa fa-sun-o"></i> Day Mode';
        }
    };
</script>


<script type="text/javascript">
    // Function to initialize the Google Translate Element
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'fr',
            includedLanguages: 'ar,en,es,fr',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false
        }, 'google_translate_element');
    }

    // Function to trigger translation
    function translatePage(languageCode) {
        var translateElement = new google.translate.TranslateElement({});
        translateElement.getPageLanguage = function () { return 'fr'; }; // Set the source language

        // Trigger translation to the selected language
        translateElement.showWidget({
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false,
            multilanguagePage: true,
            pageLanguage: languageCode
        });
    }
</script>
<script>
function logout() {
    // Supprimer toutes les variables de session
    sessionStorage.clear();

    // Rediriger l'utilisateur vers la page de connexion
    window.location.href = "../login.php";
}

</script>
</head>
<body>
<!-- Your existing body content here -->





    <script src="main.js"></script>
    <script src="heure.js"></script>
    <script src="s.js"></script>
    <script src="script1.js"></script>
    
    
    
    
    
</body>
</html>

