<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}
include('./connextion.php');

if (isset($_POST['supprim'])) {
    $id_user = $_POST['supprim'];

    try {
        $sql = "DELETE FROM etudiant WHERE id = :id_user";
        $statement = $conn->prepare($sql);
        $donne = ['id_user' => $id_user];
        $result = $statement->execute($donne);
        if ($result) {
            // $_SESSION['message'] = "Supprimé avec succès";
            header('Location: index.php');
            exit(0);
        } else {
            // $_SESSION['message'] = "Erreur lors de la suppression";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['update'])) {

    $id_user = $_POST['id_user'];
    $prenom = $_POST['prenom'];
    $filiere = $_POST['filiere'];
    $email = $_POST['email'];
    $dateN = $_POST['date'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    
    try {
        $sql = "UPDATE etudiant SET Prenom= :prenom, Nom= :nom, Filiere= :filiere, Email= :email, Date_de_naissance= :dateN WHERE id= :id_user";
        $statement = $conn->prepare($sql);
        $donne = [
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':filiere' => $filiere,
            ':email' => $email,
            ':dateN' => $dateN,
            ':id_user' => $id_user
        ];

        $result = $statement->execute($donne);

        if ($result) {
            // $_SESSION['message'] = "Modifié avec succès";
            header('Location: index.php');
            exit(0);
        } else {
            // $_SESSION['message'] = "Erreur lors de la modification";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['connecter'])) {
    $prenom = $_POST['prenom'];
    $filiere = $_POST['filiere'];
    $email = $_POST['email'];
    $dateN = $_POST['date'];
    $nom = $_POST['nom'];
    $password = $_POST['password'];

    $sql = "SELECT COUNT(*) FROM etudiant WHERE Email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $emailExists = $stmt->fetchColumn();

    if ($emailExists) {
        
        $_SESSION['message'] = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        header('Location: creecompte.php'); 
        exit();  
    } else {
        $sql = "INSERT INTO etudiant(Nom, Prenom, Email, Filiere, Date_de_naissance) VALUES (:nom, :prenom, :email, :filiere, :Date_de_naissance)";
        $query = $conn->prepare($sql);

        $donne = [
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':email' => $email,
            ':filiere' => $filiere,
            ':Date_de_naissance' => $dateN
        ];

        $result = $query->execute($donne);

        if ($result) {
            // $_SESSION['message'] = "Ajouté avec succès";
            header('Location: index.php');
            exit();
        } else {
            // $_SESSION['message'] = "Erreur lors de l'ajout";
            header('Location: index.php');
            exit();
        }
    }
}
