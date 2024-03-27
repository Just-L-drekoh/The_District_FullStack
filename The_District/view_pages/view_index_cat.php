<?php

// Récupération du nom de la page actuelle
$Currentpage = basename($_SERVER['PHP_SELF']);

// Inclusion du fichier DAO pour accéder à la base de données
require_once('DAO.php');

// Si des paramètres sont passés dans l'URL, afficher la page de recherche

if (isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") {
  require_once('view_pages/view_search.php');
}

// Si la page actuelle est l'index, afficher les catégories et les plats les plus vendus
if ($Currentpage == "index.php") {
  
  // Récupération des catégories et affichage
  $cat_index = get_categories($conn);
  echo " <h2>NOS Best-SELLERS</h2>
   <div class='row justify-content-center  col-7 mx-auto'>";
  foreach ($cat_index as $categorie) {
    echo "<div class='col-10 col-sm-6 col-lg-4'>";
    $categorie->afficher_cat_index();
    echo "<br>"."</div>";
  }
 echo "</div>";


 

 // Récupération et affichage des plats les plus vendus
 $plats_index = get_plat_index($conn) ;
 echo "<h2>Les Plat les plus vendus </h2>";
 echo "<div class='row justify-content-center  col-7 mx-auto'>";
 foreach ($plats_index as $plat) {
   echo "<div class='col-md-4'>";
   $plat->afficher_plat_index();
   echo "<br>"."</div>";
  }
  echo "</div>";
}

// Si la page actuelle est la page de catégorie, afficher les catégories disponibles
if ($Currentpage == "categorie.php")  {
  $categories = get_cat_page($conn);
  echo "<div class='row justify-content-center  col-7 mx-auto'>";
  foreach ($categories as $categorie) {
    echo "<div class='col-md-4'>";
    $categorie->afficher_cat_page();
    echo "<br>"."</div>";
  }
  echo "</div>";
}

?>
