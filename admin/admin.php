<?php
// Démarrer la session
session_start();

// Paramètres de connexion à la base de données
$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "elearning";

// Créer une connexion
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Définir le nom d’utilisateur de l’administrateur
$admin_username = "admin";

// Hasher le mot de passe de l’administrateur
$admin_password = password_hash("admin123", PASSWORD_DEFAULT);

// Stocker le hash du mot de passe dans un fichier
file_put_contents("password.txt", $admin_password);

// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST["submit"])) {
    // Récupérer le nom d’utilisateur et le mot de passe saisis
    $username_input = $_POST["username"];
    $password_input = $_POST["password"];

    // Récupérer le hash du mot de passe du fichier
    $hash = file_get_contents("password.txt");

    // Vérifier si le nom d'utilisateur et le mot de passe sont corrects
    if ($username_input == $admin_username && password_verify($password_input, $hash)) {
        // Créer une variable de session pour l'administrateur
        $_SESSION["admin"] = true;
        // Rediriger vers la page des messages
        header("Location: index.html");
        exit;
    } else {
        // Préparer une requête pour récupérer l'utilisateur de la base de données
        $sql = "SELECT * FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($conn, $sql)) {
            // Lier des variables à l'instruction préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "s", $username_input);

            // Exécuter l'instruction préparée
            if(mysqli_stmt_execute($stmt)) {
                // Stocker le résultat
                mysqli_stmt_store_result($stmt);

                // Vérifier si l'email existe, si oui, vérifier le mot de passe
                if(mysqli_stmt_num_rows($stmt) == 1) {                    
                    // Lier les variables de résultat
                    mysqli_stmt_bind_result($stmt, $id, $nom, $prenom, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($password_input, $hashed_password)) {
                            // Le mot de passe est correct, alors commencez une nouvelle session
                            session_start();
                                
                            // Stocker les données dans des variables de session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Rediriger l'utilisateur vers la page d'accueil
                            // Si l'utilisateur est authentifié, récupérez le nom et le prénom
                            $_SESSION["nom"] = $nom;
                            $_SESSION["prenom"] = $prenom;
                            header("location: ../utilisateur/index.php");
                        } else {
                            // Afficher un message d'erreur si le mot de passe n'est pas valide
                            echo "Le mot de passe que vous avez entré n'était pas valide.";
                        }
                    }
                } else {
                    // Afficher un message d'erreur si l'email n'existe pas
                    echo "Aucun compte trouvé avec cet email.";
                }
            } else {
                echo "Oops! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }

            // Fermer l'instruction
            mysqli_stmt_close($stmt);
        }

        // Fermer la connexion
        mysqli_close($conn);
    }
}


?>
