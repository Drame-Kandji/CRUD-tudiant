

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
include('./connextion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>crud</title>
</head>

<body>

    <?php
    include('./code.php');
    require('./connextion.php');
    ?>
    <div class="contenu">

        <div class="tableau">
            <?php
            if (isset($_SESSION['message'])) {

                echo '<div class="message">';
                echo $_SESSION['message'];
                echo '</div>';
                unset($_SESSION['message']);
            } ?>

            <? 'endif' ?>
            <div class="list">
                <p style="color: white;">Liste des Etudiants recement ajoutée</p>
                <a href="./creeCompte.php">
                    <button type="submit" style="  background-color: green;border: 1px solid white;color:white;width: 55px; height: 20px; border-radius: 5px; "><span>ajouter</span></button>
                </a>
            </div>
            <table>


                <caption>
                    les etudiants recement ajoutée
                </caption>
                <thead>
                    <tr>
                        <th scope="col"> Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">filiere</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date_naissance</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    ?>

                    <?php
                    $sql = "SELECT*FROM etudiant";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    if ($result) {
                        foreach ($result as $resul) {
                    ?>
                            <tr>
                                <th scope="row"><?= $resul['Prenom']; ?></th>
                                <th scope="row"><?= $resul['Nom']; ?></th>
                                <th scope="row"><?= $resul['Filiere']; ?></th>
                                <th scope="row"><?= $resul['Email']; ?></th>

                                <th scope="row"><?= $resul['Date_de_naissance']; ?></th>
                                <th scope="row" class="modifier">
                                    <a href="./modifie.php?id=<?= $resul['id']; ?> ">Modifier</a>
                                </th>
                                <th scope="row" class="supprimer">
                                    <form action="./code.php" method="post">
                                        <button class="buton" type="submit" name="supprim" on value="<?= $resul['id']; ?> ">Supprimer</button>
                                    </form>
                                </th>
                            </tr>
                    <?php
                        }
                    } else {
                    }




                    ?>
                </tbody>

            </table>

        </div>
    </div>
    <script src="/code.js"></script>
</body>

</html>