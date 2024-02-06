<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="png" href="icon/team.png">
    <title>Login SignUp</title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <body style="background-image: url('n.png'); background-size: cover;">


    <!-- It will redirect to the Home Page after submitting the form -->
</head>

<body>
    <style>
        .back-btn 
            {
	width: 85%;
	padding: 10px 30px;
	cursor: pointer;
	display: block;
	margin: auto;
	background: linear-gradient(to right, #42403f, #575153);
	color: #fff;
	border: 0;
	outline: none;
	border-radius: 30px;
}

.back-btn:hover {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}
.submit-btn {
    margin-bottom: 20px; /* Ajustez la valeur selon vos besoins */
}

.submit-btn {
    margin-top: 20px; /* Ajustez la valeur selon vos besoins */
}





    </style>

    <div class="form-box">
        <div class="button-box">
            <div id="btn"></div>
            <!-- Ajoutez le bouton Sign Up -->
            <button type="button" class="toggle-btn" id="log" onclick="login()" style="color: #fffefe;">Log In</button>
            <button type="button" class="toggle-btn" id="reg" onclick="register()" style="color: #fffefe;">Sign Up</button>
        </div>

        
        

        <!-- Login Form -->
        <form id="login" class="input-group" action="admin/admin.php" method="post">
            <div class="inp">
                <img src="icon/user.png" alt="User"><input type="text" id="email" name="username" class="input-field" placeholder="Username or Phone Number" style="width: 88%; border:none;" required="required">
            </div>
            <div class="inp">
                <img src="icon/password.png" alt="Password"><input type="password" id="password" name="password" class="input-field" placeholder="Password" style="width: 88%; border: none;" required="required">
            </div>
            <button type="submit" name="submit" class="submit-btn">Se connecter</button>
            <button type="button" onclick="window.location.href='indice.html'" class="back-btn">Retour</button>
        </form>

        <!-- Register Form -->
<form id="register" class="input-group" action="admin/register.php" method="post" style="display: none;">
    <!-- Ajoutez le champ pour le prénom -->
    <div class="inp">
        <img src="icon/user.png" alt="User"><input type="text" id="nom" name="nom" class="input-field" placeholder="Nom" style="width: 88%; border:none;" required="required">
    </div>
    <div class="inp">
        <img src="icon/user.png" alt="User"><input type="text" id="prenom" name="prenom" class="input-field" placeholder="Prénom" style="width: 88%; border:none;" required="required">
    </div>
    <div class="inp">
        <img src="icon/email.png" alt="Email"><input type="email" id="email" name="email" class="input-field" placeholder="Email" style="width: 88%; border:none;" required="required">
    </div>
    <div class="inp">
        <img src="icon/password.png" alt="Password"><input type="password" id="password" name="password" class="input-field" placeholder="Password" style="width: 88%; border: none;" required="required">
    </div>
    <div class="inp">
        <img src="icon/password.png" alt="Password"><input type="password" id="repeat_password" name="repeat_password" class="input-field" placeholder="Repeat Password" style="width: 88%; border: none;" required="required">
    </div>
    <button type="submit" name="submit" class="submit-btn">S'inscrire</button>
</form>

    </div>
    <script type="text/javascript" src="script.js"></script>
    <!-- Ajoutez du code JavaScript pour basculer entre les formulaires -->
    <script>
        // Sélectionnez les éléments du DOM
        var logBtn = $("#log");
        var regBtn = $("#reg");
        var loginForm = $("#login");
        var registerForm = $("#register");

        // Ajoutez un écouteur d'événement au bouton Log In
        logBtn.click(function() {
            // Cachez le formulaire d'inscription et affichez le formulaire de connexion
            registerForm.hide();
            loginForm.show();
        });

        // Ajoutez un écouteur d'événement au bouton Sign Up
        regBtn.click(function() {
            // Cachez le formulaire de connexion et affichez le formulaire d'inscription
            loginForm.hide();
            registerForm.show();
        });
    </script>
</body>

</html>
