<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="icon/p3.png">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Comaptible" content="IE=edge">
	<title>Statistiques</title>
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
			
		</div>


        <?php
// Connexion à la base de données elearning
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requêtes SQL pour compter le nombre d’utilisateurs, de meet, de cours et de messages
$sql_users = "SELECT COUNT(*) AS nb_users FROM users";
$sql_meet = "SELECT COUNT(*) AS nb_meet FROM meet";
$sql_cours = "SELECT COUNT(*) AS nb_cours FROM cours";
$sql_exercices = "SELECT COUNT(*) AS nb_exercices FROM exercices";
$sql_messages = "SELECT COUNT(*) AS nb_messages FROM contacts";

// Exécution des requêtes et récupération des résultats
$result_users = $conn->query($sql_users);
$result_meet = $conn->query($sql_meet);
$result_cours = $conn->query($sql_cours);
$result_exercices = $conn->query($sql_exercices);
$result_messages = $conn->query($sql_messages);

// Fermeture de la connexion
$conn->close();

// Vérification des résultats et affectation des variables
if ($result_users->num_rows > 0) {
    $row_users = $result_users->fetch_assoc();
    $nb_users = $row_users["nb_users"];
} else {
    $nb_users = 0;
}

if ($result_meet->num_rows > 0) {
    $row_meet = $result_meet->fetch_assoc();
    $nb_meet = $row_meet["nb_meet"];
} else {
    $nb_meet = 0;
}

if ($result_cours->num_rows > 0) {
    $row_cours = $result_cours->fetch_assoc();
    $nb_cours = $row_cours["nb_cours"];
} else {
    $nb_cours = 0;
}

if ($result_exercices->num_rows > 0) {
    $row_exercices = $result_exercices->fetch_assoc();
    $nb_exercices = $row_exercices["nb_exercices"];
} else {
    $nb_exercices = 0;
}

if ($result_messages->num_rows > 0) {
    $row_messages = $result_messages->fetch_assoc();
    $nb_messages = $row_messages["nb_messages"];
} else {
    $nb_messages = 0;
}

// Calcul du total et des pourcentages
$total = $nb_users + $nb_meet + $nb_cours + $nb_exercices + $nb_messages;
$pc_users = round($nb_users / $total * 100, 2);
$pc_meet = round($nb_meet / $total * 100, 2);
$pc_cours = round($nb_cours / $total * 100, 2);
$pc_exercices = round($nb_exercices / $total * 100, 2);
$pc_messages = round($nb_messages / $total * 100, 2);

// Affichage des cartes
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
';
echo '<div class="container">';
echo '<div class="row">';

echo '<div class="col-sm-4">';
echo '<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">';
echo '<div class="card-header"><i class="fas fa-users"></i> Utilisateurs</div>';
echo '<div class="card-body">';
echo "<h5 class=\"card-title\">$nb_users</h5>";
echo "<p class=\"card-text\">$pc_users%</p>";
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="col-sm-4">';
echo '<div class="card text-white bg-success mb-3" style="max-width: 18rem;">';
echo '<div class="card-header"><i class="fas fa-video"></i> Meet</div>';
echo '<div class="card-body">';
echo "<h5 class=\"card-title\">$nb_meet</h5>";
echo "<p class=\"card-text\">$pc_meet%</p>";
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="col-sm-4">';
echo '<div class="card text-white bg-info mb-3" style="max-width: 18rem;">';
echo '<div class="card-header"><i class="fas fa-book"></i> Cours</div>';
echo '<div class="card-body">';
echo "<h5 class=\"card-title\">$nb_cours</h5>";
echo "<p class=\"card-text\">$pc_cours%</p>";
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="col-sm-4">';
echo '<div class="card text-white bg-warning mb-3" style="max-width: 18rem;">';
echo '<div class="card-header"><i class="fas fa-pencil-alt"></i> Exercices</div>';
echo '<div class="card-body">';
echo "<h5 class=\"card-title\">$nb_exercices</h5>";
echo "<p class=\"card-text\">$pc_exercices%</p>";
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="col-sm-4">';
echo '<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">';
echo '<div class="card-header"><i class="fas fa-envelope"></i> Messages</div>';
echo '<div class="card-body">';
echo "<h5 class=\"card-title\">$nb_messages</h5>";
echo "<p class=\"card-text\">$pc_messages%</p>";
echo '</div>';
echo '</div>';
echo '</div>';

