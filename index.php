<?php

ini_set('max_execution_time', 15000); //300 seconds = 5 minutes
require("config.php");
require("common_start.php");
include("lib/func.lib.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="content-language" content="vi"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="audience" content="general"/>
        <meta name="resource-type" content="document"/>
        <meta name="abstract" content="Thông tin Bất Động Sản TP HCM"/>
        <meta name="classification" content="Bất động sản TP HCM"/>
        <meta name="area" content="Bất Động Sản"/>
        <meta name="placename" content="Việt Nam"/>
        <meta name="author" content="scodeweb.com"/>
        <meta name="owner" content="bdstphcm.com"/>
        <meta name="distribution" content="Global"/>
        <meta name="revisit-after" content="1 days"/>
        <meta name="robots" content="follow"/>
        <base href="<?= $linkrootbds ?>"/>
        <?php include("module/title.php"); ?>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="alternate" href="<?php echo $linkrootbds ?>" hreflang="vi-vn"/>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico  the root directory -->


        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/normalize.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/fontello.css">
        <link href="<?php echo $linkrootbds ?>/templates/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="<?php echo $linkrootbds ?>/templates/assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="<?php echo $linkrootbds ?>/templates/assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/price-range.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/owl.theme.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/owl.transitions.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo $linkrootbds ?>/templates/assets/css/responsive.css">

        <script src="<?php echo $linkrootbds ?>/templates/assets/js/jquery-1.10.2.min.js"></script>
    </head>
    <body>
<!--        <div id="preloader">-->
<!--            <div id="status">&nbsp;</div>-->
<!--        </div>-->
        <?php include("module/menu_main.php"); ?>

        <?php
        if ($frame == "dangtin") include("module/dangtin.php");
        elseif ($frame == "suatin") include("module/suatin.php");
        elseif ($frame == "dangnhap") include("module/dangnhap.php");
        elseif ($frame == "dangky") include("module/dangky.php");
        else include("module/processFrame.php")
        ?>

        <?php
        if ($frame != "dangky" && $frame != "dangnhap" && $frame != "addbds" && $frame != "editbds" && $frame != "addda" && $frame != "editda" && $frame != "adddn" && $frame != "editdn" && $frame != "changeinfo" && $frame != "changepass" && $frame != "manage")
            include("module/partner.php");
        ?>

        <?php include("module/info_foot.php"); ?>

        <script src="<?php echo $linkrootbds ?>/templates/assets/js/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/bootstrap-select.min.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/bootstrap-hover-dropdown.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/easypiechart.min.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/jquery.easypiechart.min.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/wow.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/icheck.min.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/price-range.js"></script>
        <script src="<?php echo $linkrootbds ?>/templates/assets/js/main.js"></script>
    </body>
</html>