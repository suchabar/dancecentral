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
                <iframe class="vid-responsive" width="720" height="480" src="http://www.youtube.com/embed/SXN1vlYygsY?start=68"></iframe>

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
                            Uploaded: <b>BarushCZ</b>
                            <br> Date: <b>25/12/2015</b>
                            <br> Views: <b>136x</b>
                            <br> On video it's <b>ME</b>
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
                        <input type="number" class="my-rating rating">
                    </div>
                </div>
                <b>Actual ratings:</b> 4,16
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
                <div class="row comment">
                    <!--AVATAR of user-->
                    <div class="col-md-2">
                        <img class="img-responsive img-rounded" src="../img/user.jpeg" alt="" width="auto" height="auto">
                    </div>
                    <div class="col-md-10">
                        <h4>BarushCZ
                            &nbsp&nbsp&nbsp<span><small>26/12/2015</small></span>
                            &nbsp&nbsp&nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            &nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                             &nbsp&nbsp&nbsp<span><small><b>+ 14</b></small></span>
                            </h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam voluptatem tempora laborum eaque ducimus non minima
                        </p>
                    </div>
                </div>

                <br>
                <div class="row comment">
                    <!--AVATAR of user-->
                    <div class="col-md-2">
                        <img class="img-responsive img-rounded" src="../img/user.jpeg" alt="" width="auto" height="auto">
                    </div>
                    <div class="col-md-10">
                        <h4>BarushCZ
                            &nbsp&nbsp&nbsp<span><small>26/12/2015</small></span>
                            &nbsp&nbsp&nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            &nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                             &nbsp&nbsp&nbsp<span><small><b>+ 14</b></small></span>
                            </h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam voluptatem tempora laborum eaque ducimus non minima
                        </p>
                    </div>
                </div>

                <br>
                <div class="row comment">
                    <!--AVATAR of user-->
                    <div class="col-md-2">
                        <img class="img-responsive img-rounded" src="../img/user2.jpg" alt="" width="auto" height="auto">
                    </div>
                    <div class="col-md-10">
                        <h4>Kendas
                            &nbsp&nbsp&nbsp<span><small>26/12/2015</small></span>
                            &nbsp&nbsp&nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            &nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                             &nbsp&nbsp&nbsp<span><small><b>+ 14</b></small></span>
                            </h4>
                        <p>
                            Awesome moves!!!
                        </p>
                    </div>
                </div>
                <br>
                <div class="row comment">
                    <!--AVATAR of user-->
                    <div class="col-md-2">
                        <img class="img-responsive img-rounded" src="../img/user.jpeg" alt="" width="auto" height="auto">
                    </div>
                    <div class="col-md-10">
                        <h4>BarushCZ
                            &nbsp&nbsp&nbsp<span><small>26/12/2015</small></span>
                            &nbsp&nbsp&nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            &nbsp<a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                             &nbsp&nbsp&nbsp<span><small><b>+ 14</b></small></span>
                            </h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam voluptatem tempora laborum eaque ducimus non minima Lorem
                            ipsum dolor sit amet, consectetur adipisicing elit. Modi nobis in consectetur explicabo fuga
                            tempore vel facere dicta aliquid ratione libero nulla, placeat excepturi maiores. Doloremque,
                            fuga, voluptatibus. Porro, amet.
                        </p>
                    </div>
                </div>
                <br>

                <!--Add new comment form-->
                <div class="row comment">
                    <form>
                        <fieldset>
                            <legend>New comment</legend>
                            <!--AVATAR of user-->
                            <div class="col-md-2">
                                <img class="img-responsive img-rounded" src="../img/user.jpeg" alt="" width="auto" height="auto">
                            </div>
                            <div class="col-md-10">
                                <h4>BarushCZ
                                    &nbsp&nbsp&nbsp<span><small>
                                        <?php echo date('d/m/Y'); ?></small></span>
                                </h4>
                                <textarea class="form-control new-comment" rows="3" placeholder="Write something here..."></textarea>
                                <button type="submit" class="btn btn-primary">Submit</button>
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

        
