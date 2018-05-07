<?php

include 'connect.php';

// Routes

$tpl    = 'includes/templates/';                // Template Directory
$func   = 'includes/functions/';                // Function Directory
$css    = 'layout/css/';                        // Css Directory
$js     = 'layout/js/';                         // Js Directory 



// Include the Important Files
include $func . 'functions.php';
include $tpl . 'header.php';


if (!isset($noNavbar)) {include $tpl . 'navbar.php';}

