<?php
   
  

// Récupérer le terme de recherche de l'utilisateur
$searchTerm = $_GET['searchTerm'];

// Requête SQL pour rechercher dans les plats
$sqlPlats = $conn->prepare("SELECT * FROM plat WHERE libelle LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'");
$sqlPlats->execute();
$plats = $sqlPlats->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Plat");


// Afficher les résultats de la recherche
echo "<h2>Résultats de la recherche pour : $searchTerm</h2>";

// Afficher les plats correspondants
foreach($plats as $plat) {
    
    echo"<div class='card'>
    <h3>Plats :</h3>;
    <p>$plat->libelle</p>
    <img class=' col-4  justify-content-center d_flex mx-auto' src ='$plat->image'>
    </div>";
}

?>
    

    
    
 








  






