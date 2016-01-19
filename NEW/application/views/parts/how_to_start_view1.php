<?php
/**
 * This file contains view for how_to_start page for Dnb step
 */ 
?>
<div class="container">
<!-- DNB STEP - HOW TO START -->
<div class="row">
    <div class="col-md-12">
        <h1 class="visible-print-block">DNB STEP</h1>
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
            <h2>OLD SCHOOL: Tutorial part 1</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/toYoLkypmsE"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>OLD SCHOOL: Tutorial part 2</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/bRxd4sQAsCY"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>OLD SCHOOL: Tutorial part 3</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/__s7eeLZZnw"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>PLAGEAT style: base + tricks</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/bNQD75FkEBc"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>PLAGEAT style: tricks tutorial 2</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/FDQPZzvQ_48"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>PLAGEAT style: tricks tutorial 3</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/YmW02KP-ZDg"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>PLAGEAT style: tricks tutorial 4</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/ye1dHSq08lo"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>PLAGEAT style: tricks tutorial 5</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/OrtudsAq70c"></iframe>
        </div>
    </div>
</div>


<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" property="stylesheet" rel="stylesheet"> 