<?php
// Se connecter à la base de données MySQL “utilisateurs”
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "utilisateurs";

// Créer une nouvelle connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer l'email de l'utilisateur depuis la requête GET
$email = $_GET["email"];

// Préparer la requête SQL pour sélectionner les données de l'utilisateur correspondant à l'email
$sql = "SELECT * FROM utilisateurs WHERE email = ?";

// Préparer et exécuter la requête en utilisant des déclarations préparées pour éviter les attaques par injection SQL
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

// Récupérer le résultat de la requête
$result = $stmt->get_result();

// Vérifier si le résultat contient au moins une ligne
if ($result->num_rows > 0) {
    // Récupérer la première ligne du résultat sous forme de tableau associatif
    $user = $result->fetch_assoc();

    // Encoder le tableau en format JSON et l'envoyer comme réponse
    echo json_encode($user);
} else {
    // Envoyer une réponse vide si aucun utilisateur n'est trouvé
    echo json_encode(array('message' => 'Aucun utilisateur trouvé pour cet email.'));
}

// Fermer la connexion à la base de données
$stmt->close();
$conn->close();
?>
