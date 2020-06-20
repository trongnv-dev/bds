<?php
$cate=$_GET['nhucau'];
$parent1=get_field('tbl_rv_category','subject',$cate,'id');
$parent=getParent("tbl_rv_category",$parent1);
?>
<div class="breacrum">
     <div id="breacrum">
         <span typeof="v:Breadcrumb">
            <a  href="<?php echo $linkrootbds?>" rel="v:url" property="v:title"  title="Trang chủ"> Trang chủ </a>
        </span>
        <span typeof="v:Breadcrumb">&raquo;
            <a  rel="v:url" property="v:title"  title="<?=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');?>" href="<?php echo $linkrootbds?><?=$_GET['quan'];?>.html"> <?=get_field('tbl_quanhuyen_category','subject',$_GET['quan'],'name');?> </a>
        </span>
         <span typeof="v:Breadcrumb">&raquo;
            <a rel="v:url" property="v:title"  href="<?php echo $linkrootbds?><?=$_GET['quan'];?>/<?=$_GET['huyen'];?>.html" title="<?=get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name');?>"> <?=get_field('tbl_quanhuyen','subject',$_GET['huyen'],'name');?>  </a> 
        </span>
        <span typeof="v:Breadcrumb">&raquo;
        	<a rel="v:url" property="v:title"  href="<?php echo $linkrootbds?><?=$_GET['quan'];?>/<?=$_GET['huyen'];?>/<?=$_GET['phuong']?>.html" title="<?=get_field('tbl_phuongxa','subject',$_GET['phuong'],'name');?>">
        		<?=get_field('tbl_phuongxa','subject',$_GET['phuong'],'name');?>
            </a>
        </span>
         <span typeof="v:Breadcrumb">&raquo;
         	 <?=$catebds;?>
         </span>
    </div>
</div>
 
<?php 
 
 	$quan=$_GET['quan'];
	
	$row_quan    = getRecord('tbl_quanhuyen_category', "subject='".$quan."'");
	
	$huyen=$_GET['huyen'];
	
	if($huyen!="khac") {
		$row_huyen    = getRecord('tbl_quanhuyen', "subject='".$huyen."'");
		$str_h=" and idquan='".$row_huyen['id']."'";
	}
	
	$pageSize = 30;
	$totalRows = 0;
	$xeptheo='id';
	$dem=1;
	
	$kkk="1";
	if(isset($_SESSION['filter1'])) {
		$xapxep=$_SESSION['filter1'];
		if($xapxep==" id DESC") $kkk="1";
		elseif($xapxep==" price ASC") $kkk="2";
		elseif($xapxep==" price DESC") $kkk="3";
	}
	else $xapxep="date_up DESC,id DESC";
	
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	

    $totalRows = countRecord("tbl_rv_item","status=1 and cate=0  AND parent in ({$parent}) and cate=0 and idcity='".$row_quan['id']."'  $str_h "); 
	  //echo "status=1 and  AND parent in ({$parent}) and cate=0 and idcity='".$row_quan['id']."'  $str_h order by $xapxep limit ".$startRow.",".$pageSize;
	$bds=get_records("tbl_rv_item","status=1 and cate=0 and  parent in ({$parent}) and cate=0 and idcity='".$row_quan['id']."'  $str_h order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	

?>
<div class="f_cont clearfix">

    <article class="content">
        <div class="content-area recent-property" style="background-color: rgb(252, 252, 252);">
            <div class="">
                <div class="row">
                    <div class="col-md-12 properties-page">
                        <div class="col-md-12 ">
                            <div id="list-type" class="proerty-th">
                                <?php
                                while($row_bds=mysql_fetch_assoc($bds)){
                                    ?>
                                    <div class="col-sm-6 col-md-3 p0">
                                        <div class="box-two proerty-item">
                                            <div class="item-thumb">
                                                <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                                    <?php
                                                    if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";
                                                    $hinh=$linkrootbds."imagecache/image.php/".$hinh."?width=100&amp;height=100&amp;cropratio=1:1&amp;image=".$linkrootbds.$hinh;
                                                    ?>
                                                    <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
                                                </a>
                                            </div>

                                            <div class="item-entry overflow">
                                                <h5>
                                                    <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                                        <?php echo catchuoi_tuybien(strip_tags($row_bds['name']),10);?>
                                                    </a>
                                                </h5>
                                                <div class="dot-hr"></div>
                                                <span class=""><b> Vị trí :</b> <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?> </span>
                                                <p class="proerty-price"> <b> $ Giá :</b> <?php echo  $row_bds['price'];?> <?php echo value_unit($row_bds['donvi']);?>/<?php echo dientich($row_bds['dientich']);?></p>
                                                <div class="property-icon">
                                                    <img src="<?php echo $linkrootbds?>templates/assets/img/icon/room.png"><?php echo $row_bds['tongdtsudung']; ?> m2
                                                    <br>
                                                    <img src="<?php echo $linkrootbds?>templates/assets/img/icon/bed.png"> Số phòng: <?php echo $row_bds['sophong']; ?>
                                                    <br>
                                                    <img src="<?php echo $linkrootbds?>templates/assets/img/icon/cars.png"><?php echo $row_bds['solau']; ?> tầng
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page">
            <div class="PageNum">
                <?php  
                echo pagesLinks_new_full_2013($totalRows, $pageSize ,$linkroot,"p","page-tim-2/".$_GET['quan']."/".$_GET['huyen']."/".$_GET['phuong']."/".$_GET['nhucau']);
                ?>
            </div>
            <div class="clear"></div>
        </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->