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
                <a class="navbar-brand navbar-title" href="<?php echo site_url('home/') ?>">Dance Central</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav nav-danceStyles">
                     <li class="<?php echo $this->session->danceStyle == 1 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/filter/1') ?>">dnb step</a>
                    </li>
                    <li class="<?php echo $this->session->danceStyle == 2 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/filter/2') ?>" >jumpstyle</a>
                    </li>
                    <li class="<?php echo $this->session->danceStyle == 3 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/filter/3') ?>" >free step</a>
                    </li>
                    <li class="<?php echo $this->session->danceStyle == 4 ? 'active': ''?>">
                        <a href="<?php echo site_url('home/filter/4') ?>" >cutting shapes</a>
                    </li>
                </ul>
                <div id="notLoggedIn" <?php echo get_cookie('isLoggedIn') == '0' ? 'hidden': 'visible'?>>
                    <?php echo form_open('account/validate_credentials', array('class' => 'navbar-form pull-right')) ?>
                        <?php echo form_input(array(
                                    'name'          => 'login',
                                    'id'            => 'login',
                                    'placeholder'   => 'Username',
                                    'class'         => 'form-control',
                                    'value'         =>  (get_cookie('isLoggedIn') == NULL)? $this->session->username: '')) ?>
                        <?php echo form_password(array(
                                    'name'          => 'password',
                                    'id'            => 'password',
                                    'placeholder'   => 'Password',
                                    'class'         => 'form-control')) ?>
                       <?php echo form_submit(array(
                                    'name'          => 'submit',
                                    'value'         => 'Sign in',
                                    'class'         => 'btn btn-primary')) ?>
                        <a href="<?php echo site_url('account/signup/') ?>" class="btn btn-default">Sign up</a>
                    <?php echo form_close() ?>
                </div>
                <div id="loggedIn" <?php echo get_cookie('isLoggedIn') == '0' ? 'visible': 'hidden'?>>
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <img class="nav-avatar navbar-brand" 
                            src="<?php echo base_url(); ?>img/avatars/user<?php echo ($this->session->hasAvatar == 0)? $this->session->username : '' ?>.jpeg" 
                            alt="user's avatar" width="auto" height="auto">&nbsp&nbsp
                        </li>
                        <li><a href="account.php" class="navbar-brand navbar-username"><?php echo $this->session->username ?></a></li>
                        <li class="dropdown" onclick="$('#subnav-bar').hide()">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                            role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="account.php">My profile</a></li>
                                <li><a href="userVideos.php">My videos</a></li>
                                <li><a href="settings.php">Settings</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo site_url('account/logout/')?>">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!---->
            </div>
            <!-- /.container -->
    </nav>
    <nav <?php echo $this->session->danceStyle != 0 ? 'visible': 'hidden'?> id="subnav-bar" class="navbar navbar-lower navbar-inverse navbar-static-top" role="navigation" >
        <!-- Sub-navbar -->
        <div class="container">
            <ul class="nav navbar-nav ">
                <li>
                    <a href="<?php echo site_url('home/about/') ?>">about</a>
                </li>
                <li >
                    <a href="<?php echo site_url('home/how_to_start/')?>">how to start</a>
                </li>
                <li>
                    <a href="<?php echo site_url('home/music/') ?>">music</a>
                </li>
            </ul>
        </div>
        <!-- /.container -->
    </nav>
    
    <!--IF JS IS DISABLED -->
    <noscript>
        <!--ALERT-->
        <div class="container no-js">
            <div class="alert alert-warning">
                <strong>Warning!</strong><br> JavaScript must be enabled in order to use all the feaures available in DANCECENTRAL
                    such as ratings and playing videos and music. Enable JavaScript by changing your browser options, then <a href="">try again</a>
            </div> 
       </div>
  </noscript>
    

