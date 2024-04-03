<?php

require_once("../DAO.php");

$errors = [];

// Vérification des champs avec des expressions régulières
if (empty($_POST['lastname'])) {
    $errors['lastname'] = "Le champ Nom est obligatoire.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ'-]+$/", $_POST['lastname'])) {
    $errors['lastname'] = "Le format du nom est invalide.";
}

if (empty($_POST['firstname'])) {
    $errors['firstname'] = "Le champ Prénom est obligatoire.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ'-]+$/", $_POST['firstname'])) {
    $errors['firstname'] = "Le format du prénom est invalide.";
}

if (empty($_POST['adress'])) {
    $errors['adress'] = "Le champ Adresse est obligatoire.";
} elseif (!preg_match("/^[a-zA-Z0-9\s,'-]+$/", $_POST['adress'])) {
    $errors['adress'] = "Le format de l'adresse est invalide.";
}

if (empty($_POST['phone'])) {
    $errors['phone'] = "Le champ Téléphone est obligatoire.";
} elseif (!preg_match("/^\d{10}$/", $_POST['phone'])) {
    $errors['phone'] = "Le format du numéro de téléphone est invalide.";
}

// Affichage des erreurs ou traitement des données valides
if (!empty($errors)) {
    // Afficher les erreurs
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
} else {
    // Les données sont valides, vous pouvez faire ce que vous voulez avec elles

    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
   
    $plat = get_plat($conn, $id)[0];

    $libelle = $plat->getLibelle();
    $prix = $plat->getPrix();


    // Création du contenu à écrire dans le fichier
    $content = "$lastname\n$firstname\nVotre adresse de livraison :\n$address\nVotre mode de contact: $phone\n\nVous avez choisi :\n$libelle - $prix €\n";

    // Chemin du fichier où enregistrer les données du formulaire
    

    // Écriture des données dans le fichier
    if (file_put_contents("commandes.txt", $content, FILE_APPEND | LOCK_EX) !== false) {
        require_once('send_mail_commande.php');
        
        echo "Ce formulaire a bien été envoyé ";
    } else {
        echo "<p>Erreur lors de l'enregistrement de la commande dans le fichier.</p>";
    }
    
}

?>
