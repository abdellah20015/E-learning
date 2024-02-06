<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-query.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="icon/brainbooster.png" type="image/icon type">
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


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        #about {
            margin: 50px 0;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px #ddd;
        }

        #about h1 {
            color: #333;
            font-size: 30px;
        }

        #about p {
            line-height: 1.6;
        }
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

</style>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }
    header {
        background-color: #f5efef;
        color: white;
        padding: 10px;
        text-align: center;
    }
    nav ul {
        list-style-type: none;
        padding: 0;
    }
    nav ul li {
        display: inline;
        margin-right: 10px;
    }
    nav ul li a {
        color: white;
        text-decoration: none;
    }
    h1 {
        color: #333;
    }
    p {
        color: #666;
    }
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>





<?php
// Ce script permet de traiter le formulaire de contact
// Démarrer ou reprendre la session
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

// On se connecte à la base de données
try {
    $bdd = new PDO("mysql:host=localhost;dbname=elearning;charset=utf8", "root", "");
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// On vérifie que les données du formulaire sont bien reçues
if (isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["sujet"]) && isset($_POST["message"])) {
    // On récupère les données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];

    // On insère le message dans la table contacts
    $req = $bdd->prepare("INSERT INTO contacts (nom, email, sujet, message) VALUES (?, ?, ?, ?)");
    $req->execute(array($nom, $email, $sujet, $message));

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
    echo "<meta charset='UTF-8'>";
    // Configurer les paramètres de l'email
    $mail->setFrom('abdellah.agnaou@um5r.ac.ma', 'E-learning'); // Expéditeur
    $mail->addAddress($email); // Destinataire
    $mail->isHTML(true); // Activer le support HTML
    $mail->Subject = "Confirmation de votre message sur E-learning";
    $mail->Body = "Bonjour $nom,<br><br>Nous avons bien reçu votre message sur E-learning. Nous vous remercions de votre intérêt et nous vous répondrons dans les meilleurs délais.<br><br>Votre message était :<br><br>$sujet<br><br>$message<br><br>Cordialement,<br>L'équipe de E-learning";

    // Envoyer l'email
    if ($mail->send()) {
        // On renvoie un message de succès
        echo "Votre message a bien été envoyé. Vous allez recevoir un email de confirmation.";
    } else {
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de l'envoi du message : " . $mail->ErrorInfo;
    }
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