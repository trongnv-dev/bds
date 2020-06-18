 
 <nav class="nav_menu">
    <div class="min_wrap">
        
        <ul class="ul_menu">
            <li <?php if($frame=="" || $frame=="home") {?> class="active" <?php }?>>
                <a href="<?php echo $linkrootbds?>" title="Trang chủ">                                  
                    <span class="line_menu_1">
                        <span class="line_menu_2">
                            <img src="<?php echo $linkrootbds?>imgs/layout/home.png" alt="">
                        </span>
                    </span>
                </a>  
            </li>
 
			<?php
            $cate=get_records("tbl_rv_category"," parent=2 and cate=0","sort ASC"," "," ");
            while($row_cate=mysql_fetch_assoc($cate)){
            ?>
            <li <?php if(((get_field('tbl_rv_category','subject',$_GET['bds'],'cate')==0 && ( get_field('tbl_rv_category','subject',$_GET['bds'],'id')==$row_cate['id'] ||  get_field('tbl_rv_category','subject',$_GET['bds'],'parent')==$row_cate['id'])&& get_field('tbl_rv_item','subject',$_GET['bds'],'id')=="" ) ||  (get_field('tbl_rv_item','subject',$_GET['bds'],'cate')==0 && get_field('tbl_rv_category','id',get_field('tbl_rv_item','subject',$_GET['bds'],'parent'),'parent')==$row_cate['id'] ) ) && ($frame!="tinnhadat" && $frame!="duan" && $frame!="doanhnghiep" && $frame!="video"  && $frame!="video_detail"  && $frame!="home" && $frame!="")) {?>class="active" <?php }?>>
                <a href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html" title="<?=$row_cate['name']?>">
                    <span class="line_menu_1">
                        <span class="line_menu_2"> 
                            <?=$row_cate['name']?>
                        </span>
                    </span>
                </a>
                <ul class="menu_child">
                	<?php
					$cate1=get_records("tbl_rv_category"," cate=0 and parent='".$row_cate['id']."'","sort ASC"," "," ");
					while($row_cate1=mysql_fetch_assoc($cate1)){
					?>
                    <li><a href="<?php echo $linkrootbds?><?=$row_cate1['subject']?>.html"> <?=$row_cate1['name'];?></a> </li> 
                    <?php }?>
                     
                </ul>
            </li>
            <?php }?>
            
            <li <?php if($frame=="tinnhadat" || (get_field('tbl_rv_category','subject',$_GET['bds'],'cate')==1 && $_GET['bds']!="" )  ||  (get_field('tbl_rv_item','subject',$_GET['bds'],'cate')==1 && $_GET['bds']!="" )) {?>class="active" <?php }?> >
                <a href="<?php echo $linkrootbds?>tin-tuc-nha-dat.html" title="Tin nhà đất">
                    <span class="line_menu_1">
                        <span class="line_menu_2"> 
                            Tin nhà đất  
                        </span>
                    </span>                          
                </a>
                <ul class="menu_child">
                
                    <?php
					$cate=get_records("tbl_rv_category"," parent=2 and cate=1","sort ASC"," "," ");
					while($row_cate=mysql_fetch_assoc($cate)){
					?>
                    <li><a href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html"> <?=$row_cate['name'];?></a> </li> 
                    <?php }?>
                    
                </ul>
            </li>
            
            
           <!-- <li <?php if($frame=="duan" || (get_field('tbl_rv_category','subject',$_GET['bds'],'cate')==2) ||  (get_field('tbl_rv_item','subject',$_GET['bds'],'cate')==2 && $_GET['bds']!="" ) ) {?>class="active" <?php }?>>
                <a href="<?php echo $linkrootbds?>du-an.html" title="Mua Bán Nhà Đất, Bất Động Sản Cần Thơ, Miền Tây">
                    <span class="line_menu_1">
                        <span class="line_menu_2"> 
                            Nhà đất hot
                        </span>
                    </span>
                </a>
                <ul class="menu_child">
                	<?php
					$cate=get_records("tbl_rv_category"," parent=2 and cate=2","sort ASC"," "," ");
					while($row_cate=mysql_fetch_assoc($cate)){
					?>
                    <li><a href="<?php echo $linkrootbds?><?=$row_cate['subject']?>.html"> <?=$row_cate['name'];?></a> </li> 
                    <?php }?>
                     
                </ul>
            </li> -->
          
            <li <?php if($frame=="video" || $frame=="video_detail"  ) {?>class="active" <?php }?>>
                <a href="<?php echo $linkrootbds?>video.html" title=" Video dự án">
                    <span class="line_menu_1">
                        <span class="line_menu_2"> 
                            Video dự án
                        </span>
                    </span>
                </a>
            </li>
             <li <?php if($frame=="thamdinhgia" ) {?>class="active" <?php }?>>
                <a href="<?php echo $linkrootbds?>tham-dinh-gia.html" title=" Thẩm định giá">
                    <span class="line_menu_1">
                        <span class="line_menu_2"> 
                           Thẩm định giá miễn phí
                        </span>
                    </span>
                </a>
            </li>  
			 <li <?php if($frame=="kyguinhadat" ) {?>class="active" <?php }?>>
                <a href="<?php echo $linkrootbds?>ky-gui-nha-dat.html" title=" Ký Gửi Nhà Đất">
                    <span class="line_menu_1">
                        <span class="line_menu_2"> 
                           Ký Gửi
                        </span>
                    </span>
                </a>
            </li> 
        </ul><!-- End .ul_menu -->
        
        <div class="clear"></div>
        
        <a class="icon_menu_mobile" href="javascript:void(0)" val="0"></a>
        
        <a href="<?php echo $linkrootbds?>dang-tin.html" class="btn_dt"></a>
        <!--<div class="f_btn_dt" style="display: none;">
            <ul>
                <li>
                    <a href="">Đăng tin nhà đất</a>
                </li> 
              
            </ul>
        </div> -->
        
    </div><!-- End .min_wrap -->
</nav><!-- End .nav_menu -->