echo '</div>'; // Fin de la rangée
echo '</div>'; // Fin du conteneur



?>




		<?php
// Connexion à la base de données elearning
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requêtes SQL pour compter le nombre d’utilisateurs, de meet, de cours et de messages
$sql_users = "SELECT COUNT(*) AS nb_users FROM users";
$sql_meet = "SELECT COUNT(*) AS nb_meet FROM meet";
$sql_cours = "SELECT COUNT(*) AS nb_cours FROM cours";
$sql_exercices = "SELECT COUNT(*) AS nb_exercices FROM exercices";
$sql_messages = "SELECT COUNT(*) AS nb_messages FROM contacts";

// Exécution des requêtes et récupération des résultats
$result_users = $conn->query($sql_users);
$result_meet = $conn->query($sql_meet);
$result_cours = $conn->query($sql_cours);
$result_exercices = $conn->query($sql_exercices);
$result_messages = $conn->query($sql_messages);

// Fermeture de la connexion
$conn->close();

// Vérification des résultats et affectation des variables
if ($result_users->num_rows > 0) {
    $row_users = $result_users->fetch_assoc();
    $nb_users = $row_users["nb_users"];
} else {
    $nb_users = 0;
}

if ($result_meet->num_rows > 0) {
    $row_meet = $result_meet->fetch_assoc();
    $nb_meet = $row_meet["nb_meet"];
} else {
    $nb_meet = 0;
}

if ($result_cours->num_rows > 0) {
    $row_cours = $result_cours->fetch_assoc();
    $nb_cours = $row_cours["nb_cours"];
} else {
    $nb_cours = 0;
}

if ($result_exercices->num_rows > 0) {
    $row_exercices = $result_exercices->fetch_assoc();
    $nb_exercices = $row_exercices["nb_exercices"];
} else {
    $nb_exercices = 0;
}

if ($result_messages->num_rows > 0) {
    $row_messages = $result_messages->fetch_assoc();
    $nb_messages = $row_messages["nb_messages"];
} else {
    $nb_messages = 0;
}

// Calcul du total et des pourcentages
$total = $nb_users + $nb_meet + $nb_cours + $nb_exercices + $nb_messages;
$pc_users = round($nb_users / $total * 100, 2);
$pc_meet = round($nb_meet / $total * 100, 2);
$pc_cours = round($nb_cours / $total * 100, 2);
$pc_exercices = round($nb_exercices / $total * 100, 2);
$pc_messages = round($nb_messages / $total * 100, 2);

