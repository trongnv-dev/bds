<div class="footer-area">
    <div class=" footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>Về chúng tôi</h4>
                        <div class="footer-title-line"></div>
                        <a href="<?php echo $linkrootbds ?>">
                            <img src="<?php echo $linkrootbds ?>/templates/assets/img/logo.png" alt="Huy Dung Store" style="width: 50%;height: auto;" class="wow pulse" data-wow-delay="1s">
                        </a>
                        <ul class="footer-adress">
                            <li><i class="pe-7s-map-marker strong"> </i> 237/64 Trần Văn Đang, P.11, Q.3 TP.Hồ Chí Minh</li>
                            <li><i class="pe-7s-mail strong"> </i> </li>
                            <li><i class="pe-7s-call strong"> </i> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>Xem thêm</h4>
                        <div class="footer-title-line"></div>
                        <ul class="footer-menu">
                            <?php
                            $cate=get_records("tbl_rv_item","cate=4","id ASC"," "," ");
                            while($row_cate=mysql_fetch_assoc($cate)){
                            ?>
                                <li>
                                    <a href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html"><?=$row_cate['name']?></a>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>Dự Án</h4>
                        <div class="footer-title-line"></div>
                        <ul class="footer-blog">
                            <?php
                            $bds=get_records("tbl_rv_item","status=1 and cate=2 and hot=1","id DESC","0,3"," ");
                            while($row_bds=mysql_fetch_assoc($bds)){
                            ?>
                            <li>
                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                    <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                        <img src="<?php echo $row_bds['image'];?>" alt="<?php echo $row_bds['name'];?>">
                                    </a>
                                </div>
                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                    <h6>
                                        <a href="<?php echo $linkrootbds?><?php echo $row_bds['subject'];?>.html" title="<?php echo $row_bds['name'];?>">
                                            <?php echo $row_bds['name'];?>
                                        </a>
                                    </h6>
                                    <p style="line-height: 17px; padding: 8px 2px;"><?php echo catchuoi_tuybien($row_bds['detail_short'], 8); ?></p>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
<!--                <div class="col-md-3 col-sm-6 wow fadeInRight animated">-->
<!--                    <div class="single-footer news-letter">-->
<!--                        <h4>Stay in touch</h4>-->
<!--                        <div class="footer-title-line"></div>-->
<!--                        <p>Lorem ipsum dolor sit amet, nulla  suscipit similique quisquam molestias. Vel unde, blanditiis.</p>-->
<!---->
<!--                        <form>-->
<!--                            <div class="input-group">-->
<!--                                <input class="form-control" type="text" placeholder="E-mail ... ">-->
<!--                                <span class="input-group-btn">-->
<!--                                            <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>-->
<!--                                        </span>-->
<!--                            </div>-->
<!--                        </form>-->
<!---->
<!--                        <div class="social pull-right">-->
<!--                            <ul>-->
<!--                                <li><a class="wow fadeInUp animated" href="https://twitter.com/kimarotec"><i class="fa fa-twitter"></i></a></li>-->
<!--                                <li><a class="wow fadeInUp animated" href="https://www.facebook.com/kimarotec" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>-->
<!--                                <li><a class="wow fadeInUp animated" href="https://plus.google.com/kimarotec" data-wow-delay="0.3s"><i class="fa fa-google-plus"></i></a></li>-->
<!--                                <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>-->
<!--                                <li><a class="wow fadeInUp animated" href="https://instagram.com/kimarotec" data-wow-delay="0.6s"><i class="fa fa-dribbble"></i></a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>

    <div class="footer-copy text-center">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <span> (C) <a href="<?php echo $linkrootbds; ?>">Huy Dung Store</a> , All rights reserved 2020  </span>
                </div>
            </div>
        </div>
    </div>
</div>