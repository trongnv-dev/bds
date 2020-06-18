<?php 
include "mail_gmail/class.phpmailer.php"; 
include "mail_gmail/class.smtp.php"; 
	
	if($_POST){
		$txthoten=trim(strip_tags($_POST['txthoten']));
		$txtemail=trim(strip_tags($_POST['txtemail']));
		$txtdienthoai=trim(strip_tags($_POST['txtdienthoai']));				
		$txtDiaChi=trim(strip_tags($_POST['txtDiaChi']));	
		$txtnoidung=trim(strip_tags($_POST['txtnoidung']));	
		$created=date("Y-m-d H:i:s");
		$expire = date("Y-m-d H:i:s", strtotime('-1 hour'));
		$ip=get_client_ip();
		//xu ly ko cho phep gui qua 5 yeu cau trong 1 gio
		$rowtin=countRecord("tbl_kyguinhadat", "ip='".$ip."' AND created>='".$expire."'");
		
		if($rowtin>5){
			echo "<script language='javascript'>alert('Bạn không được phép yêu cầu quá 5 lần trong 1 giờ');</script>";
			
		}else{
		
			$vale1='`id`, `hoten`, `email`, `dienthoai`, `diachi`, `noidung`, `created`, `IP`, `status`';
			$vale2="NULL,'".$txthoten."','".$txtemail."','".$txtdienthoai."','".$txtDiaChi."','".$txtnoidung."','".$created."','".$ip."',1";		 
			 insert_table('tbl_kyguinhadat',$vale1,$vale2,'');
			 
			 $noidung_AltBody.="<p><b>Họ tên:</b>$txthoten</p>";
			 $noidung_AltBody.="<p><b>Email:</b>$txtemail</p>";
			 $noidung_AltBody.="<p><b>Điện thoại:</b>$txtdienthoai</p>";
			 $noidung_AltBody.="<p><b>Địa chỉ:</b>$txtDiaChi</p>";
			 $noidung_AltBody.="<p><b>Nội Dung:</b>$txtnoidung</p>";
			 
			$rowmail=getRecord("tbl_config", "id=1");
			 
			
			$ng_ten="BDSTPHCM";;
			$ng_email=$rowmail['cauhinh_mail_ten'];
			$ch_email=$rowmail['cauhinh_mail_ten'];
			$ch_pass =$rowmail['cauhinh_mail_mk'];
			
			$email=$rowmail['emailkh'];;
			
			$nn_ten="Ký gửi";
			$nn_email=$email;
			
			$tieude="Ký gửi nhà đất - BDSTPHCM.ORG";
			$noidung=$noidung_AltBody;			
			
			
			/*********************************/
			
			if($email!=""){						
				
				$noidung=$noidung_AltBody;					
				$kq=@guimail($ng_ten,$ng_email,$ch_email,$ch_pass,$nn_ten,$nn_email,$tieude,$noidung);
				
			}
				
			echo "<script language='javascript'>alert('Bạn vừa yêu cầu ký gửi thành công. Cảm ơn');</script>";
			echo '<script type="text/javascript"> window.location = ""; </script>';
			 
			//tien hanh gui email, luu lai du lieu
		}
		
	}
?>
<script src="<?php echo $linkroot;?>/lib/kygui/jquery-2.1.0.min.js" type="text/javascript"></script>
<link href="<?php echo $linkroot;?>/lib/kygui/style.css" rel="stylesheet" type="text/css">
<style>
div#page-title .container,.container {
    width: 100%;
}
</style>
<div id="wrapper">
    <div>
         
    <div id="page-content" class="contact-page-v2">
        <section class="intro-section clearfix">
            <div class="intro-image">
            </div>
            <div class="intro-des">
            <span id="lblNoiDung"><h1>
	Ký Gửi Nhà Đất</h1>
