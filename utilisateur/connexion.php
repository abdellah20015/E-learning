<?php
// Ce script permet de traiter le formulaire de connexion

// On se connecte à la base de données
try {
    $bdd = new PDO("mysql:host=localhost;dbname=elearning;charset=utf8", "root", "");
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// On vérifie que les données du formulaire sont bien reçues
if (isset($_POST["email"]) && isset($_POST["password"])) {
    // On récupère les données du formulaire
    $email = $_POST["email"];
    $password = $_POST["password"];

    // On vérifie que l'email contient le caractère @ et est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      // L'email ne contient pas le caractère @ ou n'est pas valide
      echo "<p style='color: red;'>L'email doit contenir le caractère @ et être valide.</p>";
      exit(); // On arrête le script
    }

    // On vérifie que l'email existe dans la base de données
    $req = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $req->execute(array($email));
    $result = $req->fetch();

    if ($result) {
        // Si l'email existe, on vérifie que le mot de passe correspond
        if (password_verify($password, $result["password"])) {
            // Si le mot de passe correspond, on crée une session pour l'utilisateur
            session_start();
            $_SESSION["id"] = $result["id"];
            $_SESSION["nom"] = $result["nom"];
            $_SESSION["prenom"] = $result["prenom"];
            $_SESSION["email"] = $result["email"];

            // On redirige l'utilisateur vers la page de l'examen
            header("Location: examen.html");
            exit();
        } else {
            // Si le mot de passe ne correspond pas, on affiche un message d'erreur en rouge
            session_start();
            $_SESSION["message"] = "<p style='color: red;'>Le mot de passe est incorrect.</p>";
            header("Location: login.php");
            exit();
        }
    } else {
        // Si l'email n'existe pas, on affiche un message d'erreur en rouge
        session_start();
        $_SESSION["message"] = "<p style='color: red;'>Cet email n'existe pas.</p>";
        header("Location: login.php");
        exit();
    }
}
?>

