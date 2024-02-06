<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/papers.jpg">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Ajouter</title>
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

/* Définir une police et une couleur de fond pour le formulaire */
form {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
}

/* Utiliser une liste non ordonnée pour organiser les champs du formulaire */
ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* Ajouter une marge entre chaque élément de la liste */
form li + li {
    margin-top: 10px;
}

/* Aligner les labels et les champs sur la même ligne */
label {
    display: inline-block;
    width: 150px;
    text-align: right;
}

/* Ajouter une marge à gauche des champs pour les séparer des labels */
input, textarea {
    margin-left: 20px;
}

/* Ajouter une bordure et des coins arrondis aux champs */
input, textarea {
    border: 1px solid #999;
    border-radius: 5px;
    padding: 5px;
    width: 400px;
    box-sizing: border-box;
}

/* Ajuster la hauteur du textarea en fonction du nombre de lignes */
textarea {
    height: 100px;
}

/* Ajouter une couleur de fond aux champs lorsqu’ils ont le focus */
input:focus, textarea:focus {
    background-color: #e0e0e0;
}

/* Aligner le bouton avec les champs */
.button {
    padding-left: 170px;
}

/* Modifier l’apparence du bouton */
button {
    background-color: #3CBC8D;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

/* Ajouter un effet de survol au bouton */
button:hover {
    background-color: #2E8B57;
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
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification si le formulaire d'ajout a été soumis
if (isset($_POST["submit"])) {
    // Récupération des données du cours
    $titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $module = isset($_POST["module"]) ? $_POST["module"] : "";
    $image = isset($_FILES["image"]) ? $_FILES["image"] : null; // Ajout de l'attribut image

    // Vérification de la validité des données
    if ($titre != "" && $description != "" && $module != "" && $image != null) {
        // Gestion de l'upload des fichiers
        $image_data = addslashes(file_get_contents($_FILES['image']['tmp_name'])); // Use addslashes() function to escape special characters in a string for use in an SQL statement

        // Requête SQL pour insérer le cours
        $sql = "INSERT INTO cours (titre, description, module, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $titre, $description, $module, $image_data); // Change bind_param type to "ssss"
        $stmt->execute();

        // Vérification du nombre de lignes affectées
        if ($stmt->affected_rows == 1) {
            // Affichage d'un message de succès
            echo "Le cours a été ajouté avec succès.";
        } else {
            // Affichage d'un message d'erreur
            echo "Erreur lors de l'ajout du cours.";
        }
    } else {
        // Affichage d'un message d'erreur
        echo "Veuillez remplir tous les champs.";
    }
}

// Affichage du formulaire d'ajout
echo "<form action='add.php' method='post' enctype='multipart/form-data'>";
echo "<label for='titre'>Titre:</label>";
echo "<input type='text' name='titre' id='titre' required>";
echo "<label for='description'>Description:</label>";
echo "<textarea name='description' id='description' rows='10' cols='50' required></textarea>";
echo "<label for='module'>Module:</label>";
echo "<input type='text' name='module' id='module' required>";
echo "<label for='image'>Image:</label>"; // Ajout du champ image
echo "<input type='file' name='image' id='image' required>";
echo "<input type='submit' name='submit' value='Ajouter'>";
echo "</form>";

// Fermeture de la connexion
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
			
	</footer>













</body> </html>