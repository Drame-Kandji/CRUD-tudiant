<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Créer un compte</title>
    <style>
        .error {
            color: red;
            font-size: 12px;
            margin-top: 25px;
            padding-left: 15px;
            padding-top: 15px;
            
        }
    </style>
</head>

<body>

    <?php
    require_once('./connextion.php');
    require_once('./code.php');
    ?>
    <div class="container">
        <div class="title">
            <p>Ajouter un étudiant</p>
        </div>

        <form action="./code.php" method="post">
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
            <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
            <input type="text" name="filiere" id="filiere" placeholder="Filière" required>
            <input type="text" name="email" id="email" placeholder="Email" required>
            <?php if (isset($_SESSION['message'])): ?>
                <br>
                <span class="error"><?php echo $_SESSION['message']; ?></span>
            <?php unset($_SESSION['message']); endif; ?>

            <input type="date" name="date" id="date" placeholder="Date de naissance" required>
            <input type="password" name="password" id="password" placeholder="Mot de passe" required>
            <div class="connect">
            </div>
            <input type="submit" name="connecter" id="connecter" value="Ajouter">
        </form>
    </div>

    <script src="/code.js"></script>
</body>

</html>
