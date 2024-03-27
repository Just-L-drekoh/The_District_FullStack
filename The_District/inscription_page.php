<?php

require_once('header.php');
session_start();
// Récupérer le message de la session s'il existe
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
// Supprimer le message de la session pour qu'il n'apparaisse qu'une seule fois
unset($_SESSION['message']);
?>


<div class="container" id="mentions" >
<h1>Inscription</h1>
</div>

<div class="justify-content-center d-flex mt-5">
    <form id="inscriptionForm" action="traitement/inscription.php" method="POST">
        <label for="name">Nom & Prénom:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <div class="error" id="error_form_name"></div>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <div class="error" id="error_form_email"></div>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <div class="error" id="error_form_password"></div>
        <div id="message"><?php echo $message; ?></div>
        <input type="submit" value="S'inscrire">
       
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").addEventListener("submit", function(event) {
        // Empêcher la soumission du formulaire par défaut
        event.preventDefault();

        // Récupérer les valeurs des champs
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value;

        // Définir les motifs regex pour la validation
        let nameRegex = /^[a-zA-Z\s]+$/; // Permet seulement les lettres et les espaces
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Valide une adresse email
        let passwordRegex = /.{6,}/; // Au moins 6 caractères

        // Vérifier les champs avec les regex
        if (!nameRegex.test(name)) {
            document.getElementById("error_form").textContent = "Veuillez saisir un nom et prénom valide.";
            return;
        }

        if (!emailRegex.test(email)) {
            document.getElementById("error_form").textContent = "Veuillez saisir une adresse email valide.";
            return;
        }

        if (!passwordRegex.test(password)) {
            document.getElementById("error_form").textContent = "Le mot de passe doit contenir au moins 6 caractères.";
            return;
        }

        // Si tous les champs sont valides, soumettre le formulaire
        this.submit();
    });
});
</script>

<?php

require_once('footer.php');

?>