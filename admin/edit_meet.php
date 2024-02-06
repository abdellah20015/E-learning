<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="courses/algo.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Modifier</title>
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
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        margin: 10px 0;
        font-size: 1.2em;
        color: #333;
    }

    form input[type="text"],
    form input[type="email"] {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
        font-size: 1em;
    }

    form input[type="text"],
    form input[type="sujet"] {
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


// Se connecter à la base de données
try {
    $bdd = new PDO("mysql:host=localhost;dbname=elearning;charset=utf8", "root", "");
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// Vérifier si l’id de l’utilisateur est passé en paramètre
if (isset($_GET["id"])) {
    // Récupérer l’id de l’utilisateur
    $id = $_GET["id"];

    // Sélectionner les données de l'utilisateur à partir de la table users
    $req = $bdd->prepare("SELECT * FROM meet WHERE id = ?");
    $req->execute(array($id));

    // Vérifier si l'utilisateur existe
    if ($req->rowCount() == 1) {
        // Récupérer les données de l'utilisateur
        $meet = $req->fetch();
        $nom = $meet["nom"];
        $prenom = $meet["prenom"];
        $email = $meet["email"];
        $sujet = $meet["sujet"];
    } else {
        // Afficher un message d'erreur
        echo "Aucun utilisateur trouvé avec cet id.";
        exit;
    }
}

// Vérifier si le formulaire de modification a été soumis
if (isset($_POST["submit"])) {
    // Récupérer les données du formulaire
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];

    // Vérifier si les champs ne sont pas vides
    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($sujet)) {
        // Mettre à jour les données de l'utilisateur dans la table users
        $req = $bdd->prepare("UPDATE meet SET nom = ?, prenom = ?, email = ?, sujet = ? WHERE id = ?");
        $req->execute(array($nom, $prenom, $email, $id, $sujet));

        // Afficher un message de succès
        echo "Utilisateur modifié avec succès.";
        // Rediriger vers la page des utilisateurs
        header("Location: meet1.php");
        exit;
    } else {
        // Afficher un message d'erreur
        echo "Veuillez remplir tous les champs.";
    }
}
?>


<div class="content">
<center> <h2>Modifier un utilisateur</h2></center>
        <form method="post" action="edit_meet.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>">
            </p>
            <p>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>">
            </p>
            <p>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </p>
            <p>
                <label for="sujet">Sujet :</label>
                <input type="sujet" id="sujet" name="sujet" value="<?php echo $sujet; ?>">
            </p>
            <p>
                <input type="submit" name="submit" value="Modifier">
            </p>
        </form>
    </div>


 <!-- FOOTER -->
<footer>
		<div class="footer-container">
			<div class="left-col">
				<<img src="logo.png" style="width: 100px; filter: invert(1);" id="logo">
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



<html>
<head>