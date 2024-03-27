<?php

require_once('header.php');


?>

<img src="Assets/images_the_district/bg2.jpg" alt="commande" class="img-fluid">
<?php

require_once('view_pages/view_plat_page.php');
?>
 
 
 
 <div class="justify-content-center d-flex">
 <form action="traitement/traitement_commande.php" method="POST" id="Form_Commande_Validate">


  

    <div class="d-md-flex">
      <div class="mb-3 m-4">
        <label for="lastname" class="form-label">Nom :</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
        <div id="error_lastname"></div>
      </div>

      <div class="mb-3 m-4">
        <label for="firstname" class="form-label">Prenom :</label>
        <input type="text" class="form-control" id="firstname" name="firstname" >
        <div id="error_firstname"></div>
      </div>
    </div>

    <input name="id" value='<?= $plat_id ?>' hidden>


    <div class="d-md-flex">
      <div class="mb-3 m-4">
        <label for="adress" class="form-label">Adresse :</label>
        <input type="text" class="form-control" id="adress" name="adress">
        <div id="error_adress"></div>
      </div>

      <div class="mb-3 m-4">
        <label for="phone" class="form-label">Téléphone :</label>
        <input type="text" class="form-control" id="phone" name="phone">
        <div id="error_phone"></div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary d-flex">Commander</button>

  </form>
  </div>















<?php

require_once('footer.php');

?>