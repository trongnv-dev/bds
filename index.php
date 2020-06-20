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
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="audience" content="general" /><meta name="resource-type" content="document" /><meta name="abstract" content="Thông tin Bất Động Sản TP HCM" /><meta name="classification" content="Bất động sản TP HCM" /><meta name="area" content="Bất Động Sản" /><meta name="placename" content="Việt Nam" /><meta name="author" content="scodeweb.com" /><meta name="owner" content="bdstphcm.com" /><meta name="distribution" content="Global" /><meta name="revisit-after" content="1 days" /><meta name="robots" content="follow" />
<base href="<?=$linkrootbds?>"  />
<?php include("module/title.php") ;?>

<link rel="alternate" href="<?php echo $linkrootbds?>" hreflang="vi-vn" />
<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/css-queries.css">
<link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/cssAdd.css">
<link rel="shortcut icon" href="http://bdstphcm.com/imgs/favicon.ico" />
<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery-1.10.0.min.js"></script>-->
<script src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyBe9CAbTzqesOjcL3bik6FqoMzm3cPftQY'></script>
<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/map/js/jquery-1.7.1/jquery.min.js"></script>
<!--<script src="--><?php //echo $linkrootbds?><!--templates/assets/js/jquery-1.10.2.min.js"></script>-->

<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery-ui.js"></script>-->
<link href="<?php echo $linkrootbds?>lib/select2/select2.css" rel="stylesheet"/>
<script src="<?php echo $linkrootbds?>lib/select2/select2.js"></script>

 <script type="text/javascript" src="<?php echo $linkrootbds?>lib/jquery-ui.min.js"></script> 

<!-- bxSlider Javascript file -->
<script src="bxslider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="bxslider/jquery.bxslider.css" rel="stylesheet" />

<!--[if lt IE 9]>
	<script type="text/javascript" src="<?php echo $linkrootbds?>scripts/selectivizr-min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/respond.min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/html5.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>templates/FIX_IE.css" />    
<![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
<!--    <link rel="stylesheet" href="--><?php //echo $linkrootbds?><!--templates/assets/css/normalize.css">-->
    <link rel="stylesheet" href="<?php echo $linkrootbds?>templates/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $linkrootbds?>templates/assets/css/fontello.css">
    <link href="<?php echo $linkrootbds?>templates/assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="<?php echo $linkrootbds?>templates/assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
    <link href="<?php echo $linkrootbds?>templates/assets/css/animate.css" rel="stylesheet" media="screen">
<!--    <link rel="stylesheet" href="--><?php //echo $linkrootbds?><!--templates/assets/css/bootstrap-select.min.css">-->
    <link rel="stylesheet" href="<?php echo $linkrootbds?>templates/bootstrap/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="--><?php //echo $linkrootbds?><!--templates/assets/css/icheck.min_all.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo $linkrootbds?><!--templates/assets/css/price-range.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo $linkrootbds?><!--templates/assets/css/owl.carousel.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo $linkrootbds?><!--templates/assets/css/owl.theme.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo $linkrootbds?><!--templates/assets/css/owl.transitions.css">-->
    <link rel="stylesheet" href="<?php echo $linkrootbds?>templates/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $linkrootbds?>templates/assets/css/responsive.css">
</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage">

	<div id="wrapper">
        <header id="header">
            <?php include("module/banner.php") ;?>
            
            <?php include("module/menu_main.php") ;?>
            
        </header><!-- End #header -->
        
        <div id="container">
        	<div class="min_wrap">
            	
                <?php 
					if($frame=="dangtin") include("module/dangtin.php") ;
					elseif($frame=="dangtin") include("module/suatin.php") ; 
					elseif($frame=="dangnhap") include("module/dangnhap.php") ;
					elseif($frame=="dangky") include("module/dangky.php") ;
					else include("module/processFrame.php")
				?> 
            
            </div><!-- End .min_wrap -->
        </div><!-- End #container -->
        
        <footer id="footer">
        	<div class="min_wrap">
            
            	<?php if($frame!="dangky" &&  $frame!="dangnhap" &&  $frame!="addbds" &&  $frame!="editbds" &&  $frame!="addda" &&  $frame!="editda" &&  $frame!="adddn" &&  $frame!="editdn" &&  $frame!="changeinfo" &&  $frame!="changepass" &&  $frame!="manage") include("module/partner.php") ;?> 
            
            	<?php include("module/menu_foot.php") ;?> 
                
                <?php include("module/info_foot.php") ;?> 
            
            </div><!-- End .min_wrap -->
        </footer><!-- End #footer -->
        <div id="search-any">
            <?php include("module/filter_anywhere.php") ;?>
            <img id="show-quick-search" src="/templates/images/System_search_icon.png" alt="tìm kiếm nhanh" style="width: 70px;height: 70px;cursor: pointer" title="tìm kiếm nhanh">
        </div>
    </div><!-- End #wrapper -->
    
    <?php include("module/menu_mobile.php") ;?> 
    
    <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>scripts/swiper/idangerous.swiper.css">
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/swiper/idangerous.swiper.min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/jquery.customSelect-master/jquery.customSelect.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="scripts/royalslider/assets/royalslider/royalslider.css">
    <link rel="stylesheet" type="text/css" href="scripts/royalslider/assets/royalslider/skins/minimal-white/rs-minimal-white.css">
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/royalslider/assets/royalslider/jquery.royalslider.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>scripts/custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo $linkrootbds?>scripts/frame_script.js"></script>

    <script src="<?php echo $linkrootbds?>templates/bootstrap/js/bootstrap.min.js"></script>
    <script>
        $('#show-quick-search').click(function () {
            $('#quick-search').toggle();
        });
    </script>
</body>
</html>