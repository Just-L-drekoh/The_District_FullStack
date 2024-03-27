<?php
session_start();

require_once('../DAO.php');

// Vérifie si les champs nom, email et password ont été envoyés via la méthode POST
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $nom_prenom = $_POST["name"];
    $email = $_POST["email"];
    $mot_de_passe = password_hash($_POST["password"], PASSWORD_DEFAULT); 

    // Vérifier si l'e-mail existe déjà dans la base de données
    $stmt = $conn->prepare("SELECT id FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $userExists = $stmt->fetchColumn();

    if ($userExists) {
        $_SESSION['message'] = 'Utilisateur déjà existant';
    } else {
        // Insérer un nouvel utilisateur
        $sql = "INSERT INTO utilisateur (nom_prenom, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom_prenom, $email, $mot_de_passe]);

        if ($stmt) {
            $_SESSION['message'] = 'Inscription réussie. Veuillez vous connecter';
            header("Location: ../profile.php");
            exit();
        } else {
            $errorInfo = $stmt->errorInfo();
            $_SESSION['message'] = "Erreur lors de l'enregistrement : " . $errorInfo[2];
        }
    }
}

// Si une erreur est survenue ou si les champs n'ont pas été envoyés, redirigez vers la page de profil
header("Location: ../inscription_page.php");
    exit();
?>
