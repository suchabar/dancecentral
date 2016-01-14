<!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="video-page row">
        <div class="col-md-8">

            <iframe class="vid-responsive" src="<?php echo 'http://www.youtube.com/embed/' . $video->link . '/' ?>"  width="720" height="480" > </iframe>
        </div>

        <!--Right tab with vid info-->
        <div class="col-md-4 video-info">
            <div class="row">
                <div class="col-md-5">
                    <img class="img-responsive avatar img-rounded" src="<?php echo base_url(); ?>img/user.jpeg" alt="">
                </div>
                <div class="col-md-7">
                    <br>
                    <p>
                        Uploaded: <b><?php echo $video->id_user ?> </b>
                        <br> Date: <b><?php date('d/m/Y', strtotime($video->date_of_upload)) ?></b>
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
                    <input type="number" class="my-rating rating" value=<?php echo $video->ratings ?>  >
                </div>
            </div>
            <b>Actual ratings:</b> <?php echo $video->ratings ?> 
            <br>
            <b>Rated:</b> 16 people
        </div>
    </div>
    <!-- /.row -->

    <!--Comments part-->
    <div class="row">
        <div class="col-md-8 comments">
            <div class="page-header">
                <h2>Comments </h2>
            </div>
            <?php foreach ($comments as $comment) : ?>
            <div class="row comment">
            <!--AVATAR of user-->
                <div class="col-md-2">
                    <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>img/user.jpeg" alt="" width="auto" height="auto">
                </div>
                <div class="col-md-10">
                    <h4><?php echo $comment->id_user ?> 
                        &nbsp&nbsp&nbsp<span><small><?php date('d/m/Y', strtotime($comment->date)) ?></small></span>
                        &nbsp&nbsp&nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                        &nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                        &nbsp&nbsp&nbsp<span><small><b>+ <?php echo $comment->ratings ?> </b></small></span>
                        </h4>
                    <p>
                        <?php echo $comment->text ?> 
                    </p>
                </div>
            </div>
            <br>
            <?php endforeach; ?>

            <!--Add new comment form-->
            <div class="page-header">
                <h4>New comment</h2>
            </div>
            <div class="row comment">
                <form method="post">
                    <fieldset>
                        <!--AVATAR of user-->
                        <div class="col-md-2">
                                <img class="img-responsive img-rounded" src=
                                "<?php echo base_url(); ?>img/user.jpeg"
                                alt="" width="auto" height="auto">
                                
                                
                                <!--<?php if(!$loggedIn): ?>
                                "<?php echo base_url(); ?>img/user.jpeg"
                                <?php else: echo $userImgSrc?>
                                <?php endif; ?>-->
                        </div>
                        <div class="col-md-10">
                            <h4>
                                
                                <!--<?php if(!$loggedIn): ?>
                                BarushCZ
                                <?php else: ?>
                                BarushCZ
                                <?php endif; ?>-->
                                
                                
                                BarushCZ
                                    &nbsp&nbsp&nbsp<span><small>
                                    <?php echo date('d/m/Y'); ?></small></span>
                            </h4>
                            <textarea name="text" class="form-control new-comment" rows="3" placeholder="Write something here..."></textarea>
                            <input type="submit" class="btn btn-primary" value="Send comment" name="new-comment">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>