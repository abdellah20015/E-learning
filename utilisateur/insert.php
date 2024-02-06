<?php
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
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$password = $_POST["password"];
$sujet = $_POST["sujet"];

// Requête SQL pour insérer les données dans la table "meet"
$sql = "INSERT INTO meet (nom, prenom, email, password, sujet) VALUES ('$nom', '$prenom', '$email', '$password', '$sujet')";
$result = $conn->query($sql);

// Si l'insertion a réussi
if ($result) {
  // Affichage d'un message de confirmation
  echo "<p>Votre inscription a été enregistrée avec succès.</p>";
  // Redirection vers la page de meeting
  header("Refresh: 3; URL=meeting.html");
} else {
  // Affichage d'un message d'erreur
  echo "<p>Une erreur est survenue. Veuillez réessayer.</p>";
  // Redirection vers la page d'inscription
  header("Refresh: 3; URL=inscrit.html");
}

// Fermeture de la connexion
$conn->close();
?>