<p>
	Với hơn 15 năm kinh nghiệm làm nghề <strong><a href="/" title="ký gửi nhà đất"><span style="color:#ffff00;">ký gửi nhà đất</span></a></strong>, BDSTPHCM đã có hơn 2.375 khách hàng đã và đang sữ dụng dịch vụ ký gửi của chúng tôi và tất cả khách hàng điều hài lòng về phong cách phục vụ cũng như sự hiệu quả của việc ký gửi mang lại.</p>
<p>
	Hiện nay, Công ty chúng tôi có rất nhiều Khách hàng có nhu cầu tìm Mua &amp; Bán : Đất nền, Đất thổ cư, Đất nền dự án, Đất xây dựng nhà xưởng, Nhà kho, Nhà xưởng, Nhà cho thuê, Văn phòng cho thuê, Mặt bằng cho thuê, Nhà cấp 4, Nhà trọ, Nhà nghỉ, Khách sạn, Resort…tại các quận trong TP. Hồ Chí Minh cũng như các khu vực lân cận. Ngoài ra BDSTPHCM còn tư vấn đầu tư, hỗ trợ pháp lý, đo vẽ, thiết kế, xây dựng, hợp thức hóa nhà đất cho khách hàng.</p>
<h3>
	Ký gửi nhà đất Uy Tính-Hiệu Quả!</h3>
<p>
	<b>BDSTPHCM</b> là công ty chuyên nghiệp trong lĩnh vực môi giới bất động sản, chúng tôi làm việc trên tinh thần hợp tác lâu dài và minh bạch giúp Người Bán nhanh chóng bán được bất động sản theo giá mình mong muốn thỏa thuận trực tiếp với Người Mua trên phạm vi Toàn Cầu mà không bị môi giới tự do đẩy giá quá cao dẫn đến khó bán, thậm chí không thể bán được.</p>
<p>
	Nhằm cung ứng một giải pháp hiệu quả cho nhu cầu này, <b>BDSTPHCM</b> đã phát triển dịch vụ <strong><span style="color:#ffff00;">KÝ GỬI NHÀ ĐẤT</span></strong> để giúp người bán nhà, cho thuê bất động sản một cách NHANH CHÓNG và HIỆU QUẢ NHẤT.</p>
<h3>
	BDSTPHCM Cam Kết khi Ký Gửi</h3>
<p>
	Không kê giá bán - Mua bán Chính Chủ - Pháp lý hoàn thiện.</p>
</span>
            </div>
        </section>
    </div>
    <!-- <div id="page-title" class="contact-page-v2">
        <div class="container">
            <div class="row">
            <h2>BẢNG GIÁ KÝ GỬI NHÀ ĐẤT</h2>
            <p>Bảng giá chỉ mang tính chất tham khảo, chúng tôi sẽ gửi báo giá chính xác sau khi xem tình hình thực tế bất động sản ký gửi.</p><br>
            <div class="col-md-12">    
				<div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 1</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>&lt; 1,5 tỷ</span>
                            <span>Phí Môi Giới: 15 Triệu/Giao Dịch</span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 2</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>1,5 - 2 tỷ</span>
                            <span>Phí Môi Giới: 20 Triệu/Giao Dịch</span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 3</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>2 - 3 tỷ</span>
                            <span>Phí Môi Giới: 25 Triệu/Giao Dịch</span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 4</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>3 - 4 tỷ</span>
                            <span>Phí Môi Giới: 30 Triệu/Giao Dịch</span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>    
			</div>		
			<div class="col-md-12">	
                <div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 5</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>4 -5 tỷ</span>
                            <span>Phí Môi Giới: 40 Triệu/Giao Dịch</span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 6</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>5 - 6 tỷ</span>
                            <span>Phí Môi Giới: 50 Triệu/Giao Dịch</span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 7</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>6 - 7 tỷ</span>
                            <span>Phí Môi Giới: 60 Triệu/Giao Dịch</span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="pricing-table">
                        <div class="pricing-heading">
                            <div class="title">
                                <span>KÝ GỬI 8</span>
                            </div>
                            <div class="price">
                                GIÁ TRỊ <span>BẤT ĐỘNG SẢN</span>
                            </div>
                        </div>
                        <div class="pricing-detail">
                            <span>&gt; 7 tỷ</span>
                            <span style="min-height:65px;">Phí Môi Giới: 1%/Giao Dịch                                                    </span>
                            <span>Không bao gồm phí làm thủ tục, giấy tờ.</span>
                            <span><a href="<?php //echo $linkroot;?>/ky-gui-nha-dat.html#page-title2" style="color:yellow;">KÝ GỬI NGAY</a></span>
                        </div>
                    </div>
                </div>
				</div>
            </div>            
        </div>
    </div> -->
    
    <link href="<?php echo $linkroot;?>/lib/kygui/bootstrap.min.v3.3.65152.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $linkroot;?>/lib/kygui/common.v1.2.2.css" rel="stylesheet" type="text/css">
    
    <link href="<?php echo $linkroot;?>/lib/kygui/default.min97e1.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $linkroot;?>/lib/kygui/wpgform1c9b.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $linkroot;?>/lib/kygui/wpglobus.min905d.css" rel="stylesheet" type="text/css">

