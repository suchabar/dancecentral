<?php
/**
 * This file contains view used for uploading of new video
 */ 
?>
<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <?php $attributes = array('class' => 'form-horizontal registration');
                echo form_open('video/uploadVideo', $attributes) ?>
                <?php echo validation_errors('<div class="alert alert-warning alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" 
                                                     aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                 <strong>Warning! </strong>','</div>'); ?>

                <legend>Upload new awesome video !</legend>
                <!--NAME OF VIDEO-->
                <div id="nameOfVideoField" class="form-group required">
                    <label class="control-label col-sm-2" for="nameOfVideo">Name of the video </label>
                    <div class="col-sm-3">
                         <span id="nameOfVideoSpan" class="form-control-feedback"></span>
                         <?php echo form_input(array(
                                    'name'          => 'nameOfVideo',
                                    'id'            => 'nameOfVideo',
                                    'class'         => 'form-control',
                                    'required'      =>  'required', 
                                    'value'         =>  isset($displayError) ? $this->input->post("nameOfVideo") : "" )) ?>
                     
                    </div>
                    
                </div>
                
                <!--LINK ON YOUTUBE-->
                <div id="linkField" class="form-group required ">
                    <label class="control-label col-sm-2" for="link">Youtube Video ID </label>
                    <div class="col-sm-3">
                         <span id="linkSpan" class="form-control-feedback"></span>
                         <?php echo form_input(array(
                                    'name'          => 'link',
                                    'id'            => 'link',
                                    'class'         => 'form-control',
                                    'required'      =>  'required',
                                    'value'         =>  isset($displayError) ? $this->input->post("link") : "" )) ?>
                    </div>
                </div>
               
                <!--I AM ON THE VIDEO ?-->
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="whoIsOnVideo">Who is on the video</label>
                    <div class="col-sm-3">
                         <?php echo form_dropdown('whoIsOnVideo', array(
                                    '0'       => 'Me',
                                    '1'       => 'Someone else'), '0',
                                    array('class'    => 'form-control')) ?>
                    </div>
                </div>
               
                <!--DANCE STYLE-->
                <div class="form-group">
                    <label class="control-label col-sm-2" for="danceStyle">Dance style</label>
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
                        <?php echo form_submit('uploadVideo', 'Upload', array('class' => 'btn btn-primary', 
                                                                             'id' => 'uploadVideo')); ?>
                    </div>
                    <div class="col-sm-9">
                        <a href="<?php echo site_url('video/userVideos/'.$this->session->username) ?>" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            <?php  echo form_close() ?>
        </div>
    </div>
    <!--./row-->
<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo $this->session->skin ?>.css" rel="stylesheet">  