// Affichage du tableau qui regroupe les nombres et les pourcentages
echo "<table border='1'>";
echo "<tr><th>Table</th><th>Nombre</th><th>Pourcentage</th></tr>";
echo "<tr><td>Utilisateurs</td><td>$nb_users</td><td>$pc_users%</td></tr>";
echo "<tr><td>Meet</td><td>$nb_meet</td><td>$pc_meet%</td></tr>";
echo "<tr><td>Cours</td><td>$nb_cours</td><td>$pc_cours%</td></tr>";
echo "<tr><td>Exercices</td><td>$nb_exercices</td><td>$pc_exercices%</td></tr>";
echo "<tr><td>Messages</td><td>$nb_messages</td><td>$pc_messages%</td></tr>";
echo "<tr><td>Total</td><td>$total</td><td>100%</td></tr>";
echo "</table>";
?>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Chargement de la bibliothèque Google Charts
        google.charts.load('current', {'packages':['corechart']});

        // Fonction pour dessiner le graphe des utilisateurs
        google.charts.setOnLoadCallback(drawChartUsers);
        function drawChartUsers() {
            // Création des données
            var data = google.visualization.arrayToDataTable([
                ['Utilisateurs', 'Nombre'],
                ['Utilisateurs', <?php echo $nb_users; ?>],
                ['Autres', <?php echo $total - $nb_users; ?>]
            ]);

            // Options du graphe
            var options = {
                title: 'Nombre d\'utilisateurs'
            };

            // Création du graphe
            var chart = new google.visualization.PieChart(document.getElementById('piechart_users'));

            // Affichage du graphe
            chart.draw(data, options);
        }

        // Fonction pour dessiner le graphe des meet
        google.charts.setOnLoadCallback(drawChartMeet);
        function drawChartMeet() {
            // Création des données
            var data = google.visualization.arrayToDataTable([
                ['Meet', 'Nombre'],
                ['Meet', <?php echo $nb_meet; ?>],
                ['Autres', <?php echo $total - $nb_meet; ?>]
            ]);

            // Options du graphe
            var options = {
                title: 'Nombre de meet'
            };

            // Création du graphe
            var chart = new google.visualization.PieChart(document.getElementById('piechart_meet'));

            // Affichage du graphe
            chart.draw(data, options);
        }

        // Fonction pour dessiner le graphe des cours
        google.charts.setOnLoadCallback(drawChartCours);
        function drawChartCours() {
            // Création des données
            var data = google.visualization.arrayToDataTable([
                ['Cours', 'Nombre'],
                ['Cours', <?php echo $nb_cours; ?>],
                ['Autres', <?php echo $total - $nb_cours; ?>]
            ]);

            // Options du graphe
            var options = {
                title: 'Nombre de cours'
            };

            // Création du graphe
            var chart = new google.visualization.PieChart(document.getElementById('piechart_cours'));

            // Affichage du graphe
            chart.draw(data, options);
        }

        // Fonction pour dessiner le graphe des exercices
        google.charts.setOnLoadCallback(drawChartExercices);
        function drawChartExercices() {
            // Création des données
            var data = google.visualization.arrayToDataTable([
                ['Exercices', 'Nombre'],
                ['Exercices', <?php echo $nb_exercices; ?>],
                ['Autres', <?php echo $total - $nb_exercices; ?>]
            ]);

            // Options du graphe
            var options = {
                title: 'Nombre d\'exercices'
            };

            // Création du graphe
            var chart = new google.visualization.PieChart(document.getElementById('piechart_exercices'));

            // Affichage du graphe
            chart.draw(data, options);
        }

        // Fonction pour dessiner le graphe des messages
        google.charts.setOnLoadCallback(drawChartMessages);
        function drawChartMessages() {
            // Création des données
            var data = google.visualization.arrayToDataTable([
                ['Messages', 'Nombre'],
                ['Messages', <?php echo $nb_messages; ?>],
                ['Autres', <?php echo $total - $nb_messages; ?>]
            ]);

            // Options du graphe
            var options = {
                title: 'Nombre de messages'
            };

            // Création du graphe
            var chart = new google.visualization.PieChart(document.getElementById('piechart_messages'));

            // Affichage du graphe
            chart.draw(data, options);
        }
    </script>
    <style>
        .chart-container {
            width: 400px;
            height: 300px;
            display: inline-block;
            margin: 10px; /* Ajoutez une marge entre les graphiques si nécessaire */
        }
    </style>
</head>
<body>
    <!-- Divisions pour afficher les graphes -->
    <div class="chart-container" id="piechart_users"></div>
    <div class="chart-container" id="piechart_meet"></div>
    <div class="chart-container" id="piechart_cours"></div>
    <div class="chart-container" id="piechart_exercices"></div>
    <div class="chart-container" id="piechart_messages"></div>
<!-- FOOTER -->
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


