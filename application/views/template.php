<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html xmlns="http://www.w3.org/1999/xhtml">
    
    <?php $this->load->view("_meta");?>
    <body>
        <div class="warapper col0">
            <?php $this->load->view("_topbar");?>            
        </div>
        <div class="warapper col1">
            <?php $this->load->view("_header");?>
        <div class="warapper col2">
            <?php $this->load->view("_slide");?>
        </div>
        <div class="warapper col3">
            <?php $this->load->view("_homecontent");?>            
        </div>
        <div class="warapper col4">
            <?php $this->load->view("_footer");?>            
        </div>
        <div class="warapper col5">
            <?php $this->load->view("_copyright");?>            
        </div>
    </body>
</html>