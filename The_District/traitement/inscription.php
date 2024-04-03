<?php
session_start();

require_once('../DAO.php');

// Vérifie si les champs nom, email et password ont été envoyés via la méthode POST
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $nom_prenom = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validation des données
    $errors = [];

    // Vérifier si le nom et prénom est vide
    if(empty($nom_prenom)) {
        $errors[] = "Le nom et prénom sont obligatoires.";
    }

    // Vérifier si l'email est vide et s'il a un format valide
    if(empty($email)) {
        $errors[] = "L'email est obligatoire.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }

    // Vérifier si le mot de passe est vide ou trop court
    if(empty($password) || strlen($password) < 6) {
        $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }

    // Si des erreurs sont présentes, les afficher et rediriger
    if(!empty($errors)) {
        $_SESSION['message'] = implode("<br>", $errors);
        header("Location: ../inscription_page.php");
        exit();
    }

    // Hasher le mot de passe
    $mot_de_passe = password_hash($password, PASSWORD_DEFAULT); 

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

// Redirection vers la page d'inscription en cas d'erreur ou de champs manquants
header("Location: ../inscription_page.php");
exit();
?>
