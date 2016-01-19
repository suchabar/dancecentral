<?php
/**
 * This file contains view for about page of Cutting shapes
 */ 
?>

<div class="container">
<!-- CUTTING SHAPES - ABOUT -->
<div class="row">
    <div class="col-md-6">
        <h1 class="visible-print-block">ABOUT CUTTING SHAPES</h1>
        <h3>HISTORY</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At laboriosam, facilis ipsum, delectus minima vitae reprehenderit facere harum perspiciatis amet quisquam iure modi id et nesciunt saepe sunt architecto ratione.
        </p>
        <h3>MOVES</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
        </p>
        
        <h3>WHY WE DANCE</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt, praesentium repellendus inventore cum non tempore a perferendis libero accusantium deleniti quo consequatur. Velit culpa doloribus aspernatur ab nobis harum nemo.</p>

        
    </div>
    <div class="col-md-6">
        <img class="center img-responsive" src="<?php echo base_url(); ?>/img/cutting/logo.jpg" alt="Cutting shapes logo">
    </div>
</div>              
<br>

<!-- EXAMPLE VID-->
<div class="row hidden-print">
    <div class="col-md-offset-2 col-md-8 ">
        <iframe class="vid-responsive" 
        src="http://www.youtube.com/embed/9nqRR6N2c78?start=105"></iframe>
    </div>
</div>

<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" property="stylesheet" rel="stylesheet"> 