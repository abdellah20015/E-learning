<?php
    // Démarrer la session
    session_start();

    // Paramètres de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "elearning";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Vérifier si le formulaire d'inscription a été soumis
    if(isset($_POST)){
        extract($_POST);
    if(isset($_POST['submit'])) {
        // Récupérer les données de l'utilisateur à partir de $_POST
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];

        // Valider les données de l'utilisateur ici

        
        // Vérifier si les mots de passe correspondent
        if($password != $repeat_password) {
            echo "Les mots de passe ne correspondent pas.";
            exit();
        }

        // Hacher le mot de passe - Vous devriez utiliser un hachage plus fort dans une application réelle
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Préparer une instruction d'insertion
        $sql = "INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)) {
            // Lier des variables à l'instruction préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "ssss", $nom, $prenom, $email, $hashed_password);

            // Tenter d'exécuter l'instruction préparée
            if(mysqli_stmt_execute($stmt)) {
                echo "Vous vous êtes inscrit avec succès.";
            } else {
                echo "Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }
        }

        
    
     
        // Récupérer les données de l'utilisateur à partir de $_POST
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['email'] = $_POST['email'];
            // Fermer l'instruction
     mysqli_stmt_close($stmt);
    // Fermer la connexion
    mysqli_close($conn);
}
    }
?>

