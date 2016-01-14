<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Social network for independent dancers of alternative dancing styles">
    <meta name="author" content="Barbora Suchanova">
    <link rel="icon" href="<?php echo base_url(); ?>img/favicon.ico">

    <title>Dance Central</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet">

    <!-- Stylesheet for star rating -->
    <link href="<?php echo base_url(); ?>css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
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
                <a class="navbar-brand navbar-title" href="<?php echo site_url('') ?>">Dance Central</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav nav-danceStyles">
                     <li class="<?php echo $danceStyle == 1 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/style/1') ?>">dnb step</a>
                    </li>
                    <li class="<?php echo $danceStyle == 2 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/style/2') ?>" >jumpstyle</a>
                    </li>
                    <li class="<?php echo $danceStyle == 3 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/style/3') ?>" >free step</a>
                    </li>
                    <li class="<?php echo $danceStyle == 4 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/style/4') ?>" >cutting shapes</a>
                    </li>
                </ul>
                <div id="notLoggedIn" hidden>
                    <form class="navbar-form pull-right" action="">
                        <input type="text" placeholder="Login" class="form-control">
                        <input type="password" placeholder="Password" class="form-control">
                        <button type="submit" class="btn btn-primary" onclick="login()">Sign in</button>
                        <a href="signUp.php" class="btn btn-default">Sign up</a>
                    </form>
                </div>
                <div id="loggedIn" visible>
                    <ul class="nav navbar-nav pull-right">
                        <li><img class="nav-avatar navbar-brand" src="<?php echo base_url(); ?>img/user.jpeg" alt="" width="auto" height="auto">&nbsp&nbsp</li>
                        <li><a href="account.php" class="navbar-brand navbar-username">BarushCZ</a></li>
                        <li class="dropdown" onclick="$('#subnav-bar').hide()">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="account.php">My profile</a></li>
                                <li><a href="userVideos.php">My videos</a></li>
                                <li><a href="settings.php">Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li onclick="logout()"><a>Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!---->
            </div>
            <!-- /.container -->
    </nav>
    <nav <?php echo $danceStyle != 0 ? 'visible': 'hidden'?> id="subnav-bar" class="navbar navbar-lower navbar-inverse navbar-static-top" role="navigation" >
        <!-- Sub-navbar -->
        <div class="container">
            <ul class="nav navbar-nav ">
                <li>
                    <a href="<?php echo site_url('home/about/'. $danceStyle) ?>">about</a>
                </li>
                <li >
                    <a href="<?php echo site_url('home/how_to_start/'. $danceStyle )?>">how to start</a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/music/'. $danceStyle) ?>">music</a>
                </li>
            </ul>
        </div>
        <!-- /.container -->
    </nav>

