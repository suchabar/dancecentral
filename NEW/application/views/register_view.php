<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <?php $attributes = array('class' => 'form-horizontal registration', 'role' => 'form');
                echo form_open('account/register/', $attributes) ?>
                <!--SUCCESS ALERT-->
                <div class="alert alert-success fade in" id="success-alert" hidden>
                    <a type="button" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success! </strong> You can now login as registred dancer :)
                </div>

                <legend>Registration of new awesome dancer :-3</legend>
                <!--EMAIL-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="inputEmail">Email</label>
                    <div class="col-sm-3">
                        <input type="email" class="form-control" id="inputEmail">
                    </div>
                </div>

                <!--USERNAME-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="inputUsername">Username</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="inputUsername">
                    </div>
                </div>
                <!--AVATAR-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="avatar">Avatar</label>
                    <div class="col-sm-1">
                        <img id="avatar" class="img-responsive img-rounded " src="<?php echo base_url(); ?>img/avatar_unknown.jpeg" alt="" width="100px" height="100px">
                    </div>
                    <div class="col-sm-3 fileinput" data-provides="fileinput">
                        <div id="fileinput-new">No file chosen</div>
                        <div>
                            <span class="btn btn-primary btn-file">
                            <span >Choose file</span>
                            <input type="file" onchange="onFileSelected(event)" />
                            </span>
                        </div>


                    </div>
                </div>
                <!--PASSWORD-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="inputPassword">Password</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="inputPassword2">Repeat password</label>
                    <div class="col-sm-3">
                        <input type="password" class="form-control" id="inputPassword2">
                    </div>
                </div>
                <!--DANCE STYLE-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="danceStyle">Interested in</label>
                    <div class="col-sm-3">
                        <select class="form-control" class="form-control" id="danceStyle">
                            <option>dnb step</option>
                            <option>jumpstyle</option>
                            <option>freestep</option>
                            <option>cutting shapes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-1">
                        <?php echo form_submit('signUp', 'Sign up', array('class' => 'btn btn-primary')); ?>
                    </div>
                    <div class="col-sm-9">
                        <a href="<?php echo site_url('home/') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            <?php  echo form_close() ?>
        </div>
    </div>
    <!--./row-->