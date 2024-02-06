<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/books.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Ajouter des cours</title>
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, titre, description, module, image FROM exercices";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Titre</th><th>Description</th><th>Module</th><th>Image</th><th>Action</th></tr>";

if ($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["titre"]. "</td><td>" . $row["description"]. "</td><td>" . $row["module"]. "</td><td><img src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' width='50' height='50' /></td>
    <td><a href='edit1.php?id=".$row["id"]."' style='color: green;'><i class='fa fa-pencil'></i> Éditer</a> <a href='accepter1.php?id=".$row["id"]."' style='color: blue;'><i class='fa fa-check'></i> Accepter</a> <a href='refuse1.php?id=".$row["id"]."' style='color: red;'><i class='fa fa-trash'></i> Refuser</a></td></tr>";
  }
} else {
  echo "0 results";
}

echo "</table>";
echo "<a href='add1.php'>Ajouter <i class='fa fa-plus'></i></a>";

$conn->close();
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