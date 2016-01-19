<?php
/**
 * This file contains view for how_to_start page for Jumpstyle
 */ 
?>
<div class="container">
<!-- JUMPSTYLE - HOW TO START -->
<div class="row">
    <div class="col-md-12">
        <h1 class="visible-print-block">JUMPSTYLE</h1>
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
            <h2>OLD SCHOOL (maybe first jumpstyle tutorial ever)</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/1X8v6rbe27s"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>OLD SCHOOL: ADVANCED TRICKS PART 1</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/PPKfMWqeYRk"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>OLD SCHOOL: ADVANCED TRICKS PART 2</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/e2UqWjBSfxQ"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>Jumpstyle Tutorial Advanced | Freestyle Tricks | HARDJUMP | SIDEJUMP | OWNSTYLE JUMP </h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/S4qhqUwSTbI"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>JUMPSTYLE TUTORIAL | HARDJUMP / SIDEJUMP | by Zak</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/XC7jxJy-mog"></iframe>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 ">
            <h2>OWNSTYLE JUMPSTYLE tutorial</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/W-6D5elQzJU"></iframe>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 ">
            <h2>FREESTYLE JUMPSTYLE tutorial</h2>
            <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/h3ynRMSD4c4"></iframe>
        </div>
    </div>
</div>

<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" property="stylesheet" rel="stylesheet"> 
