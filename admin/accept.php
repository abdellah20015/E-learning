<?php
// Démarrer la session
session_start();

// Se connecter à la base de données
try {
    $bdd = new PDO("mysql:host=localhost;dbname=elearning;charset=utf8", "root", "");
    // Activer le mode d’erreur exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// Récupérer l'id du message à accepter
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Vérifier si la variable de session accepted existe
    if (!isset($_SESSION["accepted"])) {
        // Créer un tableau vide pour stocker les messages acceptés
        $_SESSION["accepted"] = array();
    }

    // Ajouter l'id du message accepté au tableau
    $_SESSION["accepted"][] = $id;

    // Rediriger vers la page des messages
    header("Location: messages.php");
}
?>

