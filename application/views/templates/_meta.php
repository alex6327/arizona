<?php
if (!defined('APPPATH'))
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
    <link type="text/css" href="/assets/css/jquery-ui.css" rel="stylesheet"/>
    <script type="text/javascript" src="/assets/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.slidepanel.setup.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.cycle.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.cycle.setup.js"></script>
    <script type="text/javascript" src="/assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/assets/js/ajax.js"></script>
    <script type="text/javascript">
<?php
if (isset($slideDown)) {
    echo "$(document).ready(function(){ $('a#slideit').trigger('click'); });";
}
?>
    </script>

    <script>
<?php
$username = $this->session->userdata('username');

if ($username == '') {
    
} else {
    echo "$(document).ready(function() {
   $('li.left').replaceWith( '<li class=\"left\">欢迎您 &raquo;</li>' );
});";
    echo "$(document).ready(function() {
   $('a#slideit').replaceWith( '<a href=\"#\">$username</a>' );
});";
    echo "$(document).ready(function(){
                   $('li.right').append('<a href=\"/account/logout\">退出</a>');
               });";
}
?>
    </script>   
    <script type="text/javascript">
        $(document).ready(function() {
            $("#tabs").tabs();
        });
        $(function() {
            $( "#accordion" ).accordion();
        });
    
        function validateEmail()
        {
            var x=document.getElementById("email").value;
            var atpos=x.indexOf("@");
            var dotpos=x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
            {
                alert("Not a valid e-mail address");
                return false;
            }
        }
    </script>

</head>