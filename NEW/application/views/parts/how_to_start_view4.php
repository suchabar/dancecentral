<?php
/**
 * This file contains view for how_to_start page for Cutting shapes
 */ 
?>
<div class="container">
<!-- CUTTING SHAPES - HOW TO START -->
<div class="row">
    <div class="col-md-12">
        <h1 class="visible-print-block">CUTTING SHAPES</h1>
        <h3>HOW TO START</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis
            alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
        </p>

        <h3>TUTORIALS</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis
            alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At laboriosam, facilis ipsum, delectus minima
            vitae reprehenderit facere harum perspiciatis amet quisquam iure modi id et nesciunt saepe sunt architecto
            ratione.
        </p>
        <h3>TIPS & TRICKS</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis
            alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
        </p>
    </div>
</div>

<div class="hidden-print">
    <!-- TUTORIALS -->
    <div class="row">
        <div class="col-md-8 ">
            <h2>CUTTING SHAPES - BASICS</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/HAQq1iOqx0E"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>CUTTING SHAPES - ADVANCED</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/jCf5f892GEs"></iframe>
        </div>
    </div>
</div>


<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" property="stylesheet" rel="stylesheet">  