<div class="container">
<div class="grabh2">
<h2>Tại sao lại chọn dịch vụ ký gửi bất động sản của chúng tôi?</h2>
<p>Dịch vụ <strong><a href="/" title="Ký gửi nhà đất">ky gui nha dat</a></strong> của công ty chúng tôi đem đến giá trị thực cho khách hàng với chính sách hoa hồng thấp, thủ tục chuyển nhượng nhanh chóng và tiện lợi nhất. Chúng tôi làm việc với phương châm "Hiệu quả - An toàn - Uy tín - Chi phí thấp"</p>
</div>																									
<div class="row">
	<div class="col-xs-12 col-md-10 col-md-offset-1">
		<div class="carousel carousel--mobileview carousel-fade slide clearfix" data-ride="carousel" id="carousel--mobileview--how-it-works-grabtaxi">
			<!-- Indicators -->
			<ol class="carousel-indicators steps--4 clearfix">
				<li class="active" data-slide-to="0" data-target="#carousel--mobileview--how-it-works-grabtaxi" data-step="1">
					<h4>Thủ tục ký gửi đơn giản.!</h4>
					<p>Chỉ cần bạn gởi thông tin ký gửi bất động sản cho chúng tôi, Còn lại chúng tôi sẽ lo từ A-Z, bạn chỉ việc chờ khách ký hợp đồng mua bán và nhận tiền.</p>
				</li>
				<li data-slide-to="1" data-target="#carousel--mobileview--how-it-works-grabtaxi" data-step="2" class="">
					<h4>Bảo mật thông tin khách hàng.</h4>
					<p>Trong suốt quá trình ký gửi chúng tôi luôn đảm bảo thông tin khách hàng luôn bảo mật tuyệt đối, không gây ảnh hưởng đến đời tư, công việc của khách hàng.</p>
				</li>
				<li data-slide-to="2" data-target="#carousel--mobileview--how-it-works-grabtaxi" data-step="3" class="">
					<h4>Tiết kiệm chi phí tối đa!</h4>
					<p>Bạn chỉ trả % như thỏa thuận khi ký hợp đồng môi giới mà không mất thêm bất kỳ chi phí nào nữa. bạn không sợ bị kê giá bán, chi phí phát sinh khi làm thủ tục...</p>
				</li>
				<li data-slide-to="3" data-target="#carousel--mobileview--how-it-works-grabtaxi" data-step="4" class="">
					<h4>Hiệu quả ngoài sự mong đợi!</h4>
					<p>"Có khách hàng <b>đồng ý MUA</b> rồi ah!, tôi chỉ mới ký gửi được có 7 ngày?" là câu nói của khách hàng sau khi đã sử dụng dịch vụ ký gửi trong 30 ngày của chúng tôi.</p>
				</li>
				</ol>
			<div class="carousel-description visible-xs">
					<h4>Thủ tục ký gửi đơn giản.!</h4>
					<p>Chỉ cần bạn gởi thông tin ký gửi bất động sản cho chúng tôi, Còn lại chúng tôi sẽ lo từ A-Z, bạn chỉ việc chờ khách ký hợp đồng mua bán và nhận tiền.</p>
				</div>
			<div class="carousel-inner">
			<div class="item active">
				<img src="<?php echo $linkroot;?>/lib/kygui/vat-gia.jpg" alt="Ký gửi nhà đất" title="Ký gửi nhà đất">
			</div>
			<div class="item">
				<img src="<?php echo $linkroot;?>/lib/kygui/cho-tot.jpg" alt="Ký gửi nhà đất" title="Ký gửi nhà đất">
			</div>
			<div class="item">
				<img src="<?php echo $linkroot;?>/lib/kygui/5-giay.jpg" alt="Ký gửi nhà đất" title="Ký gửi nhà đất">
			</div>
			<div class="item">
				<img src="<?php echo $linkroot;?>/lib/kygui/mua-re.jpg" alt="Ký gửi nhà đất" title="Ký gửi nhà đất">
			</div>
			</div>
			<div class="carousel-bg"></div>
		</div>
												
	</div>
