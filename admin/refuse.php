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

// Récupération de l'id du cours à refuser
$id = isset($_GET["id"]) ? $_GET["id"] : "";

// Vérification de la validité de l'id
if ($id != "" && is_numeric($id)) {
    // Requête SQL pour supprimer le cours
    $sql = "DELETE FROM cours WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Vérification du nombre de lignes affectées
    if ($stmt->affected_rows == 1) {
        // Affichage d'un message de succès
        echo "Le cours a été supprimé avec succès.";
    } else {
        // Affichage d'un message d'erreur
        echo "Erreur lors de la suppression du cours.";
    }
} else {
    // Affichage d'un message d'erreur
    echo "Id invalide.";
}

// Fermeture de la connexion
$conn->close();
?>
