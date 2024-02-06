<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/user.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Utilisateurs</title>
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










<?php // Démarrer la session 
session_start();



// Se connecter à la base de données 
try { $bdd = new PDO("mysql:host=localhost;dbname=elearning;charset=utf8", "root", ""); } 
catch (Exception $e) { die("Erreur : " . $e->getMessage()); }

// Sélectionner les utilisateurs de la table users 
$req = $bdd->query("SELECT * FROM users");

// Créer un tableau HTML pour afficher les utilisateurs 
echo "<table>"; echo "<tr>"; echo "<th>Id</th>"; echo "<th>Nom</th>"; echo "<th>prenom</th>"; echo "<th>Email</th>"; echo "<th>Action</th>"; echo "</tr>";

// Parcourir les utilisateurs 
while ($utilisateurs= $req->fetch()) { // Récupérer les données de l’utilisateur 
    $id = $utilisateurs["id"]; $nom = $utilisateurs["nom"]; $prenom = $utilisateurs["prenom"]; $email = $utilisateurs["email"];

// Afficher les données de l'utilisateur dans une ligne du tableau
echo "<tr>";
echo "<td>$id</td>";
echo "<td>$nom</td>";
echo "<td>$prenom</td>";
echo "<td>$email</td>";
echo "<td>";
// Bouton pour modifier l’utilisateur 
echo "<a href='edit_user.php?id=$id'><i class='fa fa-edit'></i></a>"; 
// Bouton pour supprimer l’utilisateur 
echo "<a href='delete_user.php?id=$id'><i class='fa fa-trash'></i></a>";
echo "</td>";
echo "</tr>";

}
// Fermer le tableau 
echo "</table>"; ?>







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