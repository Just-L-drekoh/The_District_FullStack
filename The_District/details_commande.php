<?php

require_once ('header.php');

?>



<div class="container" id="mentions" >
<h1>Vos Commandes</h1>
</div>

<?php
session_start();

// Vérifier si les détails de la commande sont disponibles dans la session
if(isset($_SESSION['details_commande'])) {
    $details_commande = $_SESSION['details_commande'];
    $user  = $_SESSION['profile'];
    echo '<h1>Nous sommes content de vous revoir '. $user['nom_prenom'] . '</h1>';
    echo '<h4>Vos informations</h4>';
    echo '<p>Nom et Prénom: ' . $user['nom_prenom'] . '</p>';
    echo '<p>Email: ' . $user['email'] . '</p>';
    echo '<p>Adresse: ' . $details_commande[0]['adresse_client'] . '</p>';
    echo '<p>Téléphone: ' . $details_commande[0]['telephone_client'] . '</p>';
    // Afficher les détails des plats
    foreach($details_commande as $detail) {
        echo '<h2> Vous avez passez commande le : '.$detail['date_commande'].'</h2>';
        echo '<p> Vous avez commandé : '.$detail['libelle_plat']. " En Quantité :".$detail['quantite'].'</p>';
       echo '<p> le total de la comande est de :' .$detail['total']. " €</p>";
    }
} else {
    echo 'Aucun détail de commande trouvé.';
}
?>



<?php

require_once ('footer.php');

?>