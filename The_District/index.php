<?php

require_once('header.php');

?>


<video  width="100%"  class="d-none d-md-flex" loop autoplay muted>
    <source src="Assets/images_the_district/restaurant.mp4" type="video/mp4">
    
</video>



<!--   Description De l'enseigne The District-->

<div id="presentation_district_page"></div>


          
<!-- Carousel de Présentation de l'enseigne -->

<div id="carouselExampleSlidesOnly" class="carousel slide w-50 justify-content-center d-flex mx-auto" data-bs-ride="carousel">
  <div class="carousel-inner "> 
  <div class="carousel-item active">
      <img src="Assets/images_the_district/img-presentation.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="Assets/images_the_district/img-salle.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="Assets/images_the_district/img-bar.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>


<!-- Description de la salle de l'enseigne -->

<div id="presentation_salle"></div>


<div class="container-fluid">
 
  <?php require_once('view_pages/view_index_cat.php'); ?>
</div>


        
    
<?php

require_once('footer.php');

?>