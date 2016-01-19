<?php
/**
 * This file contains view for about page of Dnb step
 */ 
?>
<div class="container">
<!-- DNB STEP - ABOUT -->
<div class="row">
    <div class="col-md-6">
        <h1 class="visible-print-block">ABOUT DNB STEP</h1>
        <h3>HISTORY</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. At laboriosam, facilis ipsum, delectus minima vitae reprehenderit facere harum perspiciatis amet quisquam iure modi id et nesciunt saepe sunt architecto ratione.
        </p>
        <h3>WHERE WE DANCE</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
        </p>
        <h3>CREWS, UNIONS...</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
        </p>
        <h3>COMPETITIONS and BATTLES</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto vitae dicta eaque fugiat tempore molestias, possimus debitis alias rem, quos consequuntur tempora nemo reprehenderit adipisci. Vero eligendi, deleniti similique repudiandae?
            <ul>
                <li>DnB Dance LIVE Battle in Saint-Petersburg - Хруст Костей Vol.1 - 10.</li>
                <li>Krivbas Dance Festival </li>
                <li>CBB vol. 1 - 4 (CBB vol.4 | DNB | Panda (+) vs Shein)</li>
                <li>SAMARA DNB DANCE BATTLE</li>
                <li>Dance Wars I - III </li>
                <li>Bunch of online tournaments on youtube</li>
                    
            </ul>
        </p>
        
        <h3>WHY WE DANCE</h3>
        <p>Because it's just </p>

        
    </div>
    <div class="col-md-6">
        <img class="center img-responsive" src="<?php echo base_url(); ?>img/dnbstep/dancer.jpg" alt="">
    </div>
</div>              
<br>
<br>
    <h2 class="center">The most accurate visualisation of music which we live</h2>
<br>

<!-- Page Header -->
<div class="row hidden-print">
    <div class="col-md-offset-2 col-md-8 ">
        <iframe class="vid-responsive"
        src="http://www.youtube.com/embed/SXN1vlYygsY?start=68"></iframe>
    </div>
	
</div>

<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" rel="stylesheet">  