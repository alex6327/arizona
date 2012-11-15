<?php
if(!defined('APPPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $pagetitle ?></title>
    <link rel="icon" type="image/png" href="imgs/logo.png" />
    <link type="text/css" href="/assets/css/layout.css" rel="stylesheet" />	 
    <link type="text/css" href="/assets/css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="/assets/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.slidepanel.setup.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.cycle.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.cycle.setup.js"></script>
    <script type="text/javascript" src="/assets/js/jquery-ui.js"></script>
    <script>
    $(document).ready(function() {
    $("#menu").menu();
    });
  </script>
</head>