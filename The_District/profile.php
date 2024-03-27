<?php
require_once('header.php');
session_start();
// Récupérer le message de la session s'il existe
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
// Supprimer le message de la session pour qu'il n'apparaisse qu'une seule fois
unset($_SESSION['message']);
?>


<div class="container" id="mentions">
    <h1>Connexion</h1>
</div>

<div class="justify-content-center d-flex mt-5">
    <form id="loginForm" action="traitement/login.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <div class="error" id="error_form_email"></div>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <div class="error" id="error_form_password"></div>
        <div id="message"><?php echo $message; ?></div>
        <input type="submit" value="Se connecter">
    </form>
</div>

<div class="d-flex justify-content-center">
    <a href="details_commande.php">Si vous êtes déjà connecté</a>
</div>
<div class="d-flex justify-content-center">
    <a href="inscription_page.php">Pas encore inscrit ? C'est ici</a>
</div>

<?php
require_once('footer.php');
?>
