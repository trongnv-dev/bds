<div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
    <div class="container">
        <div class="row">
            <div class="col-md-12  padding-top-40 properties-page">
                <div class="col-md-12 ">
                    <div class="col-xs-10 page-subheader sorting pl0">
                        <h2><a href="<?php echo $linkrootbds; ?>sieu-thi-dia-oc.html">Tin mua bán nhà đất VIP</a></h2>
                    </div>

                    <div class="col-xs-2 layout-switcher">
                        <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                        <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                    </div><!--/ .layout-switcher-->
                </div>

                <div class="col-md-12 ">
                    <div id="list-type" class="proerty-th">
                        <?php
                        $bds=get_records("tbl_rv_item","status=1 and cate=0 and hot=1","date_up DESC,id DESC","0,12"," ");
                        while($row_bds=mysql_fetch_assoc($bds)){
                        ?>
                        <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3 p0">
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
                                            <?php echo strip_tags($row_bds['name']);?>
                                        </a>
                                    </h5>
                                    <div class="dot-hr"></div>
                                    <p style="color: #000;"><b> <i class="fa fa-map-marker" aria-hidden="true"></i></b> <?=get_field('tbl_quanhuyen','id',$row_bds['idquan'],'name');?>, <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?> </p>
                                    <p class="text-right proerty-price"> <?php echo  number_format($row_bds['price']);?> <?php echo value_unit($row_bds['donvi']);?></p>
                                    <p style="display: none;"><?php echo catchuoi_tuybien($row_bds['description'], 15); ?></p>
                                    <div class="property-icon">
                                        <img title="Diện Tích" src="<?php echo $linkrootbds ?>/templates/assets/img/icon/room.png"><?php echo $row_bds['tongdtsudung']; ?> m2
                                        <img title="Số Phòng" src="<?php echo $linkrootbds ?>/templates/assets/img/icon/bed.png"><?php echo $row_bds['sophong']; ?>
                                        <img title="Số Tầng" src="<?php echo $linkrootbds ?>/templates/assets/img/icon/cars.png"><?php echo $row_bds['solau']; ?>
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

<div class="Welcome-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 Welcome-entry  col-sm-12">
                <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                    <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                <!-- /.feature title -->
                                <h2>HUY DUNG </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                        <div class="row">
                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-home pe-4x"></i>
                                    </div>
                                    <h3>nhiều sự lựa chọn</h3>
                                </div>
                            </div>
                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-users pe-4x"></i>
                                    </div>
                                    <h3>thân thiện khách hàng</h3>
                                </div>
                            </div>


                            <div class="col-xs-12 text-center">
                                <i class="welcome-circle"></i>
                            </div>

                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-notebook pe-4x"></i>
                                    </div>
                                    <h3>dễ dàng sử dụng</h3>
                                </div>
                            </div>
                            <div class="col-xs-6 m-padding">
                                <div class="welcome-estate">
                                    <div class="welcome-icon">
                                        <i class="pe-7s-help2 pe-4x"></i>
                                    </div>
                                    <h3>hỗ trợ nhanh chóng</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
    <div class="container">
        <div class="row">
            <div class="col-md-12  padding-top-40 properties-page">
                <div class="col-md-12 ">
                    <div class="col-xs-10 page-subheader sorting pl0">
                        <h2><a href="<?php echo $linkrootbds; ?>sieu-thi-dia-oc.html">Tin mua bán nhà đất</a></h2>
                    </div>

                    <div class="col-xs-2 layout-switcher">
                        <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                        <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                    </div><!--/ .layout-switcher-->
                </div>

                <div class="col-md-12 ">
                    <div id="list-type" class="proerty-th">
                        <?php
                        $bds=get_records("tbl_rv_item","status=1 and cate=0 and hot!=1","date_up DESC,id DESC","0,16"," ");
                        while($row_bds=mysql_fetch_assoc($bds)){
                            ?>
                            <div class="col-sm-12 col-sm-6 col-md-4 col-lg-3 p0">
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
                                                <?php echo strip_tags($row_bds['name']);?>
                                            </a>
                                        </h5>
                                        <div class="dot-hr"></div>
                                        <p style="color: #000;"><b> <i class="fa fa-map-marker" aria-hidden="true"></i></b> <?=get_field('tbl_quanhuyen','id',$row_bds['idquan'],'name');?>, <?=get_field('tbl_quanhuyen_category','id',$row_bds['idcity'],'name');?> </p>
                                        <p class="text-right proerty-price"> <?php echo  number_format($row_bds['price']);?> <?php echo value_unit($row_bds['donvi']);?></p>
                                        <p style="display: none;"><?php echo catchuoi_tuybien($row_bds['description'], 15); ?></p>
                                        <div class="property-icon">
                                            <img title="Diện Tích" src="<?php echo $linkrootbds ?>/templates/assets/img/icon/room.png"><?php echo $row_bds['tongdtsudung']; ?> m2
                                            <img title="Số Phòng" src="<?php echo $linkrootbds ?>/templates/assets/img/icon/bed.png"><?php echo $row_bds['sophong']; ?>
                                            <img title="Số Tầng" src="<?php echo $linkrootbds ?>/templates/assets/img/icon/cars.png"><?php echo $row_bds['solau']; ?>
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