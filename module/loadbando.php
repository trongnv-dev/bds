<?php 
 require("../config.php");
	require("../common_start.php");
	include("../lib/func.lib.php");
	
if($_GET['tinh']!=''){
	 $sql = "select file from tbl_quanhuyen_category where file!='' and subject='".$_GET['tinh']."'";

		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			echo $file = $row['file'];
			exit();
		}
}
if($_GET['huyen']!=''){
	$sql = "select file from tbl_quanhuyen where file!='' and subject='".$_GET['huyen']."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			echo $file          = $row['file'];
			exit();
		}
}
if($_GET['phuong']!=''){
	$sql = "select file from tbl_phuongxa where file!='' and subject='".$_GET['phuong']."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			echo $file          = $row['file'];
			exit();
		}
}
if($_GET['duong']!=''){
	$sql = "select file from tbl_street where file!='' and subject='".$_GET['duong']."'";
		if ($result = mysql_query($sql,$conn)) {
			$row=mysql_fetch_array($result);
			echo $file          = $row['file'];
			exit();
		}
}
?>