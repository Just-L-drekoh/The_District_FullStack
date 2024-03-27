<?php

require_once('header.php');


?>

<video  width="100%"  class="d-none d-md-flex" loop autoplay muted>
    <source src="Assets/images_the_district/cuisine.mp4" type="video/mp4">
    
</video>

<div id="presentation_categorie_page"></div>


<div class="background_cat">
<?php
require_once('view_pages/view_index_cat.php');
?>
</div>
<?php
require_once('footer.php');

?>