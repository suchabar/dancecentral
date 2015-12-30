<?php
    session_start();
    include "phpScripts/nav-bar-script.php";
    $loggedIn = false;
    
?>
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
                <a class="navbar-brand navbar-title" href="index.php">Dance Central</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav nav-danceStyles">
                    <li class="<?php echo isSelected(1)?>">
                        <a href="index.php?style=1">dnb step</a>
                    </li>
                    <li class="<?php echo isSelected(2)?>">
                        <a href="index.php?style=2" >jumpstyle</a>
                    </li>
                    <li class="<?php echo isSelected(3)?>">
                        <a href="index.php?style=3" >free step</a>
                    </li>
                    <li class="<?php echo isSelected(4)?>">
                        <a href="index.php?style=4" >cutting shapes</a>
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
                        <li><img class="nav-avatar navbar-brand" src="../img/user.jpeg" alt="" width="auto" height="auto">&nbsp&nbsp</li>
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
    <nav <?php echo $isVisible ?> id="subnav-bar" class="navbar navbar-lower navbar-inverse navbar-static-top" role="navigation" >
        <!-- Sub-navbar -->
        <div class="container">
            <ul class="nav navbar-nav ">
                <li>
                    <a href="about.php?style=<?php echo $_SESSION['danceStyle'] ?>">about</a>
                </li>
                <li >
                    <a href="howToStart.php?style=<?php echo $_SESSION['danceStyle'] ?>">how to start</a>
                </li>
                <li>
                    <a href="music.php?style=<?php echo $_SESSION['danceStyle'] ?>">music</a>
                </li>
            </ul>
        </div>
        <!-- /.container -->
    </nav>

