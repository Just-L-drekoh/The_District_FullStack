<?php

$lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
$firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
$request = isset($_POST["demande"]) ? $_POST["demande"] : "";

$errors = [];

// Vérification des champs avec des expressions régulières
if (empty($lastname)) {
    $errors['lastname'] = "Le champ Nom est obligatoire.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ'-]+$/", $lastname)) {
    $errors['lastname'] = "Le format du nom est invalide.";
}

if (empty($firstname)) {
    $errors['firstname'] = "Le champ Prénom est obligatoire.";
} elseif (!preg_match("/^[a-zA-ZÀ-ÿ'-]+$/", $firstname)) {
    $errors['firstname'] = "Le format du prénom est invalide.";
}

if (empty($email)) {
    $errors['email'] = "Le champ Email est obligatoire.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Le format de l'email est invalide.";
}

if (empty($phone)) {
    $errors['phone'] = "Le champ Téléphone est obligatoire.";
} elseif (!preg_match("/^\d{10}$/", $phone)) {
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
    
    $current_time = date("Y-m-d H:i:s");

    // Build the data string
    $content_contact = "Votre demande De contact via le formulaire a bien été pris en charge avec les informations suivantes :\n
    $lastname $firstname $email $phone $request ";

    // Specify the relative path within the project directory

    require_once('send_mail_contact.php');

    // Save data to the file

    echo '<script>alert("Formulaire envoyé avec succès!");</script>';
}

?>
