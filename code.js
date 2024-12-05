
    document.getElementById("email").addEventListener("blur", function() {
        var email = document.getElementById("email").value; // Récupère l'email
        var emailError = document.getElementById("email-error"); // Récupère le conteneur pour afficher l'erreur

        if (email !== "") { // Si l'email n'est pas vide
            var xhr = new XMLHttpRequest(); // Crée une requête Ajax
            xhr.open("POST", "check_email.php", true); // Prépare la requête
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Envoie les données en format correct

            xhr.onload = function() { // Quand la requête a fini
                if (xhr.responseText === "exists") { // Si la réponse est "exists", l'email est déjà utilisé
                    emailError.textContent = "Cet email est déjà utilisé."; // Message d'erreur
                    emailError.style.color = "red"; // En rouge
                    document.getElementById("email").style.borderColor = "red"; // Bordure rouge autour du champ
                } else {
                    emailError.textContent = ""; // Pas d'erreur, donc on efface le message
                    document.getElementById("email").style.borderColor = ""; // Réinitialise la bordure
                }
            };

            xhr.send("email=" + encodeURIComponent(email)); // Envoie l'email à vérifier au serveur
        }
    });

