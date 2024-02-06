<?php
session_start();
$nom = isset($_SESSION["nom"]) ? $_SESSION["nom"] : "Utilisateur";
$prenom = isset($_SESSION["prenom"]) ? $_SESSION["prenom"] : "";
echo "<h1>Bienvenue sur E-learning, $prenom $nom</h1>";
?>
