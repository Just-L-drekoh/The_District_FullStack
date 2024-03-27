<?php
session_start();
require_once('../DAO.php');

$email = $_POST['email'];
$password = $_POST['password'];

// Préparation de la requête pour récupérer le profil de l'utilisateur
$profile = $conn->prepare("SELECT id, nom_prenom, email, password 
FROM utilisateur 
WHERE email = :email");
$profile->bindParam(':email', $email);
$profile->execute();
$user = $profile->fetch(PDO::FETCH_ASSOC);

if ($user) {
    // Vérifier si le mot de passe est correct
    if (password_verify($password, $user['password'])) {
        $_SESSION['message'] = 'Le mot de passe est valide';
            
        // Récupérer les détails de la commande de l'utilisateur
        $user_id = $user['id']; // Récupérer l'ID de l'utilisateur
        $detail_query = $conn->prepare("SELECT *, p.libelle AS libelle_plat
        FROM commande 
        JOIN plat p ON commande.id_plat = p.id
        WHERE id_utilisateur = :user_id");
        $detail_query->bindParam(':user_id', $user_id);
        $detail_query->execute();
        $details_commande = $detail_query->fetchAll(PDO::FETCH_ASSOC);
        
        // Stocker les détails de la commande dans une session
        $_SESSION['profile'] = $user;
        $_SESSION['details_commande'] = $details_commande;
        
        // Rediriger vers une autre page pour afficher les détails des plats
        header("Location: ../details_commande.php");
        exit();
        
    } else {
        $_SESSION['message'] = 'Le mot de passe est invalide';
        header("Location: ../profile.php");
        exit();
    }
} else {
    $_SESSION['message'] = 'L\'utilisateur n\'existe pas Veuillez Verifié s\'il vous plait ';
    header("Location: ../profile.php");
    exit();
}
?>
