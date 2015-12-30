<?php 
    include "phpScripts/dbConnect.php";
    $videoId = $_GET['videoId'];
    //LOAD ALL VIDEOS (of specific style)
    $sql = $db->prepare(
        "SELECT name ,link, description, ratings,views,date_of_upload, i_am_on_video, id_user
        FROM videos
        WHERE id = " . $videoId);
    $sql->execute();
    $video = $sql->fetch();
    
    //LOAD ALL COMMENTS AVAILABLE
    
    $sql = $db->prepare(
        "SELECT id_user, text, ratings, date
        FROM comments
        WHERE id_video = " . $videoId);
    $sql->execute();
    $comments = $sql->fetchAll();
    //NEW COMMENT from form
    if (isset($_POST["new-comment"])) 
    {
        $sql = $db->prepare(
            "INSERT INTO comments (id_user, id_video, text, date)
            VALUES (?, ?, ?, NOW())");
        $sql->execute([$video["id_user"], $videoId, $_POST["text"]]);
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "head.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>
    <!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="video-page row">
            <div class="col-md-8">
                <iframe class="vid-responsive" src=<?php echo "http://www.youtube.com/embed/" . $video["link"] . "/" ?>  width="720" height="480" > </iframe>
            </div>

            <!--Right tab with vid info-->
            <div class="col-md-4 video-info">
                <div class="row">
                    <div class="col-md-5">
                        <img class="img-responsive avatar img-rounded" src="../img/user.jpeg" alt="">
                    </div>
                    <div class="col-md-7">
                        <br>
                        <p>
                            Uploaded: <b><?= htmlspecialchars($video["id_user"], ENT_QUOTES) ?></b>
                            <br> Date: <b><?= date('d/m/Y', strtotime($video["date_of_upload"])) ?></b>
                            <br> Views: <b><?= htmlspecialchars($video["views"], ENT_QUOTES) ?> x</b>
                            <br> On video it's 
                                <b> 
                                    <?php if($video["i_am_on_video"] == 0): ?>
                                    "ME"
                                    <?php else:?>
                                    "Someone else"
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
                        <input type="number" class="my-rating rating" value=<?= htmlspecialchars($video['ratings'], ENT_QUOTES) ?> >
                    </div>
                </div>
                <b>Actual ratings:</b> <?= htmlspecialchars($video["ratings"], ENT_QUOTES) ?>
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
                <?php foreach ($comments as $comment) 
                { ?>
                <div class="row comment">
                <!--AVATAR of user-->
                    <div class="col-md-2">
                        <img class="img-responsive img-rounded" src="../img/user.jpeg" alt="" width="auto" height="auto">
                    </div>
                    <div class="col-md-10">
                        <h4><?= htmlspecialchars($comment["id_user"], ENT_QUOTES) ?>
                            &nbsp&nbsp&nbsp<span><small><?= date('d/m/Y', strtotime($comment["date"])) ?></small></span>
                            &nbsp&nbsp&nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            &nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                            &nbsp&nbsp&nbsp<span><small><b>+ <?= htmlspecialchars($comment["ratings"], ENT_QUOTES) ?></b></small></span>
                            </h4>
                        <p>
                            <?= htmlspecialchars($comment["text"], ENT_QUOTES) ?>
                        </p>
                    </div>
                </div>
                <br>
                <?php } ?>

                <!--Add new comment form-->
                <div class="row comment">
                    <form method="post">
                        <fieldset>
                            <legend>New comment</legend>
                            <!--AVATAR of user-->
                            <div class="col-md-2">
                                 <img class="img-responsive img-rounded" src=
                                 <?php if(!$loggedIn): ?>
                                 "../img/user.jpeg"
                                 <?php else: echo $userImgSrc?>
                                 <?php endif; ?>
                                  alt="" width="auto" height="auto">
                            </div>
                            <div class="col-md-10">
                                <h4>
                                    <?php if(!$loggedIn): ?>
                                    BarushCZ
                                    <?php else: ?>
                                    BarushCZ
                                    <?php endif; ?>
                                     &nbsp&nbsp&nbsp<span><small>
                                        <?php echo date('d/m/Y'); ?></small></span>
                                </h4>
                                <textarea name="text" class="form-control new-comment" rows="3" placeholder="Write something here..."></textarea>
                                <input type="submit" class="btn btn-primary" value="send comment" name="new-comment">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <?php include "footer.php"; ?>
    </div>
    <!-- /.container -->
    <?php include "scripts.php"; ?>
</body>
</html>

        
