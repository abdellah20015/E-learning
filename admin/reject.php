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

// Récupérer l'id du message à supprimer
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Préparer la requête de suppression
    $sql = "DELETE FROM contacts WHERE id = :id";

    // Exécuter la requête avec un paramètre
    try {
        $stmt = $bdd->prepare($sql);
        $stmt->execute(array(":id" => $id));

        // Rediriger vers la page des messages
        header("Location: messages.php");
    } catch (PDOException $e) {
        // Afficher l’exception
        echo "Exception : " . $e->getMessage();
    }
}
?>
