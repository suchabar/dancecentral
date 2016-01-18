<!-- Page Content -->
    <div class="container">
        <!-- Page Header -->
        <div class="row">
            <div class="col-sm-12">
                    <legend>Account settings</legend>
                    
                     <?php echo validation_errors('<div class="alert alert-warning alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" 
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Warning! </strong>','</div>'); ?>
                    <br>
                    <?php $attributes = array('class' => 'form-horizontal updateAccount');
                            echo form_open('account/changePassword', $attributes) ?>
                    <legend><h5>Change of password</h5></legend>
                    <!--PASSWORD-->
                    <div id="passwordField" class="form-group required">
                        <label class="control-label col-sm-2" for="passwordInput">Password </label>
                        <div class="col-sm-3">
                            <span id="passwordSpan" class="form-control-feedback"></span>
                            <?php echo form_password(array(
                                        'name'          => 'password',
                                        'id'            => 'passwordInput',
                                        'class'         => 'form-control password',
                                        'required'      =>  'required')) ?>
                        </div>
                    </div>
                    <!--SECOND PASSWORD-->
                    <div id="passwordField2" class="form-group required">
                        <label class="control-label col-sm-2" for="passwordInput2">Repeat New Password </label>
                        <div class="col-sm-3">
                            <span id="passwordSpan2" class="form-control-feedback"></span>                        
                            <?php echo form_password(array(
                                        'name'          => 'password2',
                                        'id'            => 'passwordInput2',
                                        'class'         => 'form-control password',
                                        'required'      =>  'required')) ?>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <?php echo form_submit('saveChanges1', 'Set password', array('class' => 'btn btn-primary', 
                                                                                'id' => 'saveChanges1')); ?>
                            <a href="<?php echo site_url('home/') ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                     <?php  echo form_close() ?>
                    <br><br>
                    
                    <?php $attributes = array('class' => 'form-horizontal updateAccount');
                            echo form_open('account/setSkin', $attributes) ?>
                    <legend><h5>Set you personal page appereance</h5></legend>
                    <!--SKINS-->
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pageSkin">Page skins</label>
                        <div class="col-sm-3">
                            <?php echo form_dropdown('skin', array(
                                    '1'       => 'Default',
                                    '2'       => 'Pinky',
                                    '3'       => 'Hipster'), 
                                    $userData->skin ,
                                    array('class'    => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <?php echo form_submit('saveChanges2', 'Save changes', array('class' => 'btn btn-primary', 
                                                                                'id' => 'saveChanges2')); ?>
                            <a href="<?php echo site_url('home/') ?>" class="btn btn-default">Cancel</a>
                        </div>
                    </div>
                <?php  echo form_close() ?>
            </div>
        </div>
        <!--./row-->
<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo $this->session->skin ?>.css" rel="stylesheet">  