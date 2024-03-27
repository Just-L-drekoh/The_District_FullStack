<?php
 
    $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
    $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $request = isset($_POST["demande"]) ? $_POST["demande"] : "";
   
    $current_time = date("Y-m-d H:i:s");

    // Build the data string
    $content_contact = "Votre demande De contact via le formulaire a bien été pris en charge avec les infomations suivantes :\n
    $lastname $firstname $email $phone $request ";

    // Specify the relative path within the project directory
    

    require_once('send_mail_contact.php');

    // Save data to the file
    
    echo '<script>alert("Formulaire envoyé avec succès!");</script>';
    
?>