<div class="container">
<!-- CUTTING SHAPES - MUSIC -->
<div class="row">
    <div class="col-md-6">
        <h1 class="visible-print-block">CUTTING SHAPES</h1>
        <h3>GENRE</h3>
        <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus maiores pariatur, necessitatibus, nesciunt, iure cumque odio incidunt enim unde est esse. Id, consequuntur in assumenda dolorum rem fuga voluptatum totam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic quas, fugit nobis, dolore magni, dolorum esse fugiat temporibus vel id blanditiis dicta? Mollitia veniam ea voluptates voluptas expedita ab quidem.
        </p>
        <h3>FESTIVALS and PARTIES</h3>
        <p>

            <ul>
                <li><a href="http://www.tomorrowland.com/en">Tomorrowland festival</a> - every July - Belgium, Brasil, USA</li>
                <li><a href="http://www.b4l.cz/en/">Beat4Love Festival</a> - every July - CZ</li>
            </ul>
        </p>
    </div>
    <div class="col-md-6">
         <audio id="deephouse1" src="<?php echo base_url(); ?>music/deephouse/1.mp3"></audio>
        <audio id="deephouse2" src="<?php echo base_url(); ?>music/deephouse/2.mp3"></audio>
        <audio id="deephouse3" src="<?php echo base_url(); ?>music/deephouse/3.mp3"></audio>
        <audio id="deephouse4" src="<?php echo base_url(); ?>music/deephouse/4.mp3"></audio>
        <audio id="deephouse5" src="<?php echo base_url(); ?>music/deephouse/5.mp3"></audio>
        <audio id="deephouse6" src="<?php echo base_url(); ?>music/deephouse/6.mp3"></audio>
        <audio id="deephouse7" src="<?php echo base_url(); ?>music/deephouse/7.mp3"></audio>
        <audio id="deephouse8" src="<?php echo base_url(); ?>music/deephouse/8.mp3"></audio>
        
        <h3>DEEP HOUSE</h3>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('deephouse1')">
            <span id="deephouse1_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Rock n Rolla - Block
        <br><br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('deephouse2')">
            <span id="deephouse2_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Hannah Wants  Chris Lorenzo - Rude Boy
        <br><br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('deephouse3')">
            <span id="deephouse3_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Len Faki Johannes Heil - The Octopuss
        <br><br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('deephouse4')">
            <span id="deephouse4_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp JACKNDANNY - House & Gash
        <br><br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('deephouse5')">
            <span id="deephouse5_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Storm Queen - Look right through
        <br><br>
        <button type="button" class="btn btn-play hidden-print" onClick="playMusic('deephouse6')">
            <span id="deephouse6_icon" class="glyphicon glyphicon-play"></span>
        </button>&nbsp&nbsp Calvin Harris Disciples - How Deep Is Your Love (Chris Lake Remix)
        <br><br>
    </div>
</div>

<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" rel="stylesheet">  