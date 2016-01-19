<?php
/**
 * This file contains view used for displaying user videos
 */ 
?>
<!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="row hidden-print">
            <div class="col-lg-12">
                <a href="<?php echo site_url('video/newVideo/') ?>" class="btn btn-primary uploadButton
                 <?php echo ($this->session->username == $uploadingUser)? '': 'hiddenElement' ?>" >
                    <span class="glyphicon glyphicon-upload"></span>
                    Upload new video
              </a>
              <h2 class="<?php echo ($this->session->username == $uploadingUser)? 'hiddenElement': '' ?>">Videos of user <?php echo $uploadingUser ?></h2>
            </div>
            
        </div>
        <!-- Projects Row -->
    <div class="row">
    <?php foreach ($videos as $video) : ?>
        <div class="col-md-4 video<?php echo $video->id?>">
            <!--Preview of video-->
            <div class="video-preview-play">
                <a href="<?php echo site_url('video/detail/' . $video->id) ?>">
                    <img class="video-preview img-responsive" src=<?php echo "http://img.youtube.com/vi/" . $video->link . "/0.jpg" ?> alt="Picture preview of video">
                    <img class="video-preview-play img-responsive" src="<?php echo base_url(); ?>img/play-btn.png" alt="Play button">
                </a>
            </div>

            <!--Title of video-->
            <h4 class="visible-print-block">https://www.youtube.com/watch?v=<?php echo $video->link ?></h4>
            
            <div class="row ">
                <div class="col-md-9">
                    <h3 class="video-header">
                        <a href="<?php echo site_url('video/detail/' . $video->id) ?>">
                        <?= $video->name ?> </a>
                    </h3>
                </div>
                <div class="col-md-3">
                    <?php    echo form_open('video/deleteVideo/'.$video->id, 
                             array('id'=>$video->id, 'class' => ($this->session->username == $uploadingUser || $this->session->userRole == 0)? 'delete_video': 'hiddenElement delete_video'));?>
                     <input type="image" name="submit"
                      src='<?php echo base_url(); ?>img/bin.png' class="remove-video-icon" alt="Delete icon">
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-4">
                       <h5 class="video-date2"> <?= date('d/m/Y', strtotime($video->date_of_upload)) ?></h5>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="my-rating rating" value="<?= $video->ratings ?>" >
                    </div>
            </div>
        </div>
    <?php endforeach; ?> 
    </div>
<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" property="stylesheet" rel="stylesheet"> 
