<?php
/**
 * This file contains view used for registration of new user
 */ 
?>
<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <?php $attributes = array('class' => 'form-horizontal registration');
                echo form_open('account/register', $attributes) ?>
                <?php echo validation_errors('<div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" 
                                                     aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                 <strong>Warning! </strong>','</div>'); ?>

                <legend>Registration of new awesome dancer :-3</legend>
                <!--USERNAME-->
                <div id="usernameField" class="form-group required">
                    <label class="control-label col-sm-2" for="username">Username </label>
                    <div class="col-sm-3">
                         <span id="usernameSpan" class="form-control-feedback"></span>
                         <?php echo form_input(array(
                                    'name'          => 'username',
                                    'id'            => 'username',
                                    'class'         => 'form-control',
                                    'required'      =>  'required', 
                                    'value'         =>  isset($displayError) ? $this->input->post("username") : "" )) ?>
                     
                    </div>
                    
                </div>
                
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
                                    'value'         =>  isset($displayError) ? $this->input->post("email") : "" )) ?>
                    </div>
                </div>
               
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
                    <label class="control-label col-sm-2" for="passwordInput2">Repeat password </label>
                    <div class="col-sm-3">
                         <span id="passwordSpan2" class="form-control-feedback"></span>                        
                         <?php echo form_password(array(
                                    'name'          => 'password2',
                                    'id'            => 'passwordInput2',
                                    'class'         => 'form-control password',
                                    'required'      =>  'required')) ?>
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
                                    '4'       => 'cutting shapes'), '1',
                                    array('class'    => 'form-control')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-1">
                        <?php echo form_submit('signUp', 'Sign up', array('class' => 'btn btn-primary', 
                                                                             'id' => 'signUp')); ?>
                    </div>
                    <div class="col-sm-9">
                        <a href="<?php echo site_url('home/') ?>" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            <?php  echo form_close() ?>
        </div>
    </div>
    <!--./row-->
<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo $this->session->skin ?>.css" rel="stylesheet">  