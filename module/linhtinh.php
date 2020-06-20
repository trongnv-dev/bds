<?php 
 
	$pageSize = 30;
	$totalRows = 0;
	$xeptheo='id';
	$dem=1;
	
 
	settype($pageSize,"int");

	settype($totalRows,"int");
	settype($dem,"int");
	
 
	if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
	if ($pageNum<=0) $pageNum=1;
	$startRow = ($pageNum-1) * $pageSize;
	
	if($dem_para==8 && $_GET['tukhoa']>=0 ) {
		$pageNum = $_GET['tukhoa'];
		if ($pageNum<=0) $pageNum=1;
		$startRow = ($pageNum-1) * $pageSize;
	}
 
	// 8 parameter full - htacess only 9 parameter
	$totalRows = countRecord("tbl_rv_item","status=1 AND cate=0 $str_city $str_tinh $str_huyen $str_duong $str_parent $srt_dientich $srt_gia "); 
   // echo "status=1 AND cate=0 $str_city $str_tinh $str_huyen $str_duong $str_parent $srt_dientich $srt_gia order by id DESC limit ".$startRow.",".$pageSize;
	$bds=get_records("tbl_rv_item","status=1 AND cate=0 $str_city $str_tinh $str_huyen $str_duong $str_parent $srt_dientich $srt_gia order by date_up DESC,id DESC limit ".$startRow.",".$pageSize," "," "," ");	 


	if($totalRows=="") $totalRows=0;
?>
<div class="breacrum"> 
    <ul  itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" >
        <li>
            <a itemprop="url" href="<?php echo $linkrootbds?>" title="Trang chủ"><span  itemprop="title" > Trang chủ</span></a>
        </li>
        <?php echo $breadcum;?>
    </ul>
</div>

<div class="f_cont clearfix">

    <article class="content">
    
        <div class="info_search">
            <h2 class="t_is">
               Tìm được <?=$totalRows;?> kết quả bất động sản
            </h2><!-- End .t_is -->
            <div class="m_is">
                <ul>
                	<?php if($dientich!=""){?>
                    <li>
                        Diện tích: <b><?=$dientich?></b>
                    </li> 
                    <?php }?>
                    <?php if($gia!=""){?>
                    <li>
                        Giá: <b><?=$gia?></b>
                    </li> 
                    <?php }?>
                    <li>
                        Tin kiểm duyệt: <b><?=$totalRows;?></b>
                    </li> 
                </ul>
            </div><!-- End .m_is -->
        </div>


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
					echo pagesLinks_new_full($totalRows, $pageSize ,$linkroot,"p","page-nha-dat".$chuoi);
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        
        
        
    </article><!-- End .content -->
    
   <?php include("module/slidebar.php") ;?>
    
</div><!-- End .f_cont -->