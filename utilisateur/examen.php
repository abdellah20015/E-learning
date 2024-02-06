<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elearning";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];
$q1 = $_POST["q1"];
$q2 = $_POST["q2"];
$q3 = $_POST["q3"];
$q4 = $_POST["q4"];
$q5 = $_POST["q5"];
$q6 = $_POST["q6"];
$q7 = $_POST["q7"];
$q8 = $_POST["q8"];
$q9 = $_POST["q9"];
$q10 = $_POST["q10"];
$q11 = $_POST["q11"];
$q12 = $_POST["q12"];
$q13 = $_POST["q13"];
$q14 = $_POST["q14"];
$q15 = $_POST["q15"];
$q16 = $_POST["q16"];
$q17 = $_POST["q17"];
$q18 = $_POST["q18"];
$q19 = $_POST["q19"];
$q20 = $_POST["q20"];

// Vérification de la confirmation du mot de passe
if ($password != $confirm) {
    echo "Les mots de passe ne correspondent pas !";
    exit();
}

// Hachage du mot de passe
$password = password_hash($password, PASSWORD_DEFAULT);

// Vérification de l'existence de l'email dans la table utilisateurs
$sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "L'email saisi existe déjà dans la base de données !";
    exit();
}

// Insertion des données dans la table utilisateurs
$sql = "INSERT INTO utilisateurs (nom, prenom, email, password) VALUES ('$nom', '$prenom', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Inscription réussie !";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Insertion des données dans la table examens
$sql = "INSERT INTO examens (email, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15, q16, q17, q18, q19, q20) VALUES ('$email', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$q11', '$q12', '$q13', '$q14', '$q15', '$q16', '$q17', '$q18', '$q19', '$q20')";

if ($conn->query($sql) === TRUE) {
    echo "Examen enregistré !";
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Définition des réponses correctes
$reponses_correctes = array("q1" => "a", "q2" => "d", "q3" => "c", "q4" => "b", "q5" => "a", "q6" => "b", "q7" => "b", "q8" => "a", "q9" => "b", "q10" => "a", "q11" => "a", "q12" => "a", "q13" => "a", "q14" => "a", "q15" => "b", "q16" => "a", "q17" => "a", "q18" => "b", "q19" => "a", "q20" => "a");

// Comparaison des réponses de l'utilisateur avec les réponses correctes
$nb_reponses_justes = 0;
foreach ($reponses_correctes as $key => $value) {
    if ($_POST[$key] == $value) {
        $nb_reponses_justes++;
    }
}

// Calcul du pourcentage de réussite
$pourcentage = ($nb_reponses_justes / count($reponses_correctes)) * 100;

// Affichage du résultat de l'examen
echo "Vous avez obtenu $pourcentage % de réponses justes.";

// Fermeture de la connexion
$conn->close();
?>


