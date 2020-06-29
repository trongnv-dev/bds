<script>
    function checkSubmit(){
        alert('123wqeqwe');
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
                // $('#huyen-index').addClass('selectpicker');
                // $('#huyen-index').attr('data-live-search', 'true');
                // $('#huyen-index').selectpicker('refresh');
            });
        });
        $("#huyen-index").change(function () {
            var id = $(this).val();
            var table = "tbl_phuongxa";
            var tablep = "tbl_quanhuyen";
            $("#phuong-index").load("<?php echo $linkrootbds?>module/getChildSubject.php?table=" + table + "&tablep=" + tablep + "&id=" + id, function() {
                // $('#phuong-index').addClass('selectpicker');
                // $('#phuong-index').attr('data-live-search', 'true');
                // $('#phuong-index').selectpicker('refresh');
            });
        });
        $("#loai-index").change(function () {
            var id = $(this).val();
            var table = "tbl_rv_category";
            var tablep = "tbl_rv_category";
            $("#ddCat-index").load("<?php echo $linkrootbds?>module/getChildSubject.php?table=" + table + "&tablep=" + tablep + "&id=" + id, function() {
                // $('#ddCat-index').addClass('selectpicker');
                // $('#ddCat-index').attr('data-live-search', 'true');
                // $('#ddCat-index').selectpicker('refresh');
            });
        });
    });
</script>
<div class="col-md-3 pl0 padding-top-40">
    <div class="blog-asside-right pl0">
        <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
            <div class="panel-heading">
                <h3 class="panel-title">Tìm Kiếm Nhanh</h3>
            </div>
            <div class="panel-body search-widget">
                <form action="<?php echo $linkrootbds; ?>tim-bds.html" method="POST" class="form-inline">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <select id="tinh-index" class="form-control" name="tinh" data-live-search="true" title="Chọn Thành Phố">
                                    <?php
                                    $cate = get_records("tbl_quanhuyen_category", " ", "sort ASC", " ", " ");
                                    while ($row = mysql_fetch_assoc($cate)) {
                                        ?>
                                        <option value="<?php echo $row['subject']; ?>" <?php if ($_SESSION['kt_thanhpho'] == $row['id']) echo 'selected="selected"'; ?>><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <select id="huyen-index" class="show-tick form-control" name="huyen" title="Chọn Quận / Huyện">
                                    <option value="">Chọn Quận / Huyện</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <select name="phuong" id="phuong-index" class="show-tick form-control" title="Chọn Phường / Xã">
                                    <option value="">Chọn Phường / Xã</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <select name="loai" id="loai-index" class="form-control" title="Chọn Nhu Cầu">
                                    <?php
                                    $cate = get_records("tbl_rv_category", " parent=2 and cate=0", "id DESC", " ", " ");
                                    while ($row_cate = mysql_fetch_assoc($cate)) {
                                        ?>
                                        <option value="<?= $row_cate['subject'] ?>">  <?= $row_cate['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <select id="ddCat-index" class="show-tick form-control" name="ddCat">
                                    <option value="">Chọn hình thức</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <select name="price" id="price-index" class="form-control">
                                    <option value="">Chọn Giá</option>
                                    <option value="nho-hon-500-trieu"> < 500 triệu</option>
                                    <option value="800-trieu-den-1-ti">800 - 1 tỉ</option>
                                    <option value="1-den-3-ti">1-3 tỉ</option>
                                    <option value="4-den-5-ti">4-5 tỉ</option>
                                    <option value="6-den-9-ti">6-9 tỉ</option>
                                    <option value="lon-hon-10-ti"> >10 tỉ</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <select name="dientich" id="dientich-index" class="form-control">
                                    <option value="">Chọn Diện Tích</option>
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
                    </fieldset>

                    <fieldset >
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="submit" name="timbds" value="Tìm" style="width: 100%" class="btn btn-default btn-lg-sheach">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
            <div class="panel-heading">
                <h3 class="panel-title">Dự Án Hot</h3>
            </div>
            <div class="panel-body recent-property-widget">
                <ul>
                    <?php
                    $bds=get_records("tbl_rv_item","status=1 and cate=2 and hot=1","id DESC","0,6"," ");
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
                            </div>
                        </li>
                    <?php }?>

                </ul>
            </div>
        </div>
    </div>
</div>