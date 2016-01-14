<!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <div class="dropdown filtering-dropdown pull-right">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                    <span id="selected">Date added (newest > oldest)</span>
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('home/arrangement/date_of_upload/desc/'. $danceStyle) ?>">Date added (newest > oldest)</a></li>
                    <li><a href="<?php echo site_url('home/arrangement/date_of_upload/asc/'. $danceStyle) ?>">Date added (oldest > newest)</a></li>
                    <li><a href="<?php echo site_url('home/arrangement/ratings/desc/'. $danceStyle) ?>">Best rated</a></li>
                    <li><a href="<?php echo site_url('home/arrangement/ratings/asc/'. $danceStyle) ?>">Worst rated</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
    <?php foreach ($videos as $video) : ?>
        <div class="col-md-4">
            <!--Preview of video-->
            <div class="video-preview-play">
                <a href="<?php echo site_url('home/video_detail/' . $video->id) ?>">
                    <img class="video-preview img-responsive" src=<?php echo "http://img.youtube.com/vi/" . $video->link . "/0.jpg" ?> alt="">
                    <img class="video-preview-play img-responsive" src="http://www.slatecube.com/images/play-btn.png" alt="">
                </a>
            </div>

            <!--Title of video-->
            <h3 class="video-header">
                <a href="<?php echo site_url('home/video_detail/' . $video->id) ?>">
                <?= $video->name ?> </a>
            </h3>

            <!--Ratings, date and author of video-->
            <div class="row">
                <div class="col-md-4">
                    <h4>
                        <a href="#" style="color: black"><b> <?= $video->id_user ?></b></a>
                    </h4>
                    <h6 class="video-date"> <?= date('d/m/Y', strtotime($video->date_of_upload)) ?></h6>
                </div>
                <div class="col-md-8">
                    <input type="number" class="my-rating rating" value=<?= $video->ratings ?> >
                </div>
            </div>
        </div>
    <?php endforeach; ?> 
    </div>
        
    <hr>
    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li id="leftArrow">
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li id="rightArrow">
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>