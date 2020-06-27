<div class="col-md-3 pl0 padding-top-40">
    <div class="blog-asside-right pl0">
        <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
            <div class="panel-heading">
                <h3 class="panel-title">Tìm Kiếm Nhanh</h3>
            </div>
            <div class="panel-body search-widget">
                <form action="" class=" form-inline">
                    <fieldset>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" class="form-control" placeholder="Key word">
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="row">
                            <div class="col-xs-6">

                                <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Your City">

                                    <option>New york, CA</option>
                                    <option>Paris</option>
                                    <option>Casablanca</option>
                                    <option>Tokyo</option>
                                    <option>Marraekch</option>
                                    <option>kyoto , shibua</option>
                                </select>
                            </div>
                            <div class="col-xs-6">

                                <select id="basic" class="selectpicker show-tick form-control">
                                    <option> -Status- </option>
                                    <option>Rent </option>
                                    <option>Boy</option>
                                    <option>used</option>

                                </select>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset >
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="button btn largesearch-btn" value="Search" type="submit">
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