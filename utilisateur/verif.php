<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Meeting</title>
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
  

  // Démarrer ou reprendre la session
  session_start();

  // Définir l'encodage interne en UTF-8
mb_internal_encoding("UTF-8");

  // Inclure la bibliothèque PHPMailer
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'phpmailer/src/Exception.php';
  require 'phpmailer/src/PHPMailer.php'; 
  require 'phpmailer/src/SMTP.php';

  // Définir l'encodage UTF-8
  header('Content-Type: text/html; charset=utf-8');
  // Connexion à la base de données
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "elearning";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Vérification de la connexion
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Récupération des données du formulaire
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Requête SQL pour vérifier si l'utilisateur existe
  $sql = "SELECT * FROM meet WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  // Si l'utilisateur existe
  if ($result->num_rows > 0) {
    // Génération d'un code d'accès aléatoire
    $code = rand(1000, 9999);

    // Stockage du code d'accès dans la variable $_SESSION
    $_SESSION["code"] = $code;

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
    $mail->Subject = 'Code d\'accès au meeting'; // Sujet
    $mail->Body = 'Bonjour, voici votre code d\'accès au meeting : '.$code; // Corps

    // Envoyer l'email
    if ($mail->send()) {
      // Affichage de la page de meeting avec un champ pour saisir le code d'accès
      echo "<style>";
echo ".field {";
echo "    margin-bottom: 20px;";
echo "}";
echo ".field label {";
echo "    display: block;";
echo "    margin-bottom: 5px;";
echo "    font-weight: bold;";
echo "}";
echo ".field input {";
echo "    width: 100%;";
echo "    padding: 10px;";
echo "    border: 1px solid #ccc;";
echo "    border-radius: 4px;";
echo "    box-sizing: border-box;";
echo "}";
echo ".field input[type='submit'] {";
echo "    width: auto;";
echo "    background-color: #4CAF50;";
echo "    color: white;";
echo "    cursor: pointer;";
echo "}";
echo ".field input[type='submit']:hover {";
echo "    background-color: #45a049;";
echo "}";
echo "</style>";
echo "<style>
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

<style>
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
    input[type='submit'] {
        background-color: black;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }
    input[type='submit']:hover {
        background-color: #444;
    }
</style>";
echo "<meta charset='UTF-8'>";
      echo "<h1><i class='fa fa-users'></i> Meeting</h1>";
      echo "<p><i class='fa fa-info-circle'></i> Veuillez saisir le code d'accès que vous avez reçu par email.</p>";
      echo "<form action='join.php' method='post'>";
      echo "<label for='code'><i class='fa fa-key'></i> Code d'accès :</label>";
      echo "<input type='text' id='code' name='code' required>";
      echo "<input type='submit' value=' Rejoindre le meeting'>";
      echo "</form>";

    } else {
      // Affichage d'un message d'erreur et redirection vers la page connexion.html
      echo "<p>Une erreur est survenue lors de l'envoi de l'email. Veuillez réessayer.</p>";
      header("Refresh: 3; URL=connect.html");
    }
  } else {
    // Affichage d'un message d'erreur et redirection vers la page connexion.html
    echo "<p>Identifiants incorrects. Veuillez réessayer.</p>";
    header("Refresh: 3; URL=connect.html");
  }

  // Fermeture de la connexion
  $conn->close();
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



