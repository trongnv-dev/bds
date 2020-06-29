<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $linkrootbds ?>"><img src="<?php echo $linkrootbds ?>/templates/assets/img/logo.png" alt="Huy Dung Store" style="width: 15%;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse yamm" id="navigation">
            <div class="button navbar-right">
                <?php if ($_SESSION['kh_login_username'] == "") { ?>
                <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.open('<?php echo $linkrootbds ?>dang-nhap.html')" data-wow-delay="0.4s">Đăng Nhập</button>
                <?php } ?>
                <button class="navbar-btn nav-button wow fadeInRight" onclick=" window.open('<?php echo $linkrootbds ?>dang-tin.html')" data-wow-delay="0.5s">Đăng Tin</button>
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
<!--                <li class="wow fadeInDown" data-wow-delay="0.1s">-->
<!--                    <a class="--><?php //if ($frame == "" || $frame == "home") { echo "active"; } ?><!--" href="--><?php //echo $linkrootbds ?><!--" title="Trang chủ" style="padding: 0;">-->
<!--                        <img src="--><?php //echo $linkrootbds ?><!--imgs/layout/home.png" alt="Trang chủ" style="width: 50px">-->
<!--                    </a>-->
<!--                </li>-->

                <?php
                $cate = get_records("tbl_rv_category", " parent=2 and cate=0", "sort ASC", " ", " ");
                while ($row_cate = mysql_fetch_assoc($cate)) {
                    ?>
                    <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                        <a href="<?php echo $linkrootbds ?><?= $row_cate['subject'] ?>.html" class="dropdown-toggle <?php if (((get_field('tbl_rv_category', 'subject', $_GET['bds'], 'cate') == 0 && (get_field('tbl_rv_category', 'subject', $_GET['bds'], 'id') == $row_cate['id'] || get_field('tbl_rv_category', 'subject', $_GET['bds'], 'parent') == $row_cate['id']) && get_field('tbl_rv_item', 'subject', $_GET['bds'], 'id') == "") || (get_field('tbl_rv_item', 'subject', $_GET['bds'], 'cate') == 0 && get_field('tbl_rv_category', 'id', get_field('tbl_rv_item', 'subject', $_GET['bds'], 'parent'), 'parent') == $row_cate['id'])) && ($frame != "tinnhadat" && $frame != "duan" && $frame != "doanhnghiep" && $frame != "video" && $frame != "video_detail" && $frame != "home" && $frame != "")) { echo "active"; } ?>"
                           data-toggle="dropdown" data-hover="dropdown" data-delay="200" title="<?= $row_cate['name'] ?>"><?= $row_cate['name'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu navbar-nav">
                            <?php
                            $cate1 = get_records("tbl_rv_category", " cate=0 and parent='" . $row_cate['id'] . "'", "sort ASC", " ", " ");
                            while ($row_cate1 = mysql_fetch_assoc($cate1)) {
                                ?>
                                <li>
                                    <a href="<?php echo $linkrootbds ?><?= $row_cate1['subject'] ?>.html"> <?= $row_cate1['name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>

                <!-- Tin nhà đất-->
                <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                    <a class="dropdown-toggle <?php if ($frame == "tinnhadat" || (get_field('tbl_rv_category', 'subject', $_GET['bds'], 'cate') == 1 && $_GET['bds'] != "") || (get_field('tbl_rv_item', 'subject', $_GET['bds'], 'cate') == 1 && $_GET['bds'] != "")) { echo "active"; } ?>"
                       href="<?php echo $linkrootbds ?>tin-tuc-nha-dat.html"
                       data-toggle="dropdown" data-hover="dropdown" data-delay="200" title="Tin nhà đất">Tin nhà đất
                    </a>
                    <ul class="dropdown-menu navbar-nav">
                        <?php
                        $cate = get_records("tbl_rv_category", " parent=2 and cate=1", "sort ASC", " ", " ");
                        while ($row_cate = mysql_fetch_assoc($cate)) {
                            ?>
                            <li>
                                <a href="<?php echo $linkrootbds ?><?= $row_cate['subject'] ?>.html"> <?= $row_cate['name']; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <!-- Video dự án-->
<!--                <li class="wow fadeInDown" data-wow-delay="0.4s"><a class="--><?php //if ($frame == "video" || $frame == "video_detail") { echo "active"; } ?><!--" href="--><?php //echo $linkrootbds ?><!--video.html" title="Video dự án">Video dự án</a></li>-->
                <!-- Thẩm định giá miễn phí-->
                <li class="wow fadeInDown" data-wow-delay="0.4s"><a class="<?php if ($frame == "thamdinhgia") { echo "active"; } ?>" href="<?php echo $linkrootbds ?>tham-dinh-gia.html" title="Thẩm định giá">Thẩm định giá</a></li>
                <!-- Ký Gửi-->
                <li class="wow fadeInDown" data-wow-delay="0.4s"><a class="<?php if ($frame == "kyguinhadat") { echo "active"; } ?>" href="<?php echo $linkrootbds ?>ky-gui-nha-dat.html" title="Ký Gửi Nhà Đất">Ký Gửi</a></li>

                <?php if ($_SESSION['kh_login_username'] != "") { ?>

                    <li class="dropdown ymm-sw " data-wow-delay="0.1s">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200" title="Tin nhà đất">
                            Chào: <?php echo $_SESSION['kh_login_username']; ?>
                        </a>
                        <ul class="dropdown-menu navbar-nav">
                            <li>
                                <a href="<?php echo $linkrootbds ?>quan-ly-tin-dang.html">Quản lý tin</a>
                            </li>
                            <li>
                                <a href="<?php echo $linkrootbds ?>sua-thong-tin.html">Thông tin cá nhân</a>
                            </li>
                            <li>
                                <a href="<?php echo $linkrootbds ?>doi-mat-khau.html">Đổi mật khẩu</a>
                            </li>
                            <li>
                                <a href="<?php echo $linkrootbds ?>thoat.html">Thoát</a>
                            </li>
                        </ul>
                    </li>
                <?php }  ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>