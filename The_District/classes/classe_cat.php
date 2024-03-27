<?php

class Categorie {
    public  $libelle;
    public  $image;
    
    private $id;
    private $active;
    
    public function __construct($id= null, $libelle= null, $image= null, $active= null) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->image = $image;
        $this->active= $active;
    }

    public function getId() {
        return $this->id;
    }



    // Méthodes pour obtenir et définir la propriété active
    public function getActive() {
        return $this->active;
    }

    

    // Méthodes pour obtenir et définir la propriété libelle
    public function getLibelle() {
        return $this->libelle;
    }

   

    // Méthodes pour obtenir et définir la propriété image
    public function getImage() {
        return $this->image;
    }



    public function afficher_cat_view() {
        
        echo "<h6>" . $this->getLibelle() . "</h6>
        <div class='mt-3'>
        <a href='plat_cat.php?id=" . $this->getId() . "'>
        <img class='card-img-top img_cat mx-auto img-fluid d-block' src='". $this->getImage() . "'>
        </a>
        </div>";
      
        

    }   

 
    
    public function afficher_cat_index() {
        $this->afficher_cat_view();
    }


    public function afficher_cat_page() {
        $this->afficher_cat_view();
    }
   

  
}

?>