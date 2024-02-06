<?php echo '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>E-learning - Administration</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="cours.png" type="image/icon type">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.html"><img src="logo.jpg" alt="Logo E-learning"></a>
        </div>
        
    </header>
    <main>
        <h1>Administration</h1>
        <p>Vous êtes connecté en tant qu’administrateur. Vous pouvez ajouter, modifier ou supprimer des cours.</p>
        <form action="ajouter_cours.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Ajouter un cours</legend>
                <p>
                    <label for="titre">Titre du cours :</label>
                    <input type="text" name="titre" id="titre" required>
                </p>
                <p>
                    <label for="video">Fichier vidéo du cours :</label>
                    <input type="file" name="video" id="video" accept="video/*" required>
                </p>
                <p>
                    <label for="pdf">Fichier PDF du cours :</label>
                    <input type="file" name="pdf" id="pdf" accept="application/pdf" required>
                </p>
                <p>
                    <label for="resume">Résumé du cours :</label>
                    <textarea name="resume" id="resume" rows="10" cols="50" required></textarea>
                </p>
                <p>
                    <label for="description">Description de la vidéo du cours :</label>
                    <textarea name="description" id="description" rows="10" cols="50" required></textarea>
                </p>
                <p>
                    <button type="submit">Ajouter le cours</button>
                </p>
            </fieldset>
        </form>
    </main>
    <footer>
        <p>© 2023 E-learning. Tous droits réservés.</p>
        <a href="https://www.linkedin.com/"><img src="linkedin.png" alt="LinkedIn"></a>
        <a href="https://www.facebook.com/"><img src="facebook.png" alt="Facebook"></a>
        <a href="https://www.instagram.com/"><img src="instagram.png" alt="Instagram"></a>
        <a href="mailto:elearning@gmail.com"><img src="email.png" alt="Email"></a>
        <p>Email: elearning@gmail.com</p>
        <p>Adresse: 10 rue de la Liberté, Casablanca</p>
        <p>Téléphone: +212 6 12 34 56 78</p>
    </footer>
    <script src="main.js"></script>
</body>
</html>';
?>
