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

// Récupération de l'id du cours à accepter
$id = isset($_GET["id"]) ? $_GET["id"] : "";

// Vérification de la validité de l'id
if ($id != "" && is_numeric($id)) {
    // Requête SQL pour changer le statut du cours
    $sql = "UPDATE exercices SET statut = 'accepté' WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the SQL statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Vérification du nombre de lignes affectées
    if ($stmt->affected_rows == 1) {
        // Affichage d'un message de succès
        echo "L'exercice a été accepté avec succès.";
    } else {
        // Affichage d'un message d'erreur
        echo "Erreur lors de l'acceptation d'exercice.";
    }
} else {
    // Affichage d'un message d'erreur
    echo "Id invalide.";
}

// Fermeture de la connexion
$conn->close();
?>