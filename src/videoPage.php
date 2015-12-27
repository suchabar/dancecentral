<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Social network for independent dancers of alternative dancing styles">
    <meta name="author" content="Barbora Suchanova">
    <link rel="icon" href="../img/favicon.ico">

    <title>Dance Central</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/styles.css" rel="stylesheet">

    <!-- Stylesheet for star rating -->
    <link href="../css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-upper navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html">Dance Central</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="../index.html">dnb step</a>
                    </li>
                    <li>
                        <a href="../index.html">jumpstyle</a>
                    </li>
                    <li>
                        <a href="../index.html">free step</a>
                    </li>
                    <li>
                        <a href="../index.html">cutting shapes</a>
                    </li>
                </ul>
                <form class="navbar-form pull-right" action="">
                    <input type="text" placeholder="Login" class="form-control">
                    <input type="password" placeholder="Password" class="form-control">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                    <button type="submit" class="btn btn-default">Sign up</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <nav hidden class="navbar navbar-lower navbar-inverse navbar-static-top" role="navigation" visible>
        <!-- Sub-navbar -->
        <div class="container">

            <ul class="nav navbar-nav ">
                <li>
                    <a href="about.html">about</a>
                </li>
                <li>
                    <a href="#">how to start</a>
                </li>
                <li>
                    <a href="#">music</a>
                </li>
            </ul>
        </div>
        <!-- /.container -->
    </nav>


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

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>&copy; Suchanova Barbora 2015</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Star rating JavaScript plugin-->
    <script src="../js/star-rating.min.js" type="text/javascript"></script>

    <!-- My JavaScript File-->
    <script src="../js/app.js"></script>



</body>

</html>