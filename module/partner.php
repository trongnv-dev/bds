<div class="testimonial-area recent-property" style="background-color: #FCFCFC; padding-bottom: 15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">

                <h2><a href="<?php echo $linkrootbds?>doanh-nghiep.html" title="Nhà môi giới">Nhà môi giới</a></h2>
            </div>
        </div>

        <div class="row">
            <div class="row testimonial">
                <div class="col-md-12">
                    <div id="testimonial-slider">
                        <?php
                        $partner=get_records("tbl_rv_item","status=1 and cate=3 and hot=1","sort DESC","0,8"," ");
                        while($row_partner=mysql_fetch_assoc($partner)){
                            ?>
                            <div class="item">
                                <div class="client-text">
                                    <h4>
                                        <a href="<?php echo $linkrootbds?><?php echo $row_partner['subject'];?>.html" title="<?php echo $row_partner['name'];?>">
                                            <?php echo catchuoi_tuybien($row_partner['name'], 10);?>
                                        </a>
                                    </h4>
                                    <p><?php echo catchuoi_tuybien($row_partner['detail_short'], 30);?></p>
                                </div>
                                <div class="client-face wow fadeInRight" data-wow-delay=".9s">
                                    <?php
                                        if($row_partner['image']){
                                    ?>
<!--                                    <a href="--><?php //echo $linkrootbds?><!----><?php //echo $row_partner['subject'];?><!--.html" title="--><?php //echo $row_partner['name'];?><!--">-->
                                        <img src="<?php echo $linkrootbds?><?php echo $row_partner['image'];?>" alt="<?php echo $row_partner['name'];?>"/>
<!--                                    </a>-->
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="count-area">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                <!-- /.feature title -->
                <h2>Vì sao chọn Huy Dung Store???</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                <div class="row">
                    <div class="col-sm-4 col-xs-6">
                        <div class="count-item">
                            <div class="count-item-circle">
                                <span class="pe-7s-users"></span>
                            </div>
                            <div class="chart">
                                <?php $user=countRecord("tbl_users");?>
                                <h2 class="percent" id="counter" data-percent="<?php echo $user; ?>">0</h2>
                                <h5>khách hàng</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="count-item">
                            <div class="count-item-circle">
                                <span class="pe-7s-home"></span>
                            </div>
                            <div class="chart">
                                <?php $bds=countRecord("tbl_rv_item");?>
                                <h2 class="percent" id="counter1" data-percent="<?php echo $bds; ?>">0</h2>
                                <h5>bất động sản</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <div class="count-item">
                            <div class="count-item-circle">
                                <span class="pe-7s-flag"></span>
                            </div>
                            <div class="chart">
                                <?php $city=countRecord("tbl_quanhuyen_category");?>
                                <h2 class="percent" id="counter2" data-percent="<?php echo $city; ?>">0</h2>
                                <h5>thành phố</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="boy-sale-area">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                <div class="asks-first">
                    <div class="asks-first-circle">
                        <span class="fa fa-search"></span>
                    </div>
                    <div class="asks-first-info">
                        <h2>Bạn muốn đăng tin?</h2>
                        <p>Hãy đăng tin ngay để tìm kiếm khách hàng</p>
                    </div>
                    <div class="asks-first-arrow">
                        <a href="<?php echo $linkrootbds ?>dang-tin.html"><span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                <div  class="asks-first">
                    <div class="asks-first-circle">
                        <span class="fa fa-usd"></span>
                    </div>
                    <div class="asks-first-info">
                        <h2>Bạn muốn ký gửi nhà đất?</h2>
                        <p>Ký gửi bất động sản của bạn cho chúng tôi, chúng tôi sẽ tìm khách hàng cho bạn.</p>
                    </div>
                    <div class="asks-first-arrow">
                        <a href="<?php echo $linkrootbds ?>ky-gui-nha-dat.html"><span class="fa fa-angle-right"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <p  class="asks-call">Cần trợ giúp? Gọi cho chúng tôi : <span class="strong"> 0123.456.789</span></p>
            </div>
        </div>
    </div>
</div>