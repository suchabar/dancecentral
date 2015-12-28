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
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal registration" role="form">
                    <!--SUCCESS ALERT-->
                    <div class="alert alert-success fade in" id="success-alert" hidden>
                        <a type="button" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success! </strong> You set the new password
                    </div>

                    <legend>Account settings</legend>
                    <br>
                    <legend><h5>Change of password</h5></legend>
                    <!--PASSWORD-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="newPassword2">New Password</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" id="newPassword2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="newPassword2">Repeat New Password</label>
                        <div class="col-sm-3">
                            <input type="password" class="form-control" id="newPassword2">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <a id="accountChangesButton" class="btn btn-primary">Set password</a>
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                    <br><br>
                    <legend><h4>Set you personal page appereance</h4></legend>
                    <!--SKINS-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pageSkin">Page skins</label>
                        <div class="col-sm-3">
                            <select class="form-control" class="form-control" id="danceStyle">
                                <option>Drakula</option>
                                <option>Light</option>
                                <option>Pinky</option>
                                <option>Hipster</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <a id="accountChangesButton" class="btn btn-primary">Save changes</a>
                            <a href="index.php" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--./row-->
        
        <!-- Footer -->
        <?php include "footer.php"; ?>
    </div>
    <!-- /.container -->
    <?php include "scripts.php"; ?>
</body>
</html>