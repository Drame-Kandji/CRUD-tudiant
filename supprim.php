<?php
include('./connextion.php')
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <?php
        if(isset($_GET['id'])){
            $id_user = $_GET['id'];

            if (!empty($id_user)) {
                $sql = "SELECT * FROM etudiant WHERE id = :user_id  LIMIT 1";
                $statement = $conn->prepare($sql);
            
                $donne = [
                    ':user_id' => $id_user
                ];
            
                $statement->execute($donne);
            
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            }
        }

        ?>
        <div class="title">
            <p>Modifier les données</p>
        </div>

        <form action="./code.php" method="post"> 
            <input type="submit" name="update" id="connecter" value="Enregistrer">
            
        </form>
    </div>
</body>
</html>