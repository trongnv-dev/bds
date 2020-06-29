<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="<?php echo $linkrootbds ?>/templates/assets/img/slide1/slider-image-2.jpg" alt="The Last of us"></div>
            <div class="item"><img src="<?php echo $linkrootbds ?>/templates/assets/img/slide1/slider-image-1.jpg" alt="GTA V"></div>

        </div>
    </div>
    <div class="container slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                <h2>property Searching Just Got So Easy</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>
            </div>
        </div>
    </div>
</div>

<!--search index-->
<div class="home-lager-shearch" style="background-color: rgb(252, 252, 252); padding-top: 25px; margin-top: -125px;">
    <div class="container">
        <div class="col-md-12 large-search">
            <div class="search-form wow pulse">
                <form action="<?php echo $linkrootbds; ?>xu-ly.html" method="POST" class="form-inline">
                    <div class="col-md-12">
                        <h3>Tìm Kiếm Tin</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-7">
                            <input name="tagcontent" class="form-control" type="text" placeholder="Nhập từ khóa tìm kiếm..."/>
                        </div>
                        <div class="col-md-3">
                            <select id="basic" class="select22 selectpicker show-tick form-control" name="cate">
                                <?php
                                $cate = get_records("tbl_rv_category", " parent=2 and cate=0", "sort ASC", " ", " ");
                                while ($row = mysql_fetch_assoc($cate)) {
                                    ?>
                                    <option value="<?php echo $row['subject']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>

                                <option value="tin-tuc"> Tin tức</option>
                                <option value="du-an">  Dự án</option>
                                <option value="doanh-nghiep">  Doanh nghiệp</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input type="submit" value="Tìm tin" class="btn btn-default">
                        </div>
                    </div>
                </form>

                <form action="<?php echo $linkrootbds; ?>tim-bds.html" method="POST" class="form-inline" onsubmit="return checkSubmit(event)">
                    <div class="col-md-12">
                        <h3>Tìm Kiếm Bất Động Sản</h3>
                    </div>
                    <script>
                        function checkSubmit(){
                            if($("#tinh-index").val() === ''){
                                if($("#loai-index").val() === ''){
                                    if($("#price-index").val() === '' && $("#dientich-index").val() === ''){
                                        return false;
                                    }
                                }
                            }
                        }
                        $(document).ready(function () {
                            $("#tinh-index").change(function () {
                                var id = $(this).val();
                                var table = "tbl_quanhuyen";
                                var tablep = "tbl_quanhuyen_category";
                                $("#huyen-index").load("<?php echo $linkrootbds?>module/getChildSubject.php?table=" + table + "&tablep=" + tablep + "&id=" + id, function() {
                                    $('#huyen-index').addClass('selectpicker');
                                    $('#huyen-index').attr('data-live-search', 'true');
                                    $('#huyen-index').selectpicker('refresh');
                                });
                            });
                            $("#huyen-index").change(function () {
                                var id = $(this).val();
                                var table = "tbl_phuongxa";
                                var tablep = "tbl_quanhuyen";
                                $("#phuong-index").load("<?php echo $linkrootbds?>module/getChildSubject.php?table=" + table + "&tablep=" + tablep + "&id=" + id, function() {
                                    $('#phuong-index').addClass('selectpicker');
                                    $('#phuong-index').attr('data-live-search', 'true');
                                    $('#phuong-index').selectpicker('refresh');
                                });
                            });
                            $("#loai-index").change(function () {
                                var id = $(this).val();
                                var table = "tbl_rv_category";
                                var tablep = "tbl_rv_category";
                                $("#ddCat-index").load("<?php echo $linkrootbds?>module/getChildSubject.php?table=" + table + "&tablep=" + tablep + "&id=" + id, function() {
                                    $('#ddCat-index').addClass('selectpicker');
                                    $('#ddCat-index').attr('data-live-search', 'true');
                                    $('#ddCat-index').selectpicker('refresh');
                                });
                            });
                        });
                    </script>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <select id="tinh-index" class="selectpicker show-tick form-control" name="tinh" data-live-search="true" title="Chọn Thành Phố">
                                <?php
                                $cate = get_records("tbl_quanhuyen_category", " ", "sort ASC", " ", " ");
                                while ($row = mysql_fetch_assoc($cate)) {
                                    ?>
                                    <option value="<?php echo $row['subject']; ?>" <?php if ($_SESSION['kt_thanhpho'] == $row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select id="huyen-index" class="show-tick form-control" name="huyen" title="Chọn Quận / Huyện">
                                <option value="">Chọn Quận / Huyện</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select name="phuong" id="phuong-index" class="show-tick form-control" title="Chọn Phường / Xã">
                                <option value="">Chọn Phường / Xã</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-top: 15px;">
                        <div class="col-md-3">
                            <select name="loai" id="loai-index" class="selectpicker show-tick form-control" title="Chọn Nhu Cầu">
                                <?php
                                $cate = get_records("tbl_rv_category", " parent=2 and cate=0", "id DESC", " ", " ");
                                while ($row_cate = mysql_fetch_assoc($cate)) {
                                    ?>
                                    <option value="<?= $row_cate['subject'] ?>">  <?= $row_cate['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select id="ddCat-index" class="show-tick form-control" name="ddCat">
                                <option value="">Chọn hình thức</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="price" id="price-index" class="selectpicker show-tick form-control" title="Chọn Giá">
                                <option value="nho-hon-500-trieu"> < 500 triệu</option>
                                <option value="800-trieu-den-1-ti">800 - 1 tỉ</option>
                                <option value="1-den-3-ti">1-3 tỉ</option>
                                <option value="4-den-5-ti">4-5 tỉ</option>
                                <option value="6-den-9-ti">6-9 tỉ</option>
                                <option value="lon-hon-10-ti"> >10 tỉ</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <select name="dientich" id="dientich-index" class="selectpicker show-tick form-control" title="Chọn Diện Tích">
                                <option value="nho-hon-30-m2"> < 30 m2</option>
                                <option value="30-50-m2"> 30 - 50 m2</option>
                                <option value="50-80-m2"> 50 - 80 m2</option>
                                <option value="80-100-m2"> 80 - 100 m2</option>
                                <option value="100-150-m2"> 100 - 150 m2</option>
                                <option value="150-200-m2"> 150 - 200 m2</option>
                                <option value="200-250-m2"> 200 - 250 m2</option>
                                <option value="250-300-m2"> 250 - 300 m2</option>
                                <option value="lon-hon-300m2"> > 300 m2</option>
                            </select>
                        </div>

                    </div>
                    <div class="center">
                        <input type="hidden" name="guitin" value="guitin"/>
                        <input type="submit" name="timbds" value=" " class="btn btn-default btn-lg-sheach">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
