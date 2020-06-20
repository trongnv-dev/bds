<div class="content-area recent-property" style="background-color: rgb(252, 252, 252);">
    <div class="">
        <div class="row">
            <div class="col-md-12 properties-page">
                <div class="col-md-12 ">
                    <h4 class="t_prod">
                        <span>
                            Tin mua bán nhà đất VIP
                        </span>
                        <a class="readmore_prod" href="sieu-thi-dia-oc.html"> Xem toàn bộ</a>
                    </h4><!-- End .t_prod -->
                </div>
                <div class="col-md-12 ">
                    <div id="list-type" class="proerty-th">
                        <?php
                        $bds=get_records("tbl_rv_item","status=1 and cate=0 and hot=1","date_up DESC,id DESC","0,28"," ");
                        $i = 1;
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

<div class="content-area recent-property" style="background-color: rgb(252, 252, 252);">
    <div class="">
        <div class="row">
            <div class="col-md-12 properties-page">
                <div class="col-md-12 ">
                    <h4 class="t_prod">
                        <span>
                            Nhà đất mới nhất
                        </span>
                        <a class="readmore_prod" href="<?php echo $linkrootbds?>sieu-thi-dia-oc.html"> Xem toàn bộ</a>
                    </h4><!-- End .t_prod -->
                </div>
                <div class="col-md-12 ">
                    <div id="list-type" class="proerty-th">
                        <?php
                        $bds=get_records("tbl_rv_item","status=1 and cate=0","date_up DESC,id DESC","0,14"," ");
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
                                                <?php echo truncateString($row_bds['name'], 80);?>
                                            </a>
                                        </h5>
                                        <div class="dot-hr"></div>
                                        <span class=""><b> Vị trí :</b> <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?> </span>
                                        <p class="proerty-price"> <b> $ Giá :</b> <?php echo  $row_bds['price'];?> <?php echo value_unit($row_bds['donvi']);?>/<?php echo dientich($row_bds['dientich']);?></p>
                                        <div class="property-icon">
                                            <img src="<?php echo $linkrootbds?>templates/assets/img/icon/room.png">(<?php echo $row_bds['tongdtsudung']; ?> m2)
                                            <img src="<?php echo $linkrootbds?>templates/assets/img/icon/bed.png">(<?php echo $row_bds['sophong']; ?>)
                                            <img src="<?php echo $linkrootbds?>templates/assets/img/icon/cars.png">(<?php echo $row_bds['solau']; ?>)
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

 