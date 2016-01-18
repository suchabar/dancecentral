<!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-sm-12">
                <?php echo validation_errors('<div class="alert alert-warning alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" 
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Warning! </strong>','</div>'); ?>
                                            
                <div class="alert alert-danger alert-dismissible 
                    <?php echo isset($displayError)? '': 'hiddenElement'?>" role="alert">
                     <button type="button" class="close" data-dismiss="alert" 
                             aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong>Error!</strong><?php echo isset($displayError)? $displayError : '' ?>
                </div>
                
                <div class="alert alert-success alert-dismissible 
                    <?php echo isset($displaySuccess)? '': 'hiddenElement'?>" role="alert">
                     <button type="button" class="close" data-dismiss="alert" 
                             aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <strong>Success!</strong><?php echo isset($displaySuccess)? $displaySuccess: '' ?>
                </div>
                
                <?php $attributes = array('class' => 'form-horizontal accountUpdate');
                       echo form_open_multipart('account/changeAvatar', $attributes) ?>
                    <legend>Change your avatar</legend>
                    <!--AVATAR-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="avatar">Avatar</label>
                        <div class="col-sm-1">
                            <img id="avatar" class="img-responsive img-rounded" 
                            src="<?php echo base_url(). 'img/avatars/'. (($userData->hasAvatar == 0) ? $userData->avatar: 'user.jpeg') ?>" 
                            alt="New avatar of user - you" >
                        </div>
                        <div class="col-sm-3 " >
                            <div>
                                <input type="file" id="newAvatar" name="newAvatar">
                                <?php  echo form_submit('submit', 'Upload', array('class' => 'btn btn-primary avatar', 'id' => 'uploadImage'));?>
                            </div>
                        </div>
                    </div>
                 <?php  echo form_close() ?>
                
                 <?php $attributes = array('class' => 'form-horizontal accountUpdate');
                       echo form_open('account/updateAccount', $attributes) ?>
                       
                    <legend>Account information</legend>
                   <!--EMAIL-->
                    <div id="emailField" class="form-group required ">
                        <label class="control-label col-sm-2" for="email">Email </label>
                        <div class="col-sm-3">
                            <span id="emailSpan" class="form-control-feedback"></span>
                            <?php echo form_input(array(
                                        'name'          => 'email',
                                        'id'            => 'email',
                                        'class'         => 'form-control',
                                        'required'      =>  'required',
                                        'value'         =>  isset($displayError) ? $this->input->post("email") : $userData->email )) ?>
                        </div>
                    </div>
                    <!--PASSWORD-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="changePassword">Password</label>
                        <div class="col-sm-3">
                            <a id="changePassword" href="<?php echo site_url('account/settings/') ?>"><b>Change password</b></a>
                        </div>
                    </div>
                     <!--DANCE STYLE-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="danceStyle">Interested in</label>
                        <div class="col-sm-3">
                            <?php echo form_dropdown('danceStyle', array(
                                        '1'       => 'dnb step',
                                        '2'       => 'jumpstyle',
                                        '3'       => 'freestep',
                                        '4'       => 'cutting shapes'), 
                                        isset($displayError) ? $this->input->post("danceStyle") : $userData->dance_style,
                                        array('class'    => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <?php echo form_submit('updateAccount', 'Save changes', array('class' => 'btn btn-primary', 
                                                                                'id' => 'updateAccount')); ?>
                            <a href="<?php echo site_url('home/') ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                <?php  echo form_close() ?>
            </div>
        </div>
        <!--./row-->
  
<!-- SKIN CSS -->      
<link href="<?php echo base_url(); ?>css/styles<?php echo $this->session->skin ?>.css" rel="stylesheet">  