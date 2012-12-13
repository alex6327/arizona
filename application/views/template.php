<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php $this->load->view("templates/_meta"); ?>
    <body>
        <div class="warapper col0">
            <?php $this->load->view("templates/_topbar"); ?>            
        </div>
        <div class="warapper col1">
            <?php $this->load->view("templates/_header"); ?>
        </div>
        <div class="warapper col2">

            <?php $this->load->view($sitenavi, $data); ?>
        </div>
        <div class="warapper col3">
            <?php $this->load->view($pagebody, $data); ?>            
        </div>
        <div class="warapper col4">
            <?php $this->load->view("templates/_footer"); ?>            
        </div>
        <div class="warapper col5">
            <?php $this->load->view("templates/_copyright"); ?>            
        </div>
    </body>
</html>