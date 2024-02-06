<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/online-tutorials.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Meet</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
  h1 {
    font-size: 1.5em; /* Diminuer la taille de l'en-tête */
  }

  table {
    border-collapse: collapse; /* Fusionner les bordures */
    width: 100%; /* Largeur du tableau */
    margin-top: 50px; /* Ajouter de l'espace en haut du tableau */
  }

  th, td {
    border: 1px solid black; /* Bordure des cellules */
    padding: 10px; /* Espacement interne des cellules */
    text-align: left; /* Alignement du texte à gauche */
  }

  tr:nth-child(even) {
    background-color: #f2f2f2; /* Couleur de fond des lignes paires */
  }

  tr:hover {
    background-color: #d9d9d9; /* Couleur de fond des lignes au survol */
  }

  
</style>








    <script>
		$(window).on('scroll', function(){
  			if($(window).scrollTop()){
  			  $('nav').addClass('black');
 			 }else {
 		   $('nav').removeClass('black');
 		 }
		})
	</script>

</head>
<body>
<!-- Navigation Bar -->
	<header id="header">
		<nav>
        <div class="logo">
            <a href="index.html"><img src="logo.png" alt="Logo E-learning"></a> <!-- Ajout du lien vers la page d'accueil -->
        </div>
			<ul>
				
			<li><a href="index.html">Acceuil</a></li>
            <li><a href="ajouter_cours.php">Ajouter cours</a></li>
			<li><a href="ajouter_exercices.php">Ajouter exercices</a></li>
				<li><a href="messages.php">Messages</a></li>
                <li><a href="meet.php">Meet</a></li>
				<li><a href="users.php">Utilisateurs</a></li>
				<li><a href="dash.php">Dashboard</a></li>
				<li><a href="logout.php">Déconnexion</a></li>
			</ul>


            
			<img src="images/icon/menu.png" class="menu" onclick="sideMenu(0)" alt="menu">
		</nav>
		<div class="head-container">
			<div class="quote">
				<p>Admin</p>
				</div>
        <div class="svg-image">
				<img src="extra/svg1.jpg" alt="svg">
			</div>
		</div>
			
		</div>




        <?php
// Démarrer ou reprendre la session
session_start();

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
echo "h1 {"; // Ajout des styles pour le titre "Meeting"
echo "text-align: center;"; // Centrer le texte
echo "color: #4CAF50;"; // Couleur du texte
echo "}";
echo "</style>";
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
echo "parentNode: document.querySelector('#meet'),";
echo "userInfo: {";
echo "displayName: 'Professeur'";
echo "},";
echo "interfaceConfigOverwrite: {";
echo "TOOLBAR_BUTTONS: ['microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen', 'fodeviceselection', 'hangup', 'profile', 'chat', 'recording', 'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand', 'videoquality', 'filmstrip', 'invite', 'feedback', 'stats', 'shortcuts', 'tileview', 'videobackgroundblur', 'download', 'help', 'mute-everyone', 'e2ee'],";
echo "SETTINGS_SECTIONS: ['devices', 'language'],";
echo "VIDEO_LAYOUT_FIT: 'both',";
echo "filmStripOnly: false,";
echo "VERTICAL_FILMSTRIP: true";
echo "}";
echo "};";
echo "const api = new JitsiMeetExternalAPI(domain, options);";
echo "function quitMeeting() {"; // Fonction pour quitter la réunion
echo "api.dispose();";
echo "}";
echo "</script>";
echo "</body>";
echo "</html>";
?>


































































        <!-- FOOTER -->
<footer>
		<div class="footer-container">
			<div class="left-col">
			<img src="logo.png" style="width: 100px; filter: invert(1);" id="logo">
				<div class="logo"></div>
				<div class="social-media">
				<a href="https://www.facebook.com/"><img src="icon\fb.png"></a>
					<a href="https://www.instagram.com/"><img src="icon\insta.png"></a>
					<a href="https://www.linkedin.com/"><img src="icon\linkedin.png"></a>
				</div><br><br>
				<p class="rights-text">Copyright © 2023 Créer par Abdellah Agnaou</p>
				<br><p><img src="icon/location.png"> Université Mohamed V<br>Faculté des sciences Rabat</p><br>
				<p><img src="icon/phone.png"> +212 637-45-10-36<br><img src="icon/mail.png">&nbsp; abdellah.agnaou@um5r.ac.ma</p>
			</div>

			<div class="svg-image">
				<img src="extra/svg1.jpg" alt="svg">
			</div>
			
	</footer>










</body> </html>