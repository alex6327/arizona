<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php $this->load->view("backend/meta"); ?>
    <body>
        <div class="navbar">
            <?php $this->load->view("backend/navbar",$data); ?>            
        </div>
        <div class="sidebar-nav">
            <?php $this->load->view("backend/sidebar-nav",$data); ?>
        </div>
        <div class="content">

            <?php $this->load->view($pagebody, $data); ?>
        </div>
    </body>
</html>