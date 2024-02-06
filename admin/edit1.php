<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/papers.jpg">
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

// Récupération de l'id du cours à éditer
$id = isset($_GET["id"]) ? $_GET["id"] : "";

// Vérification de la validité de l'id
if ($id != "" && is_numeric($id)) {
    // Requête SQL pour sélectionner les données du cours
    $sql = "SELECT titre, description, module, image FROM exercices WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérification du nombre de résultats
    if ($result->num_rows == 1) {
        // Récupération des données du cours
        $row = $result->fetch_assoc();
        $titre = $row["titre"];
        $description = $row["description"];
        $module = $row["module"];
        $image = $row["image"]; // Ajout de l'attribut image

        // Vérification si le formulaire d'édition a été soumis
        if (isset($_POST["submit"])) {
            // Récupération des données modifiées
            $titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
            $description = isset($_POST["description"]) ? $_POST["description"] : "";
            $module = isset($_POST["module"]) ? $_POST["module"] : "";
            $image = isset($_FILES["image"]) ? $_FILES["image"] : null; // Ajout de l'attribut image

            // Vérification de la validité des données
            if ($titre != "" && $description != "" && $module != "" && $image != null) {
                // Gestion de l'upload des fichiers
                $image_data = file_get_contents($image["tmp_name"]); // Gestion de l'upload de l'image

                // Requête SQL pour mettre à jour les données du cours
                $sql = "UPDATE exercices SET titre = ?, description = ?, module = ?, image = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssi", $titre, $description, $module, $image_data, $id);
                $stmt->execute();

                // Vérification du nombre de lignes affectées
                if ($stmt->affected_rows == 1) {
                    // Affichage d'un message de succès
                    echo "L'exercice a été modifié avec succès.";
                } else {
                    // Affichage d'un message d'erreur
                    echo "Erreur lors de la modification d'exercice.";
                }
            } else {
                // Affichage d'un message d'erreur
                echo "Veuillez remplir tous les champs.";
            }
        } // Affichage du formulaire d'édition avec les données actuelles du cours
        echo "<form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>";
        echo "<label for='titre'>Titre :</label>";
        echo "<input type='text' name='titre' id='titre' value='$titre' required>";
        echo "<label for='description'>Description :</label>";
        echo "<textarea name='description' id='description' rows='10' cols='50' required>$description</textarea>";
        echo "<label for='module'>Module :</label>";
        echo "<input type='text' name='module' id='module' value='$module' required>";
        echo "<label for='image'>Image :</label>"; // Ajout du champ image
        echo "<input type='file' name='image' id='image' required>";
        echo "<input type='submit' name='submit' value='Modifier'>";
        echo "</form>";
    }
    } else {
        // Affichage d'un message d'erreur
        echo "Aucun exercice trouvé avec cet id.";
    }

// Fermeture de la connexion à la base de données
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
            <p><img src="icon/phone.png"> +212 637-45-10-36<br><img src="icon/mail.png">  abdellah.agnaou@um5r.ac.ma</p>
        </div>
        <div class="svg-image">
				<img src="extra/svg1.jpg" alt="svg">
			</div>
    
    </div>
</footer>






















































        </body> </html>