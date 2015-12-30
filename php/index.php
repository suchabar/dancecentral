<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "head.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
    <?php 
        include "phpScripts/dbConnect.php";
        
        //LOAD ALL VIDEOS (of specific style)
        $sqlCondition = ($_SESSION["danceStyle"] != 0) ? 'WHERE dance_style = ' . $_SESSION["danceStyle"] : '';
        $sql = $db->prepare(
           "SELECT id, id_user, name, link, ratings, date_of_upload
            FROM videos " . $sqlCondition);
        $sql->execute();
        $videos = $sql->fetchAll();
    ?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <div class="dropdown filtering-dropdown pull-right">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Date added (newest > oldest)
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">Date added (oldest > newest)</a></li>
                        <li><a href="#">Best rated</a></li>
                        <li><a href="#">Worst rated</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
         <div class="row">
       <?php foreach ($videos as $video) 
       { ?>
            <div class="col-md-4">
                <!--Preview of video-->
                <div class="video-preview-play">
                    <a href=<?php echo "videoPage.php?videoId=" . $video["id"] ?> >

                        <img class="video-preview img-responsive" src=<?php echo "http://i1.ytimg.com/vi/" . $video['link'] . "/sddefault.jpg" ?> alt="">
                        <img class="video-preview-play img-responsive" src="http://www.slatecube.com/images/play-btn.png" alt="">
                    </a>
                </div>

                <!--Title of video-->
                <h3 class="video-header">
                    <a href=<?php echo "videoPage.php?videoId=" . $video["id"] ?>>
                    <?= htmlspecialchars($video["name"], ENT_QUOTES) ?> </a>
                </h3>

                <!--Ratings, date and author of video-->
                <div class="row">
                    <div class="col-md-4">
                        <h4>
                            <a href="#" style="color: black"><b> <?= htmlspecialchars($video["id_user"], ENT_QUOTES) ?></b></a>
                        </h4>
                        <h6 class="video-date"> <?= date('d/m/Y', strtotime($video["date_of_upload"])) ?></h6>
                    </div>
                    <div class="col-md-8">
                        <input type="number" class="my-rating rating" value=<?= htmlspecialchars($video["ratings"], ENT_QUOTES) ?> >
                    </div>
                </div>
            </div>
        <?php } ?> 
        </div>
            
        <hr>
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
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
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Footer -->
        <?php include "footer.php"; ?>
    </div>
    <!-- /.container -->
    <?php include "scripts.php"; ?>
</body>
</html>