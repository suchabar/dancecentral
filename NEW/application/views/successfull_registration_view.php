<?php
/**
 * This file contains view used for displaying success after registration
 */ 
?>
<!-- Page Content -->
<div class="container">

    <!-- Page Header -->
    <div class="row">
        <div class="col-sm-12">
            <h3>Registration of new awesome dancer :-3</h3>
            <hr>
                <!--SUCCESS ALERT-->
                <div class="alert alert-success fade in" >
                    <strong>Success! </strong> You can now login as registred dancer :)
                </div>
                
        </div>
    </div>
    <!--./row-->
<!-- SKIN CSS --> 
<link href="<?php echo base_url(); ?>css/styles<?php echo $this->session->skin ?>.css" property="stylesheet" rel="stylesheet"> 