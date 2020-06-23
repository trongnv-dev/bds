<?php  
	//ob_start('ob_gzhandler');
    session_start();
	ob_start();


$hostname     = "localhost";

$databasename = "batdongsan";

$username     = "root";

$password     = "";

/*price*/

$priceNL=3000;

$visitorTimeout = 900; //=15 * 60

$ngay = date("Y-m-d H:i:s");
$MAXPAGE = 30;
$multiLanguage = 1;//0 : single  ;  1 : multi
$arrLanguage = array(
	array('vn','Việt Nam'),
	array('en','English')
);
$root_file='';
$linkroot='http://'.$_SERVER['HTTP_HOST'];
$linkroot=$linkroot.$root_file;
/*$linkrootshop=$linkroot."/shop/";*/
$linkrootshop=$linkroot."/";

$linkrootkhuyenmai=$linkroot."/";
//$linkroottintuc=$linkroot."/tintuc/"; 
$linkroottintuc=$linkroot."/"; 
$noimgs="images/noimage.png";

$linkroottintuc=$linkroot."/";
$linkrootraovat=$linkroot."/"; 
$linkrootbds=$linkroot."/"; 
$noimgs="images/noimage.png";


$root="http://bds.test/";
$sub="http://bds.test/";


ini_set('suhosin.session.cryptdocroot', 0);

ini_set('session.cookie_domain', '.'.$_SERVER['HTTP_HOST']);
session_set_cookie_params (0, '/', '.'.$_SERVER['HTTP_HOST']);

?>