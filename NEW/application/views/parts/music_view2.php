<div class="container">
<!-- JUMPSTYLE - MUSIC -->
<div class="row">
    <div class="col-md-6">
        <h1 class="visible-print-block">JUMPSTYLE</h1>
        <h3>GENRE</h3>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus ipsa eaque amet hic, at quas qui laborum quia ad. Vitae est quasi excepturi cum odit magni in, sed ea amet.
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur doloremque mollitia culpa neque quibusdam ut, voluptatibus, commodi qui id dolore vero illo necessitatibus architecto cum. Ad facere provident fugiat pariatur.
        </p>
        <h3>FESTIVALS and PARTIES</h3>
        <p>

            <ul>
                <li><a href="http://imaginationfestival.com/home-en/">Imagination festival</a> - every October - Czech Republic
                </li>
            </ul>
        </p>
    </div>
    <div class="col-md-6">
        <audio id="hardstyle1" src="<?php echo base_url(); ?>music/hardstyle/1.mp3"></audio>
        <audio id="hardstyle2" src="<?php echo base_url(); ?>music/hardstyle/2.mp3"></audio>
        <audio id="hardstyle3" src="<?php echo base_url(); ?>music/hardstyle/3.mp3"></audio>
        <audio id="hardstyle4" src="<?php echo base_url(); ?>music/hardstyle/4.mp3"></audio>
        <audio id="hardstyle5" src="<?php echo base_url(); ?>music/hardstyle/5.mp3"></audio>
        <audio id="hardstyle6" src="<?php echo base_url(); ?>music/hardstyle/6.mp3"></audio>
        <h3>HARD STYLE</h3>

        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('hardstyle1')">
            <span id="hardstyle1_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Audiofreq - Dance 2 Music
        <br>
        <br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('hardstyle2')">
            <span id="hardstyle2_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Black & White Feat. Angie Brown - Get Your Hands Up
        <br>
        <br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('hardstyle3')">
            <span id="hardstyle3_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Stas Shevchenko - Poison (Desperado Remix)
        <br>
        <br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('hardstyle4')">
            <span id="hardstyle4_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Kronos Ft Seraina - Who Has Won (Official Preview)
        <br>
        <br>

        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('hardstyle5')">
            <span id="hardstyle5_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Matduke - The Technician (Neilio Remix)
        <br>
        <br>

        <h3>OLD CLASSIC</h3>
        <i>Suitable for beginners - not hardstyle</i>
        <br>

        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('hardstyle6')">
            <span id="hardstyle6_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Italobrothers - Stamp on the ground
        <br>
        <br>
    </div>
</div>

<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" rel="stylesheet">  