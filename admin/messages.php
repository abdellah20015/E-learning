<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/help.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Messages</title>
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
			
        















    <?php
// Démarrer la session
session_start();

// Créer un tableau vide pour stocker les messages acceptés
if (!isset($_SESSION['accepted'])) {
  $_SESSION['accepted'] = array();
}

// Ajouter l'id du message accepté au tableau
if (isset($_GET['id'])) {
  $_SESSION['accepted'][] = $_GET['id'];
}

// Se connecter à la base de données
try {
    $bdd = new PDO("mysql:host=localhost;dbname=elearning;charset=utf8", "root", "");
    // Activer le mode d’erreur exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Sélectionner les messages de la table contacts
try {
    $req = $bdd->query("SELECT * FROM contacts");

    // Vérifier si la requête a réussi
    if ($req === false) {
        // Afficher le message d’erreur
        echo "Erreur : " . print_r($bdd->errorInfo(), true);
    } else {
        // Créer un tableau HTML pour afficher les messages
        echo "<table>";
        echo "<tr>";
        echo "<th>Nom</th>";
        echo "<th>Email</th>";
        echo "<th>Sujet</th>";
        echo "<th>Message</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        // Parcourir les messages
        while ($message = $req->fetch()) {
            // Récupérer les données du message
            $id = $message["id"];
            $nom = $message["nom"];
            $email = $message["email"];
            $sujet = $message["sujet"];
            $contenu = $message["message"];

            // Afficher les données du message dans une ligne du tableau
            echo "<tr>";
            echo "<td>$nom</td>";
            echo "<td>$email</td>";
            echo "<td>$sujet</td>";
            echo "<td>$contenu</td>";
            // Afficher les boutons d'action pour chaque message
            echo "<td>";
            // Vérifier si le message a été accepté
            if (in_array($id, $_SESSION['accepted'])) {
              // Cacher le bouton rejeter et afficher le bouton répondre
              echo "<a href='reject.php?id=$id' style='display: none'><i class='fa fa-trash'></i></a>";
              echo "<a href='reply.php?email=$email' class='button-reply'><i class='fa fa-reply'></i></a>";
            } else {
              // Afficher les boutons accepter et rejeter
              echo "<a href='accept.php?id=$id' class='button-accept'><i class='fa fa-check'></i></a>";
              echo "<a href='reject.php?id=$id' class='button-reject'><i class='fa fa-trash'></i></a>";
            }
            echo "</td>";
            echo "</tr>";
        }

        // Fermer le tableau
        echo "</table>";
    }
} catch (PDOException $e) {
    // Afficher l’exception
    echo "Exception : " . $e->getMessage();
}
?>


<style>
  /* Définir les classes de couleur pour les boutons */
.button-accept {
  background-color: green;
  color: white;
}

.button-reject {
  background-color: red;
  color: white;
}

.button-reply {
  background-color: blue;
  color: white;
}

</style>






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












</body>
</html>