<?php

// Inclusion des classes nécessaires
require_once('classes/classe_cat.php');
require_once('classes/classe_plat.php');

// Fonction de connexion à la base de données
function connect_database () {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=the_district", "admin", "lolo2002");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $conn;
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}

// Connexion à la base de données
$conn = connect_database();

// Récupération des catégories actives
function get_categories($conn) {
    $cat_index = $conn->prepare("SELECT DISTINCT categorie.* 
    FROM categorie
    JOIN plat ON plat.id_categorie = categorie.id
    JOIN commande ON commande.id_plat = plat.id");
    $cat_index->execute();
    return $cat_index->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Categorie");
}

function get_categorie($id) {
   
    $conn = connect_database();
    $requete = $conn->prepare("SELECT * FROM categorie WHERE id = :id");
    $requete->bindParam(":id", $id);
    $requete->execute();
    $categorie = $requete->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Categorie");
    // var_dump($id, $categorie);
    return $categorie;
}

// Récupération des plats populaires
function get_plat_index($conn) {
    $plat_index = $conn->prepare("SELECT DISTINCT  p.*
    FROM categorie cat
    JOIN plat p ON p.id_categorie = cat.id
    JOIN commande com ON com.id_plat = p.id
    WHERE com.quantite > 2
    AND com.etat != 'Annulée'");
    $plat_index->execute();
    return $plat_index->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Plat");
}

// Récupération des catégories pour une page spécifique
function get_cat_page($conn){
    $categories_result = $conn->prepare("SELECT  id, libelle , image 
    FROM categorie 
    WHERE active = 'Yes'");
    $categories_result->execute();
    return $categories_result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Categorie");
}

// Récupération de tous les plats
function get_plat_page($conn) {
    $plats_result = $conn->prepare("SELECT plat.id, plat.libelle, plat.image, description, prix, id_categorie FROM plat");
    $plats_result->execute();
    return $plats_result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Plat");

}

// Récupération des plats pour une catégorie spécifique
function get_plat_cat($conn, $plat_cat_id) {
    $plat_cat_result = $conn->prepare("SELECT * FROM plat WHERE id_categorie = :id_categorie");
    $plat_cat_result->bindParam(':id_categorie', $plat_cat_id);
    $plat_cat_result->execute();
    return $plat_cat_result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Plat");
}

// Récupération des détails d'un plat pour une commande spécifique
function get_plat_commande($conn, $plat_id) {
    $plat_commande_result = $conn->prepare("SELECT * FROM plat WHERE id = :id");
    $plat_commande_result->bindParam(':id', $plat_id);
    $plat_commande_result->execute();
    return $plat_commande_result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Plat");
}


function get_plat($conn, $id) {
    $requete = $conn->prepare('SELECT libelle, prix FROM plat WHERE id = :id');
    $requete->bindParam(':id', $id);
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Plat');
}

?>
