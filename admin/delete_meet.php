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

    // Supprimer l'utilisateur de la table users
    $req = $bdd->prepare("DELETE FROM meet WHERE id = ?");
    $req->execute(array($id));

    // Afficher un message de succès
    echo "Utilisateur supprimé avec succès.";

    // Rediriger vers la page des utilisateurs
    header("Location: meet1.php");
    exit;
} else {
    // Afficher un message d’erreur
    echo "Aucun id spécifié.";
    exit;
}
?>