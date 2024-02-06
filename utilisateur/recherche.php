<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-query.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="icon/search.png" type="image/icon type">
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
.course-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.course-tile {
  width: 200px;
  height: 300px;
  margin: 10px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
}

.course-tile img {
  width: 100%;
  height: auto;
}

.course-tile button {
  display: inline-block;
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  text-align: center;
  padding: 15px 32px;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


    </style>

<style>
a.unique-link {
    /* Add your styles here */
    background-color: #000000; /* Change the background color to gray */
    color: #fff;
}

a.unique-link:hover {
    background-color: #696969; /* Change the hover background color to a darker gray */
}

</style>




<?php
        // Récupérer les paramètres de recherche
        $q = isset($_GET["q"]) ? $_GET["q"] : '';
        // Initialiser la variable $type
        $type = '';

        // Vérifier si la clé "type" existe dans le tableau $_GET
        if (isset($_GET['type'])) {
          // Récupérer le paramètre "type"
          $type = $_GET['type'];
          // Faire quelque chose avec $type
        }

        // Se connecter à la base de données
        $db = new PDO("mysql:host=localhost;dbname=elearning", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête SQL
        $sql = "SELECT * FROM cours WHERE titre LIKE :q OR description LIKE :q";

        // Exécuter la requête SQL
        $stmt = $db->prepare($sql);
        $stmt->execute(array(":q" => "%$q%"));

        // Afficher les résultats
        echo "<h1>Résultats de la recherche pour '$q'</h1>";
        echo "<div class='course-container'>"; // Ajout du conteneur

          // Parcourir les résultats
    while ($row = $stmt->fetch()) {
      // Vérifier si le type de fichier du cours correspond au type de fichier choisi
      if ($type === '' || (isset($row["type"]) && $row["type"] == $type)) {
        // Afficher le cours
        echo "<div class='course-tile'>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Image du cours'>";
        echo "<style>
        .unique-link {
          display: inline-block;
          padding: 10px 20px;
          color: white;
          background-color: black;
          text-decoration: none;
          border-radius: 5px;
          transition: background-color 0.3s ease;
      }
      
      .unique-link:hover {
          background-color: darkgray;
      }
      
        </style>";
        echo "<a href='cours{$row["id"]}.html' class='unique-link'><i class='fa fa-plus'></i> {$row["titre"]}</a>";

         // Ajout du bouton avec le titre du cours
        echo "</div>";
      }
    }
        echo "</div>"; // Fermeture du conteneur

        // Fermer la connexion à la base de données
        $db = null;
        ?>



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
    <script src="main.js"></script>
    
    
</body>
</html>

