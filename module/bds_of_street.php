<?php
	$idcity=$duong['parent1'];
	$idstreet=$duong['id'];
	
	$chuoi_d="";
	$tim_duong=get_records("tbl_street","parent1='".$idcity."' and subject='".$duong['subject']."'"," "," "," ");
	while($row_tim_duong=mysql_fetch_assoc($tim_duong)){
		$chuoi_d.=",".$row_tim_duong['id']; 
	}
	$chuoi_d=substr($chuoi_d,1);
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
	else $xapxep="date_up DESC";
	
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	

	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	

    $totalRows = countRecord("tbl_rv_item","status=1  and cate=0  AND idcity='".$idcity."' and idstreet in ('".$idstreet."')"); 
	//echo "status=1   AND parent in ({$parent}) order by $xapxep limit ";
	$bds=get_records("tbl_rv_item","status=1  and cate=0 AND idcity='".$idcity."'  and idstreet in ('".$idstreet."') order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");	
 
?>
<div class="content-area recent-property" style="background-color: rgb(252, 252, 252);">
    <div class="">
        <div class="row">
            <div class="col-md-12 properties-page">
                <div class="col-md-12 ">
                    <div id="list-type" class="proerty-th">
                        <?php
                        while($row_bds=mysql_fetch_assoc($bds)){
                            ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 p0">
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
               echo pagesLinks_new_full_2013($totalRows, $pageSize , $linkroot,"p","page-danh-muc/".$_GET['bds']);
            ?>
        </div>
        <div class="clear"></div>
    </div>