</div>																				
</div>
  
    <div id="page-title2" class="contact-page-v2">
    <div class="container">
    <div class="row">
    <div class="grabh2">
    <h2>Hãy liên hệ với chúng tôi ngay hôm nay.!</h2>
    <p style="color:White;">"Để sản phẩm ký gửi của bạn được bán ra nhanh nhất với giá tốt nhất"</p>
    </div>
    <div class="col-md-5">
    <div class="contact-form">
    
    <div class="form-title">
        <h5>CÁC BƯỚC NHẬN KÝ GỬI</h5>
        <div class="form-desctiption">
            <b style="color:#00BA51;">BƯỚC 1:</b> <i style="color:#00BA51;">Tiếp nhận yêu cầu ký gửi bất động sản:</i><br>
            - Điền thông tin liên hệ vào form bên cạnh.<br>
            <i style="color:yellow;">Nội dung gửi bao gồm:</i><br> 
                <i>+ Loại nhà đất, diện tích, giá bán...</i><br> 
                <i>+ Hướng nhà, số tầng, số phòng [khách-ngủ-bếp]...</i><br><br>
            - Cung cấp ảnh chụp thực tế sản phẩm.<br> 
            - Bản photo giấy chứng nhận quyền sử dụng đất.<br>
            - Bản photo các tài sản gắn liền với sản phẩm ký gửi.<br><br>
        
            <b style="color:#00BA51;">BƯỚC 2:</b> <i style="color:#00BA51;">Báo giá dịch vụ &amp; ký hợp đồng môi giới:</i><br>
            - Xử lý &amp; Phân loại sản phẩm ký gửi.<br>
            - Báo giá dịch vụ ký gửi dựa trên giá trị sản phẩm.<br>
            - Ký hợp đồng môi giới dựa trên thỏa thuận hai bên.<br><br>
        
            <b style="color:#00BA51;">BƯỚC 3:</b> <i style="color:#00BA51;">Tìm kiếm &amp; Chốt giá với khách hàng:</i><br>
            - Xây dựng kế hoạch Marketing, tìm kiếm khách hàng.<br>
            - Dẫn khách hàng tới xem trực tiếp sản phẩm ký gửi.<br>
            - Báo giá &amp; tư vấn các thủ tục pháp lý.<br><br>

            <b style="color:#00BA51;">BƯỚC 4:</b> <i style="color:#00BA51;">Bàn giao Giấy tờ nhà &amp; Nhận Hoa Hồng:</i><br>
            - Hộ trợ làm giấy tờ nhà đất cho khách hàng.<br>
            - Nhận Hoa Hồng Môi giới khi giao dịch thành công.
        </div>
    </div>
    
    </div>
    </div>
    <div class="mapgle col-md-7">
    <div class="contents">
		<form id="form-kygui" method="POST" onsubmit="return kiemtra()">
		<script>
			function kiemtra(){
				if(jQuery("#txthoten").val()==''){
					alert('Vui lòng nhập họ tên');
					return false;
				}
				else if(jQuery("#txtemail").val()==''){
					alert('Vui lòng nhập email');
					return false;
				}
				else if(jQuery("#txtdienthoai").val()==''){
					alert('Vui lòng nhập điện thoại');
					return false;
				}
				else if(jQuery("#txtDiaChi").val()==''){
					alert('Vui lòng nhập địa chỉ');
					return false;
				}else if(jQuery("#txtnoidung").val()==''){
					alert('Vui lòng nhập nội dung');
					return false;
				}else{
					return true;
				}
			}
		</script>
        <div class="form-input"><input name="txthoten" type="text" maxlength="50" id="txthoten" placeholder="Họ tên:" controltovalidate="txthoten"></div>
        <div class="form-input"><input name="txtemail" type="text" maxlength="50" id="txtemail" placeholder="Email:"></div>
        <div class="form-input"><input name="txtdienthoai" type="text" maxlength="12" id="txtdienthoai" placeholder="Điện thoại:"></div>
        <div class="form-input"><input name="txtDiaChi" type="text" maxlength="100" id="txtDiaChi" placeholder="Địa chỉ:"></div>
        <div class="form-input"><textarea name="txtnoidung" rows="2" cols="20" id="txtnoidung" placeholder="Nhập thông tin chi tiết bất động sản cần ký gửi:" style="border-color:White;height:270px;width:100%;"></textarea></div>    
        <div class="btn-submit-lp-form">
            <input type="submit" name="Button1" value="ĐĂNG KÝ NGAY" onclick="return kiemtra()" id="Button1" class="buttonDky">
        </div>
		</form>
        <style type="text/css">
            .form-input input
            {
                width: 100%;
                outline: none;
                font-size: 16px;
                font-weight: 500;
                line-height: 40px;
                height: 40px;
                margin-right: 0px;
                background: transparent;
                border: none;
                outline: none;
                margin-bottom: 0px;
                padding: 0px;
            }
            .buttonDky
            {
                color: #fff;
                text-decoration: none;
                font-size: 24px;
                background: #bf0505;
                width: 100%;
                border-radius: 5px;
                line-height: 45px;
                font-weight: bold;
                -webkit-transition: all 0.3s ease-in-out;
                -o-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }
            .buttonDky button:hover
            {
                background-color: #37C1F5;
            }
            .form-input
            {
                background: #fff;
                border-radius: 5px;
                margin-bottom: 10px;
                padding: 0 20px;
            }
        </style>
    </div>
    </div>
    </div>
    </div>
    </div>    

    </div>
    <script src="<?php echo $linkroot;?>/lib/kygui/smoothscroll.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/jquery.backstretch.min.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/markerclusterer.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/markerwithlabel.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/infobox.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/jquery.easing.1.3.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/jquery.timeline.min.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/modal-plugin.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/animatedModal.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/owl.carousel.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/custom-map.js" type="text/javascript" charset="UTF-8"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/main.js" type="text/javascript"></script>

        
    <!-- JavaScript grab -->
    <script src="<?php echo $linkroot;?>/lib/kygui/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/slick.min.js" type="text/javascript"></script>
    <script src="<?php echo $linkroot;?>/lib/kygui/main.js" type="text/javascript"></script>        
</footer>
</div>