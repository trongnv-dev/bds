<?php
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
	

     $totalRows = countRecord("tbl_rv_item","status=1 AND cate=5 $chuoit"); 
	$bds=get_records("tbl_rv_item","status=1 $chuoit AND cate=5  order by $xapxep limit ".$startRow.",".$pageSize," "," "," ");

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
                                                <a href="<?php echo $linkrootbds; ?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                                    <?php
                                                    if($row_bds['image']!="") $hinh=$row_bds['image'];else $hinh="imgs/noimage.png";
                                                    ?>
                                                    <img src="<?php echo $hinh;?>" alt="<?php echo $row_bds['name'];?>">
                                                </a>
                                            </div>

                                            <div class="item-entry overflow">
                                                <h5>
                                                    <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                                        <?php echo ucwords(strip_tags($row_bds['name']));?>
                                                    </a>
                                                </h5>
                                                <div class="dot-hr"></div>
                                                <p style="color: #000;padding: 0;"><b> <i class="fa fa-map-marker" aria-hidden="true"></i></b> <?=get_field('tbl_quanhuyen','id',$row_bds['idquan'],'name');?>, <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?> </p>
                                                <p style="display: none;"><?php echo catchuoi_tuybien($row_bds['description'], 15); ?></p>
                                                <div class="property-icon">
                                                    <i title="tổng diện tích" style="margin-right: 5px;" class="fa fa-building" aria-hidden="true"></i><?php echo $row_bds['tongdtsudung']; ?> m2
                                                    <i title="số phòng" style="margin-left: 10px;margin-right: 5px;" class="fa fa-bed" aria-hidden="true"></i><?php echo $row_bds['sophong']; ?>
                                                    <i title="số tầng" style="margin-left: 10px;margin-right: 5px;" class="fa fa-building-o" aria-hidden="true"></i><?php echo $row_bds['solau']; ?>
                                                </div>
                                                <div class="dot-hr"></div>
                                                <p class="text-right proerty-price">
                                                    <span class="label-1">Bán</span>
                                                    <?php echo  number_format($row_bds['price']);?> <?php echo value_unit($row_bds['donvi']);?>
                                                </p>
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
                echo pagesLinks_new_full_2013($totalRows, $pageSize , $linkroot,"p","page-nha-dat-chua-xac-thuc");
                ?>
            </div>
            <div class="clear"></div>
        </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->