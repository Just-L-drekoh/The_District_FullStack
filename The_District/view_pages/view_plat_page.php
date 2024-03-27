<?php

// Récupération du nom de la page actuelle
$Currentpage = basename($_SERVER['PHP_SELF']);

// Inclusion du fichier DAO pour accéder à la base de données
require_once('DAO.php');

// Si la page actuelle est "plat.php", afficher les plats disponibles
if ($Currentpage == "plat.php") {
    // Récupération des plats et affichage
    $plats = get_plat_page($conn);
    echo "<div class='row justify-content-center  col-7 mx-auto'>";
    foreach ($plats as $plat) {
        echo "<div class='col-md-6'>";
        $plat->afficher_plat_page();
        echo "<br>"."</div>";
    }
    echo "</div>";
}

// Si la page actuelle est "plat_cat.php", afficher les plats de la catégorie spécifiée
if ($Currentpage == "plat_cat.php") {
    if(isset($_GET['id'])) {
        $plat_cat_id = $_GET['id'];
        // Récupération des plats de la catégorie et affichage
        $plats_cat = get_plat_cat($conn, $plat_cat_id);
        if (!empty($plats_cat)) {
            foreach ($plats_cat as $plat) {
                $plat->afficher_plat_cat();
            }
        } else {
            echo "Aucun plat trouvé pour cette catégorie.";
        }
    } else {
        echo "Aucune catégorie spécifiée.";
    }
}

// Si la page actuelle est "commande.php", afficher les détails du plat spécifié
if ($Currentpage == "commande.php") {
    if (isset($_GET['id'])) {
        $plat_id = $_GET['id'];
        // Affichage de l'ID du plat
        echo "L'ID récupéré est : " . $plat_id;
        // Récupération des détails du plat et affichage
        $plat_commande = get_plat_commande($conn, $plat_id);
        foreach ($plat_commande as $plat) {
            $plat->afficher_plat_commande();
            
        }
    } else {
        echo "Aucun ID de plat spécifié.";
    }
}

?>
