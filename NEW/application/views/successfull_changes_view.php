<?php
/**
 * This file contains view used for displaying success after some changes in account/settings page
 */ 
?>
<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <h3>Account changes</h3>
            <hr>
                <!--SUCCESS ALERT-->
                <div class="alert alert-success fade in" >
                    <strong>Success! </strong> Changes were successfully saved :)
                </div>
                
        </div>
    </div>
    <!--./row-->
<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo $this->session->skin ?>.css" property="stylesheet" rel="stylesheet"> 