<?php
/**
 * This file contains base template for views.
 */ 
?>
<?php $this->load->view("includes/header"); ?>

<?php $this->load->view($pageContent); ?>

<?php $this->load->view("includes/footer"); ?>