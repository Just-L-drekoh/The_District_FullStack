<?php

require_once('header.php');

?>

<img src="Assets/images_the_district/contact.jpg" class="img-fluid" alt="">

<p>Ceci est la page contact</p>

<div class="justify-content-center d-flex">

<form action="traitement/traitement_contact.php" method="POST" id="FormValidate">


  
    <label for="lastname" class="form-label">Nom :</label>
    <input type="text"  id="lastname" name="lastname">
    <div id="error_lastname"></div>
 

 
    <label for="firstname" class="form-label">Prenom :</label>
    <input type="text"  id="firstname" name="firstname">
    <div id="error_firstname"></div>
  

  
    <label for="email" class="form-label">Email :</label>
    <input type="email"  id="email" name="email">
    <div id="error_email"></div>
  

    <label for="phone" class="form-label">Téléphone :</label>
    <input type="text"  id="phone" name="phone">
    <div id="error_phone"></div>
 

  
    <label for="demande">Votre Demande
      <textarea  aria-label="With textarea" id="demande" name="demande"></textarea>
    </label>
    <div id="error_request"></div>
    
    <button type="submit" class="btn btn-primary" id="submitButton">Envoyer</button>
    
    </div>


</form>

</div>


<?php

require_once('footer.php');

?>