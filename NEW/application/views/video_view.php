<?php
/**
 * This file contains view used for displaying of detail of video
 */ 
?>
<!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="video-page row">
        <div class="col-md-8 ">
            <h2 class="visible-print-block"><?php echo $video->name ?></h2>
            <h4 class="visible-print-block">https://www.youtube.com/watch?v=<?php echo $video->link ?></h4>
            <img class="video-preview img-responsive visible-print-block" src=<?php echo "http://img.youtube.com/vi/" . $video->link . "/0.jpg" ?> alt="">
            <iframe class="vid-responsive hidden-print" src="<?php echo 'http://www.youtube.com/embed/' . $video->link . '/' ?>" > </iframe>
        </div>

        <!--Right tab with vid info-->
        <div class="col-md-4 video-info">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-responsive avatar-big img-rounded " src="<?php echo base_url() . 'img/avatars/'. (($uploadingUser->hasAvatar == 0) ? $uploadingUser->avatar: 'user.jpeg') ?>"
                    alt="Avatar of the user who uploaded the video">
                </div>
                <div class="col-md-7">
                    <br>
                    <p>
                        Uploaded: <b><?php echo $video->id_user ?> </b>
                        <br> Date: <b><?php echo date('d/m/Y', strtotime($video->date_of_upload)) ?></b>
                        <br> Views: <b><?php echo $video->views ?>  x</b>
                        <br> On video it's <br>
                            <b> 
                                <?php if($video->i_am_on_video == 0): ?>
                                "ME"
                                <?php else:?>
                                "SOMEONE ELSE"
                                <?php endif; ?>
                                </b>
                    </p>

                </div>
            </div>
            <br>
            <!--Ratings, date and author of video-->
            <div class="row">
                <div class="col-md-3">
                    <h4><b>Ratings</b></h4>
                </div>
                <div class="col-md-9">
                    <input type="number" class="video-rating rating" value=<?php echo $video->ratings ?>  >
                </div>
            </div>
            <b>Actual ratings: </b><span id='ratings'> <?php echo $video->ratings ?></span><br>
            <b>Rated: </b><span id='ratings_count'><?php echo $video->ratings_count ?></span> people <br>
        </div>
    </div>
    <!-- /.row -->
    
    <!--Comments part-->
    <div class="row">
        <div class="col-md-8 comments">
            <div class="page-header">
                <h2>Comments </h2>
            </div>
            <div class="listOfComments">
            <?php foreach ($comments as $comment) : ?>
            <div class="row comment<?php echo $comment->id ?> ">
            <!--AVATAR of user-->
                <div class="col-md-2">
                    <img class="img-responsive img-rounded avatar" src="<?php echo base_url() . 'img/avatars/'. (($comment->hasAvatar == 0) ? $comment->avatar: 'user.jpeg') ?>"
                     alt="Avatar of user who posted a comment" width="auto" height="auto">
                </div>
                <div class="col-md-4">
                    <h4><?php echo $comment->id_user ?> 
                        &nbsp;&nbsp;&nbsp;<span><small><?php echo date("d/m/Y", strtotime($comment->date)) ?></small></span>
                   </h4> 
                   <br>
                    <p>
                        <?php echo $comment->text ?> 
                    </p>
                </div>
                <div class="col-md-1">
                     <form action="<?php echo site_url('video/thumbs');?>" onsubmit="thumbs(<?= $comment->id ?>, 1);"
                         method="post" accept-charset="utf-8">
                        <input type="image" name="submit" src="<?php echo base_url(); ?>img/thumbsup.png" 
                        class="btn thumbs-icon btn-link <?php echo get_cookie('isLoggedIn') == '0' ? '': 'disabled' ?>" >
                        <?php echo form_hidden('commentId',$comment->id);
                              echo form_hidden('ratingValue', 1);
                              echo form_close();?>
               </div>
               <div class="col-md-1">
                     <form action="<?php echo site_url('video/thumbs');?>" onsubmit="thumbs(<?= $comment->id ?>, -1);"
                         method="post" accept-charset="utf-8">
                        <input type="image" name="submit" src="<?php echo base_url(); ?>img/thumbsdown.png" 
                        class="btn thumbs-icon btn-link <?php echo get_cookie('isLoggedIn') == '0' ? '': 'disabled' ?>" >
                        <?php echo form_hidden('commentId',$comment->id);
                              echo form_hidden('ratingValue', -1);
                              echo form_close();?>
                </div> 
                <div class="col-md-1">
                    <h4>
                      <span class="votes<?= $comment->id ?>">
                            <?php echo ($comment->ratings > 0)? "+" . $comment->ratings: $comment->ratings ?>
                      </span>
                    </h4>
                </div> 
                <div class="col-md-offset-1 col-md-2">
                     <!--DELETE COMMENT-->
                    <?php echo form_open('video/deleteComment/'.$comment->id, 
                        array('id'=>$comment->id, 'class' =>  (($this->session->userRole == NULL || $this->session->userRole == 1) ? 'hiddenElement': ''),
                        'onsubmit' => 'deleteComment('.$comment->id.')'));?>
                        <input type="image" name="submit"
                        src='<?php echo base_url(); ?>img/bin.png' class="removeComment-icon">
                        <?php echo form_close(); ?>
                </div>
            </div>
            <?php endforeach; ?>
            </div>

            <!--Add new comment form-->
            <div class="page-header hidden-print new-comment-header">
                <h4>New comment</h2>
            </div>
            <div class="row comment hidden-print" <?php echo get_cookie('isLoggedIn') == '0' ? 'visible': 'hidden'?>>
                <?php echo form_open('video/comment/', array('id'=>'new_comment')); ?>
                    <fieldset>
                        <!--AVATAR of user-->
                        <div class="col-md-2">
                                <img class="img-responsive img-rounded avatar" src="<?php echo base_url() . 'img/avatars/'. (($this->session->hasAvatar == 0) ? $this->session->avatar: 'user.jpeg') ?>"
                                alt="Your avatar - of logged in user" width="auto" height="auto">
                        </div>
                        <div class="col-md-10">
                            <h4 id='newCommentUser'><?php echo $this->session->username ?>
                                 &nbsp&nbsp&nbsp<small><span><?php echo date('d/m/Y'); ?></span></small>
                            </h4>
                            <?php echo form_textarea(array(
                                'name'          => 'comment_text',
                                'id'            => 'comment_text',
                                'class'         => 'form-control new-comment', 
                                'rows'          =>  3, 
                                'placeholder'   => "Write something here...",
                                'required'      => 'required')) ?>
                            <?php echo form_submit(array(
                                'id'            => 'submit',
                                'value'         => 'Send comment',
                                'class'         => 'btn btn-primary')) ?>
                        </div>
                    </fieldset>
                <?php echo form_close(); ?>
            </div>
            
            <div <?php echo get_cookie('isLoggedIn') == '0' ? 'hidden': 'visible'?>>
                <div class="alert alert-warning fade in" >
                    <strong>Warning! </strong> For writing comments you have to sign in first
                </div>
            </div>
        </div>
    </div>
    
<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo get_cookie('isLoggedIn') == '0' ? $this->session->skin: 1?>.css" rel="stylesheet">  