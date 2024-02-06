// Ce script permet de valider le formulaire d'inscription

// On récupère le formulaire d'inscription
var form = document.getElementById("form");

// On ajoute un écouteur d'événement sur la soumission du formulaire
form.addEventListener("submit", function(event) {
    // On empêche le comportement par défaut du formulaire
    event.preventDefault();

    // On récupère les valeurs des champs du formulaire
    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm = document.getElementById("confirm").value;

    // On initialise une variable pour stocker les éventuelles erreurs
    var errors = "";

    // On vérifie que les champs ne sont pas vides
    if (nom == "" || prenom == "" || email == "" || password == "" || confirm == "") {
        errors += "Tous les champs sont obligatoires.\n";
    }

    // On vérifie que le mot de passe et la confirmation sont identiques
    if (password != confirm) {
        errors += "Le mot de passe et la confirmation ne correspondent pas.\n";
    }

    // On vérifie que le mot de passe a au moins 8 caractères
    if (password.length < 8) {
        errors += "Le mot de passe doit avoir au moins 8 caractères.\n";
    }

    // On vérifie que l'email est valide
    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!regex.test(email)) {
        errors += "L'email n'est pas valide.\n";
    }

    // Si il y a des erreurs, on les affiche dans une boîte d'alerte
    if (errors != "") {
        alert(errors);
    } else {
        // Sinon, on envoie les données du formulaire au serveur avec une requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "inscription.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("nom=" + nom + "&prenom=" + prenom + "&email=" + email + "&password=" + password);

        // On attend la réponse du serveur
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Si le serveur renvoie "ok", on redirige l'utilisateur vers la page de connexion
                if (xhr.responseText == "ok") {
                    window.location.href = "connexion.html";
                } else {
                    // Sinon, on affiche le message d'erreur renvoyé par le serveur
                    alert(xhr.responseText);
                }
            }
        };
    }
});
