<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/help.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Réponse</title>
	<meta name="desciption" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="script.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
  table {
    border-collapse: collapse; /* Fusionner les bordures */
    width: 100%; /* Largeur du tableau */
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




<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

form {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
}

form label {
    display: block;
    margin: 10px 0;
    font-size: 1.2em;
    color: #333;
}

form input[type="text"], form textarea {
    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ddd;
    font-size: 1em;
}

form input[type="submit"] {
        display: block;
        width: 100px;
        margin: 20px auto;
        padding: 10px;
        border: none;
        background-color: #808080;
        color: #fff;
        cursor: pointer;
    }

    form input[type="submit"]:hover {
        background-color: #A9A9A9;
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





























        <?php
// Démarrer la session
session_start();

// Définir l'encodage interne en UTF-8
mb_internal_encoding("UTF-8");

// Inclure la bibliothèque PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Charger les classes PHPMailer
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php'; 
require 'phpmailer/src/SMTP.php';

// Vérifier si l’email de l’utilisateur est passé dans l’URL
if (isset($_GET["email"])) {
    // Récupérer l’email de l’utilisateur
    $email = $_GET["email"];

    // Vérifier si le formulaire de réponse a été soumis
    if (isset($_POST["submit"])) {
        // Récupérer le message de réponse
        $reponse = htmlspecialchars($_POST["reponse"], ENT_QUOTES, 'UTF-8');

        // Créer un objet PHPMailer
        $mail = new PHPMailer();

        // Configurer les paramètres SMTP
        $mail->isSMTP(); // Utiliser SMTP
        $mail->Host = 'smtp.gmail.com'; // Nom d'hôte du serveur SMTP
        $mail->SMTPAuth = true; // Activer l'authentification SMTP
        $mail->Username = 'abdellah.agnaou@um5r.ac.ma'; // Nom d'utilisateur SMTP
        $mail->Password = 'nzid xtcw yczo kcgu'; // Mot de passe SMTP
        $mail->SMTPSecure = 'tls'; // Activer le chiffrement TLS
        $mail->Port = 587; // Port TCP du serveur SMTP

        // Configurer les paramètres de l'email
        $mail->setFrom('abdellah.agnaou@um5r.ac.ma', 'E-learning'); // Expéditeur
        $mail->addAddress($email); // Destinataire
        $mail->isHTML(true); // Activer le support HTML

        // Sujet et corps de l'email
        $mail->Subject = "Réponse à votre message sur E-learning";
        $mail->Body = "Bonjour,\n\nNous avons bien reçu votre message sur E-learning et nous vous remercions de votre intérêt. Voici notre réponse à votre message :\n\n$reponse\n\nCordialement,\nL'équipe de E-learning";

        // Envoyer l'email
        if ($mail->send()) {
            // Afficher un message de succès
            echo "Votre message de réponse a bien été envoyé.";
        } else {
            // En cas d'échec de l'envoi, afficher un message d'erreur
            echo "Erreur lors de l'envoi du message de réponse : " . $mail->ErrorInfo;
        }
    }

    // Afficher le formulaire de réponse
    ?>
    <form action='reply.php?email=<?php echo $email; ?>' method='post'>
        <label for='reponse'>Réponse :</label>
        <textarea name='reponse' id='reponse' rows='10' cols='50'></textarea>
        <input type='submit' name='submit' value='Envoyer'>
    </form>
    <?php
}
?>


















<!-- FOOTER -->
<footer>
		<div class="footer-container">
			<div class="left-col">
				<img src="logo.png" style="width: 100px;">
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









</body>
</html>