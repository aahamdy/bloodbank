<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="GeniusOcean Admin Panel.">
    <meta name="author" content="GeniusOcean">

    <title>Blood Bank - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo $css ?>dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $css ?>responsive.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $css ?>bootstrap-toggle.min.css">
    <link rel="stylesheet" href="<?php echo $css ?>font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $css ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $css ?>backend.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css ?>style.css">

    <?php if (isset($loaderScript)) {  echo '<script type="text/javascript" src="' . $js . 'loader.js"></script>' ;}?>


<?php if (!isset($loaderScript)) { echo '
</head>

<body>
'; }
?>