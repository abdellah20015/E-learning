<?php // Démarrer la session 
session_start();

// Détruire la session 
session_destroy();

// Rediriger vers la page admin1.html 
header("Location: ../login.php");

// Fermer le script 
?>