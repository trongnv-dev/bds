<?php 
 	
$cate=$_GET['cate'];
$tagcontent=$_GET['tagcontent'];
$tag = str_replace("-", " ", $tagcontent);
$aaaa=1;
if($tag=="bat dong san") $tag="";
if($cate=='nha-dat-ban')  {$ghinho=0;}
elseif($cate=='nha-dat-cho-thue'  )  {$ghinho=0;} 
elseif($cate=='tin-tuc') {$ghinho=1;$aaaa=0;}
elseif($cate=='du-an') {$ghinho=2;$aaaa=0;}
elseif($cate=='doanh-nghiep') {$ghinho=3;$aaaa=0;}
elseif($cate=='tat-ca') {$ghinho=0;$aaaa=0;}

if($aaaa==1){
	$parent1=get_field('tbl_rv_category','subject',$cate,'id');
	$parent=getParent("tbl_rv_category",$parent1);
	$ghinho=get_field('tbl_rv_category','subject',$cate,'cate');
	$str_tag="AND parent in ({$parent})";
}

?>
<div class="f_cont clearfix">

    <article class="content">
         
		 <?php
			if($ghinho==0 ) include("module/tag_bds.php");
			elseif($ghinho==1) include("module/tag_new.php");
			elseif($ghinho==2) include("module/tag_da.php");
			elseif($ghinho==3) include("module/tag_doanhnghiep.php");
			elseif($ghinho==4) include("module/tag_tatca.php");
         ?>   
         
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->