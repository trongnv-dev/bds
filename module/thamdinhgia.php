<?php 

include "mail_gmail/class.phpmailer.php"; 
include "mail_gmail/class.smtp.php"; 
	
	if($_POST){
		$address_td=trim(strip_tags($_POST['address-td']));
		$province="Hồ Chí Minh";
		$district=trim(strip_tags($_POST['district']));
		$street=trim(strip_tags($_POST['street']));				
		$chieurongngo=trim(strip_tags($_POST['chieurongngo']));		
		
		$kcduong_select=trim(strip_tags($_POST['kcduong_select']));	
		$_name_vitri="Mặt đường";
		if($kcduong_select==1){
			//mat duong
			$vitrinhadat="Vị trí 1";
		}else{
			$_name_vitri="Trong ngõ";
			//trong ngo
			$vitrinhadat=trim(strip_tags($_POST['kcduong']));		 /*Khoảng cách từ tài sản đến ngõ có tên đường ( m) **/
		}
			
		$mattien=trim(strip_tags($_POST['mattien']));
		$dientich=trim(strip_tags($_POST['dientich']));
		$dientich_ph=trim(strip_tags($_POST['dientich-ph']));
		$dientich_vp=trim(strip_tags($_POST['dientich-vp']));		
		$hinhdang=trim(strip_tags($_POST['hinhdang']));
		$vitri=trim(strip_tags($_POST['vitri']));
		$giaothong=trim(strip_tags($_POST['giaothong']));
		$kinhdoanh=trim(strip_tags($_POST['kinhdoanh']));
		$giaitoa=trim(strip_tags($_POST['giaitoa']));
		$sdchung=trim(strip_tags($_POST['sdchung']));
		$moitruong=trim(strip_tags($_POST['moitruong']));
		$phongthuy=trim(strip_tags($_POST['phongthuy']));
		$huong=trim(strip_tags($_POST['huong']));
		$tienichkhac=trim(strip_tags($_POST['tienichkhac']));
		$mucdichsd=trim(strip_tags($_POST['mucdichsd']));
		$yeutokhac=trim(strip_tags($_POST['yeutokhac']));
		$thoihansd=trim(strip_tags($_POST['thoihansd']));
		$note_other=trim(strip_tags($_POST['note-other']));
		
		$sonam=trim(strip_tags($_POST['sonam']));
		$dientichxd=trim(strip_tags($_POST['dientichxd']));
		$sotangxd=trim(strip_tags($_POST['sotangxd']));
		$dientichsanxd=trim(strip_tags($_POST['dientichsanxd']));
		$ketcaunha=trim(strip_tags($_POST['ketcaunha']));
		$dgiactxd=trim(strip_tags($_POST['dgiactxd']));
		$chatluongconctxd=trim(strip_tags($_POST['chatluongconctxd']));
		$hoten=trim(strip_tags($_POST['hoten']));
		$email=trim(strip_tags($_POST['email']));
		$dienthoai=trim(strip_tags($_POST['dienthoai']));
		$mucdich=array();
		foreach($_POST['mucdich'] as $_md){
			$mucdich[]=$_md;
		}
		$mucdich=implode(",",$mucdich);
		$created=date("Y-m-d H:i:s");
		$expire = date("Y-m-d H:i:s", strtotime('-1 hour'));
		$ip=get_client_ip();
		//xu ly ko cho phep gui qua 5 yeu cau trong 1 gio
		$rowtin=countRecord("tbl_thamdinh", "ip='".$ip."' AND created>='".$expire."'");
		
		if($rowtin>5){
			echo "<script language='javascript'>alert('Bạn không được phép yêu cầu quá 5 lần trong 1 giờ');</script>";
			
		}else{
		
			$vale1='`id`, `address_td`, `province`, `district`, `street`, `chieurongngo`, `vitrinhadat`, `mattien`, `dientich`, `dientich_ph`, `dientich_vp`, `hinhdang`, `vitri`, `giaothong`, `kinhdoanh`, `giaitoa`, `sdchung`, `moitruong`, `phongthuy`, `huong`, `tienichkhac`, `mucdichsd`, `yeutokhac`, `thoihansd`, `note_other`, `sonam`, `dientichxd`, `sotangxd`, `dientichsanxd`, `ketcaunha`, `dgiactxd`, `chatluongconctxd`, `created`, `IP`, `status`,`hoten`,`email`,`dienthoai`,`mucdich`';
			$vale2="NULL,'".$address_td."','".$province."','".$district."','".$street."','".$chieurongngo."','".$vitrinhadat."','".$mattien."','"
			.$dientich."','".$dientich_ph."','".$dientich_vp."','".$hinhdang."','".$vitri."','".$giaothong."','".$kinhdoanh."','".$giaitoa."','".$sdchung."','".$moitruong."','".$phongthuy."','".$huong."','".$tienichkhac."','".$mucdichsd."','".$yeutokhac."','".$thoihansd."','".$note_other."','".$sonam."','".$dientichxd."','".$sotangxd."','".$dientichsanxd."','".$ketcaunha."','".$dgiactxd."','".$chatluongconctxd."','".$created."','".$ip."',1".",'".$hoten."','".$email."','".$dienthoai."','".$mucdich."'";		 
			 insert_table('tbl_thamdinh',$vale1,$vale2,'');
			 
			 $noidung_AltBody="<table border='1'><thead><tr><th>Tiêu đề</th><th>Giá trị</th></tr></thead><tbody>";
			 $noidung_AltBody.="<tr>Họ tên<td>$hoten</td></tr>";
			 $noidung_AltBody.="<tr>Email<td>$email</td></tr>";
			 $noidung_AltBody.="<tr>Điện thoại<td>$dienthoai</td></tr>";
			 $noidung_AltBody.="<tr>Mục đích<td>$mucdich</td></tr>";
			 $noidung_AltBody.="<tr>Địa chỉ tài sản thẩm định<td>$address_td</td></tr>";
			 $noidung_AltBody.="<tr>Tỉnh/TP<td>$province</td></tr>";
			 $noidung_AltBody.="<tr>Quận/Huyện<td>$district</td></tr>";
			 $noidung_AltBody.="<tr>Đường/ Phố<td>$street</td></tr>";
			 $noidung_AltBody.="<tr>Vị trí <td>$_name_vitri</td></tr>";
			 $noidung_AltBody.="<tr> Chiều rộng đường( m)<td>$chieurongngo</td></tr>";		 
			 if($kcduong_select==1){
				$noidung_AltBody.="<tr>Vị trí tài sản<td>Vị trí 1</td></tr>";
			}else{
				$noidung_AltBody.="<tr>Khoảng cách từ tài sản đến ngõ có tên đường ( m)<td>$vitrinhadat</td></tr>";
			}
			$noidung_AltBody.="<tr>  Mặt tiền( m) <td>$mattien</td></tr>";		 
			$noidung_AltBody.="<tr>  Diện tích( m2) <td>$dientich</td></tr>";		 
			if($dientich_ph!=''){
				$noidung_AltBody.="<tr>  Diện tích đất phù hợp quy hoạch( m2) <td>$dientich_ph</td></tr>";		 
			}
			if($dientich_vp!=''){
				$noidung_AltBody.="<tr>  Diện tích đất vi phạm quy hoạch( m2) <td>$dientich_vp</td></tr>";		
			}
			
			$noidung_AltBody.="<tr>  Hình dạng <td>$hinhdang</td></tr>";		 
			$noidung_AltBody.="<tr>  Số mặt tiếp giáp đường <td>$vitri</td></tr>";		 
			$noidung_AltBody.="<tr>  Giao thông <td>$giaothong</td></tr>";		 
			$noidung_AltBody.="<tr>  Lợi thế kinh doanh <td>$kinhdoanh</td></tr>";	
			$noidung_AltBody.="<tr>  Có giải tỏa <td>$giaitoa</td></tr>";				
			$noidung_AltBody.="<tr>  Được sử dụng thêm phần đất chung <td>$sdchung</td></tr>";				
			$noidung_AltBody.="<tr>  Môi trường <td>$moitruong</td></tr>";				
			$noidung_AltBody.="<tr>  Phong thủy <td>$phongthuy</td></tr>";				
			$noidung_AltBody.="<tr> Hướng <td>$huong</td></tr>";				
			$noidung_AltBody.="<tr>  Các tiện ích khác <td>$tienichkhac</td></tr>";				
			$noidung_AltBody.="<tr>  Mục đích sử dụng đất <td>$mucdichsd</td></tr>";				
			$noidung_AltBody.="<tr>  Các yếu tố khác <td>$yeutokhac</td></tr>";	
			if($thoihansd!=""){	
				$noidung_AltBody.="<tr>  Thời hạn sử dụng <td>$thoihansd</td></tr>";				
			}
			if($note_other!=""){	
				$noidung_AltBody.="<tr>  Mô tả <td>$note_other</td></tr>";							
			}
			if($sonam!=""){
				$noidung_AltBody.="<tr>  Số năm sử dụng <td>$sonam</td></tr>";
			}
			if($dientichxd!=""){
				$noidung_AltBody.="<tr>  Diện tích xây dựng( m2) <td>$dientichxd</td></tr>";
			}
			if($sotangxd!=""){
				$noidung_AltBody.="<tr>  Số tầng <td>$sotangxd</td></tr>";			
			}
			if($dientichsanxd!=""){
				$noidung_AltBody.="<tr>  Diện tích sàn XD( m2) <td>$dientichsanxd</td></tr>";
			}
			if($ketcaunha!=""){
				$noidung_AltBody.="<tr>  Kết cấu nhà <td>$ketcaunha</td></tr>";
			}
			if($dgiactxd!=""){
				$noidung_AltBody.="<tr>  Đơn giá CTXD (VNĐ) <td>$dgiactxd</td></tr>";
			}
			if($chatluongconctxd!=""){
				$noidung_AltBody.="<tr>  Chất lượng còn lại (%) <td>$chatluongconctxd</td></tr>";
			}
			
			 $noidung_AltBody.="</tbody></table>";
			 
			$rowmail=getRecord("tbl_config", "id=1");
			 
			
			$ng_ten="BDSTPHCM";;
			$ng_email=$rowmail['cauhinh_mail_ten'];
			$ch_email=$rowmail['cauhinh_mail_ten'];
			$ch_pass =$rowmail['cauhinh_mail_mk'];
			
			$email=$rowmail['emailkh'];;
			
			$nn_ten="Thẩm Định";
			$nn_email=$email;
			
			$tieude="Yêu cầu thẩm định - BDSTPHCM.ORG";
			$noidung=$noidung_AltBody;			
			
			
			/*********************************/
			
			if($email!=""){						
				
				$noidung=$noidung_AltBody;					
				$kq=@guimail($ng_ten,$ng_email,$ch_email,$ch_pass,$nn_ten,$nn_email,$tieude,$noidung);
				
			}
				
			echo "<script language='javascript'>alert('Bạn vừa yêu cầu thẩm định thành công. Cảm ơn');</script>";
			echo '<script type="text/javascript"> window.location = ""; </script>';
			 
			//tien hanh gui email, luu lai du lieu
		}
	}
?>
<script>
var checkNumber =/[\d]+(\.[\d]+)?/;
var checkInt =/^\d+$/;
var urlbasic = '<?php echo $linkrootbds?>';
	$( document ).ready(function() {
		$kcs =jQuery('#kcduong_select').val();
		if($kcs ==1){
				jQuery('#result_kcduong_select').addClass('hidden');
				jQuery('#vitrinhadat').val('vt1');
				jQuery('#vitrinhadat_name').text('Vị Trí 1');
			}else if($kcs ==2){
				jQuery('#result_kcduong_select').removeClass('hidden');
				jQuery('#kcduong').val('');
				jQuery('#vitrinhadat').val('');
				jQuery('#vitrinhadat_name').text('');
			}
			
		/*-------add*/
		


			$('#dientichxd, #sotangxd').change(function(){
				$dientichxd = num($('#dientichxd').val()) ;
				$sotangxd =num($('#sotangxd').val()) ;
				if($dientichxd !='' && $sotangxd !='' && checkNumber.test($dientichxd) && checkNumber.test($sotangxd) && $dientichxd > 0 && $sotangxd > 0){
					$dientichsan = $dientichxd * $sotangxd;
					$('#dientichsanxd').val($dientichsan);
				}else{
					$('#dientichsanxd').val('0');
				}
			});

			$('#form-thamdinhnhadat').submit(function(ev){ //alert('ok');
						$kcs =jQuery('#kcduong_select').val();
						if(jQuery("#hoten").val() ==""){
							showError('Bạn chưa nhập họ tên','danger');
							jQuery("#hoten").focus();
						}
						else if(jQuery("#email").val() ==""){
							showError('Bạn chưa nhập email','danger');
							jQuery("#email").focus();
						}else if(jQuery("#dienthoai").val() ==""){
							showError('Bạn chưa nhập dienthoai','danger');
							jQuery("#dienthoai").focus();
						}else if(jQuery("#address-td").val() ==""){
							showError('Bạn chưa nhập địa chỉ thẩm định','danger'); 
							jQuery("#address-td").focus();
						}
						else if(jQuery("#district").val() ==""){
							showError('Bạn chưa chọn Quận/ Huyện','danger');
						}else if(jQuery("#street").val() ==""){
							showError('Bạn chưa nhập Đường/ Phố','danger');
						}else if(jQuery("#chieurongngo").val() ==""){
							showError('Bạn chưa nhập Chiều rộng ngõ','danger');
						}else if($kcs==2){
							if(jQuery("#kcduong").val() ==""){								
								showError('Bạn chưa nhập Khoảng cách từ tài sản đến ngõ có tên đường','danger');
							}
						}else if(jQuery("#mattien").val() ==""){
							showError('Bạn chưa nhập Mặt tiền','danger');
						}else if(jQuery("#dientich").val() ==""){
							showError('Bạn chưa nhập Diện tích','danger');
						}else if(jQuery("#hinhdang").val() ==""){
							showError('Bạn chưa chọn Hình dáng','danger');
						}else if(jQuery("#vitri").val() ==""){
							showError('Bạn chưa chọn Số mặt tiếp giáp đường','danger');
						}else if(jQuery("#giaothong").val() ==""){
							showError('Bạn chưa chọn tình trạng Giao thông','danger');
						}else if(jQuery("#kinhdoanh").val() ==""){
							showError('Bạn chưa chọn Lợi thế kinh doanh','danger');
						}else if(jQuery("#giaitoa").val() ==""){
							showError('Bạn chưa chọn mục Giải Tỏa','danger');
						}else if(jQuery("#sdchung").val() ==""){
							showError('Bạn chưa chọn mục Đất sử dụng chung','danger');
						}else if(jQuery("#moitruong").val() ==""){
							showError('Bạn chưa chọn mục Môi trường','danger');
						}else if(jQuery("#phongthuy").val() ==""){
							showError('Bạn chưa chọn mục Phong thủy','danger');
						}else if(jQuery("#huong").val() ==""){
							showError('Bạn chưa chọn mục Hướng đất','danger');
						}else if(jQuery("#tienichkhac").val() ==""){
							showError('Bạn chưa chọn mục Các tiện ích khác','danger');
						}else if(jQuery("#mucdichsd").val() ==""){
							showError('Bạn chưa chọn Mục đích sử dụng đất','danger');
						}else if(jQuery("#yeutokhac").val() ==""){
							showError('Bạn chưa chọn mục Các yếu tố khác','danger');
						}
						else{	
							$('#submit_thamdinh').prop('disabled', true);
							$('#submit_thamdinh').text('đang tiến hành...');
							setTimeout(function(){ $("#submit_thamdinh").removeAttr("disabled"); $("#submit_thamdinh").text("THẨM ĐỊNH GIÁ");}, 5000);
					
							$("#submit_thamdinh").submit();	
						}
					

					
				ev.preventDefault();
			});

			$('#kcduong_select').change(function(){
				$kcs =$(this).val();
				if($kcs ==1){
					$('#result_kcduong_select').addClass('hidden');
					$('#vitrinhadat').val('vt1');
					$('#vitrinhadat_name').text('Vị Trí 1');
				}else if($kcs ==2){
					$('#result_kcduong_select').removeClass('hidden');
					$('#kcduong').val('');
					$('#vitrinhadat').val('');
					$('#vitrinhadat_name').text('');
				}
			});

			/*----------------Check du lieu---------------------------------------*/
			/*$('#chieurongngo').change(function(){
				$crngo =$(this).val();
				if(checkNumber.exec($crngo)){
					alert('Ok');
				}else{
					alert('Error');
				}
			});*/



			function showError($error,$type){
				  alert($error);
				  return false;
			}

			function formatMoney(n,dv='') {
				return n.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")+' '+dv;
			}

			function num(n){ //convert number_fomat to number
			  $n = '';
			  if(n.length != 0){
				$n = n.replace(/\./g,'');
				$n = $n.replace(',','.');
				return parseFloat($n);
			  }else{
				return 0;
			  }

				
			}
	});
	

</script>
 <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>module/bootstrap.min.css">
 <style>
#form-thamdinhnhadat input[type="checkbox"] {
    margin-top: 2px;
}
 .form-control, .form-group .alert, .form-group label {
    font-size: 12px;
}
.btn.btn-default:hover, .btn.btn-primary:hover {
    background-color: #fff!important;
    color: #47b475;
}
.btn {
    white-space: nowrap;
    border-color: rgba(255, 255, 255, .25);
    outline: 0;
    box-shadow: none;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    cursor: pointer;
    border-radius: 0;
    font-style: normal;
    color: #fff;
    margin: 0;
    padding: 15px 50px;
    font-weight: 300;
    min-height: 0;
    min-width: 0;
    max-height: none;
    max-width: none;
}
.btn, .footer ul li a, .st-btn {
    text-transform: uppercase;
}
.save-data-td {
    color: red;
    font-style: italic;
    margin-left: 10px;
}
 </style>
 <div class="container">
	<form id="form-thamdinhnhadat" method="POST" class="form-horizontal">
		<h2 style="text-transform: uppercase;text-align:center">Yêu cầu thẩm định</h2>
		<div class="col-md-12 ">
						   <div class="">
									<div class="col-lg-12">
											<div class="form-group">
												<label class=" col-lg-4" for="inputSuccess"> Họ và tên <span title="Không được để trống" class="note-qtrong"> *</span></label>
												 <div class="col-lg-8">
												   <div class="row">
													 <input id="hoten" name="hoten" class="form-control" type="text" maxlength="200" placeholder=" Họ và tên" value="">
												   </div>
												 </div>
											</div>
											<div class="form-group">
												<label class=" col-lg-4" for="inputSuccess">Email <span title="Không được để trống" class="note-qtrong"> *</span></label>
												 <div class="col-lg-8">
												   <div class="row">
													 <input id="email" name="email" class="form-control" type="text" maxlength="200" placeholder="Email" value="">
												   </div>
												 </div>
											</div>
											<div class="form-group">
												<label class=" col-lg-4" for="inputSuccess">Điện thoại <span title="Không được để trống" class="note-qtrong"> *</span></label>
												 <div class="col-lg-8">
												   <div class="row">
													 <input id="dienthoai" name="dienthoai" class="form-control" type="text" maxlength="200" placeholder="Điện thoại" value="">
												   </div>
												 </div>
											</div>
											<div class="form-group">
												<label class=" col-lg-4" for="inputSuccess">Mục đích thẩm định <span title="Không được để trống" class="note-qtrong"> *</span></label>
												 <div class="col-lg-8">
												   <div class="row">
													<label class="checkbox-inline"><input type="checkbox" name="mucdich[]" value="Để vay vốn">Để vay vốn</label>
													<label class="checkbox-inline"><input type="checkbox" name="mucdich[]" value="Để mua bán">Để mua bán</label>
													<label class="checkbox-inline"><input type="checkbox" name="mucdich[]" value="Để làm việc khác">Để làm việc khác</label>													 
												   </div>
												 </div>
											</div>
											<div class="form-group">
												<label class=" col-lg-4" for="inputSuccess"> Địa chỉ tài sản thẩm định <span title="Không được để trống" class="note-qtrong"> *</span></label>
												 <div class="col-lg-8">
												   <div class="row">
													 <input id="address-td" name="address-td" class="form-control" type="text" maxlength="200" placeholder="..." value="">
												   </div>
												 </div>
											</div>
											<div class="form-group">
												<label class="col-lg-4">Thành phố/ Tỉnh <span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="province" name="province" class="form-control">
															<option value="Hồ Chí Minh">Thành phố Hồ Chí Minh</option></select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4">Quận/ Huyện<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="district" name="district" class="form-control"><option value="">---Lựa chọn---</option><option value="Quận 1">Quận 1</option><option value="Quận 2">Quận 2</option><option value="Quận 3">Quận 3</option><option value="Quận 4">Quận 4</option><option value="Quận 5">Quận 5</option><option value="Quận 6">Quận 6</option><option value="Quận 7">Quận 7</option><option value="Quận 8">Quận </option><option value="Quận 9">Quận 9</option><option value="Quận 10">Quận 10</option><option value="Quận 11">Quận 11</option><option value="Quận 12">Quận 12</option><option value="Bình Chánh">Bình Chánh</option><option value="Bình Tân">Bình Tân</option><option value="Bình Thạnh">Bình Thạnh</option><option value="Cần Giờ">Cần Giờ</option><option value="Huyện Củ Chi">Huyện Củ Chi</option><option value="Huyện Hóc Môn">Huyện Hóc Môn</option><option value="Nhà Bè">Nhà Bè</option><option value="Phú Nhuận">Phú Nhuận</option><option selected value="Quận Gò Vấp">Quận Gò Vấp</option><option value="Tân Bình">Tân Bình</option><option value="Tân Phú">Tân Phú</option><option value="Thủ Đức">Thủ Đức</option></select>
													</div>
												</div>
											</div>
										</div>
										<br>

										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4">Đường/ Phố<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
													 <input id="street" name="street" class="form-control" type="text" placeholder="(vd: Lê Hồng Phong)" value="">
												   
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-md-12" id="note_street"></div>
											<div class="clearfix"></div>
										<div class="col-lg-12">
														<div class="form-group">
														<label class=" col-lg-4" for="inputSuccess">1. Vị trí<span title="Không được để trống" class="note-qtrong"> *</span></label>
														<div class="col-lg-8">
														   <div class="row">
															   <select id="kcduong_select" name="kcduong_select" class="form-control">
																  <option value="1">Mặt đường</option>
																  <option value="2">Trong ngõ</option>
															  </select><br>

														   </div>
														  
														</div>
													</div>
												</div>
										<div class="col-lg-12 hidden" id="result_kcduong_select">
											<div class="form-group">
												<label class=" col-lg-4" for="inputSuccess"> Khoảng cách từ tài sản đến ngõ có tên đường ( m)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												 <div class="col-lg-8">
												   <div class="row">
													 <input id="kcduong" name="kcduong" class="form-control" type="number" placeholder="(vd: 10)" value="">
												   </div>
												 </div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">2. Chiều rộng đường( m)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<input id="chieurongngo" name="chieurongngo" class="form-control" placeholder="(vd: 10)" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">3. Vị trí tài sản</label>
												<div class="col-lg-8">
													<div class="row">
														<p id="vitrinhadat_name" style="color:red;font-weight:bold;"></p>
														<input id="vitrinhadat" name="vitrinhadat" value="" type="hidden">
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">4. Mặt tiền( m)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<input id="mattien" name="mattien" class="form-control" placeholder="(vd: 8)" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">5. Diện tích( m2)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<input id="dientich" name="dientich" class="form-control" placeholder="(vd: 1.000,00)" value="" type="number">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">5.1 Diện tích đất phù hợp quy hoạch( m2)</label>
												<div class="col-lg-8">
													<div class="row">
														<input id="dientich-ph" name="dientich-ph" class="form-control" placeholder="(vd: 1.000,00)" value="" type="number">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">5.2 Diện tích đất vi phạm quy hoạch( m2)</label>
												<div class="col-lg-8">
													<div class="row">
														<input id="dientich-vp" name="dientich-vp" class="form-control" placeholder="(vd: 1.000,00)" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">6. Hình dạng<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="hinhdang" name="hinhdang" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="chữ L">chữ L</option><option value="chữ T">chữ T</option><option value="Cân đối">Cân đối</option><option value="Không cân đối">Không cân đối</option><option value="Nở hậu">Nở hậu</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">7. Số mặt tiếp giáp đường<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="vitri" name="vitri" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="2 mặt đườn">2 mặt đường</option><option value="3 mặt đường">3 mặt đường</option><option value="4 mặt đường">4 mặt đường</option><option value="1 mặt đường">1 mặt đường</option><option value="Trong ngõ">Trong ngõ</option>                                                            
														</select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">8. Giao thông<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="giaothong" name="giaothong" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Không thuận tiện">Không thuận tiện</option><option value="Thuận tiện">Thuận tiện</option><option value="Rất thuận tiện">Rất thuận tiện</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">9. Lợi thế kinh doanh<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="kinhdoanh" name="kinhdoanh" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Không lợi thế">Không lợi thế</option><option value="Lợi thế">Lợi thế</option><option value="Sầm uất">Sầm uất</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">10. Có giải tỏa<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="giaitoa" name="giaitoa" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Có">Có</option><option value="Không">Không</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">11. Được sử dụng thêm phần đất chung<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="sdchung" name="sdchung" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Có">Có</option><option value="Không">Không</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">12. Môi trường<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="moitruong" name="moitruong" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Đẹp, đáng sống">Đẹp, đáng sống</option><option value="Ô nhiễm">Ô nhiễm</option><option value="Bình thường">Bình thường</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">13. Phong thủy<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="phongthuy" name="phongthuy" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Gần chùa, đền, di tích">Gần chùa, đền, di tích</option><option value="Không gần">Không gần</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">14. Hướng<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="huong" name="huong" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Bắc">Bắc</option><option value="Đông Bắc">Đông Bắc</option><option value="Tây Bắc">Tây Bắc</option><option value="nam">Nam</option><option value="Tây Na">Tây Nam</option><option value="Đông Nam">Đông Nam</option><option value="Tây">Tây</option>                                                         
																	</select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">15. Các tiện ích khác(Gần trường, chợ, TTTM, bệnh viện, khu dân cư ...)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="tienichkhac" name="tienichkhac" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Các tiện ích thuận tiện">Các tiện ích thuận tiện</option><option value="Không gần các tiện ích">Không gần các tiện ích</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">16. Mục đích sử dụng đất<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="mucdichsd" name="mucdichsd" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Đất ở">Đất ở</option><option value="Đất kinh doanh">Đất kinh doanh</option><option value="Danh mục khác">Danh mục khác</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">17. Các yếu tố khác(Ngõ đâm vào nhà, cột điện trước nhà,...)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-8">
													<div class="row">
														<select id="yeutokhac" name="yeutokhac" class="form-control">
																	<option value="">---Lựa chọn---</option><option value="Không bị ảnh hưởng">Không bị ảnh hưởng</option><option value="Có ảnh hưởng">Có ảnh hưởng</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">18. Thời hạn sử dụng</label>
												<div class="col-lg-8">
													<div class="row">
														<input maxlength="50" name="thoihansd" class="form-control input-sm m-bot15" placeholder="(vd: Lâu dài)" value="" type="text">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">19. Mô tả/Ghi chú các thông tin lưu ý khác</label>
												<div class="col-lg-8">
													<div class="row">
														<textarea maxlength="1000" name="note-other" class="form-control input-sm m-bot15" rows="3" placeholder="..."></textarea>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<br>
										<h3 class="m-bot15">Công trình xây dựng trên đất</h3>
										<hr>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Số năm sử dụng</label>
												<div class="col-lg-6">
													<div class="row">
														<input min="0" max="999" name="sonam" class="form-control input-sm m-bot15" placeholder="(vd: 5)" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Diện tích xây dựng( m2)</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="dientichxd" name="dientichxd" class="form-control input-sm m-bot15" placeholder="(vd: 1.000,00)" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Số tầng</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="sotangxd" name="sotangxd" class="form-control input-sm m-bot15" placeholder="(vd: 6)" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Diện tích sàn XD( m2)</label>
												<div class="col-lg-6">
													<div class="row">
														<input readonly="" id="dientichsanxd" name="dientichsanxd" class="form-control input-sm m-bot15" placeholder="..." value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-3" for="inputSuccess">Kết cấu nhà</label>
												<div class="col-lg-9">
													<div class="row">
														<select id="ketcaunha" name="ketcaunha" class="form-control input-sm m-bot15">
																	<option value="">---Lựa chọn---</option><option value="Nhà 01 tầng có  tường 110, bổ trụ, có khu phụ, mái ngói hoặc tôn">Nhà 01 tầng có  tường 110, bổ trụ, có khu phụ, mái ngói hoặc tôn</option><option value="Nhà 01 tầng có khu phụ, tường 110, bổ trụ, không có khu phụ, mái ngói hoặc tôn, nền lát gạch ceramic">Nhà 01 tầng có khu phụ, tường 110, bổ trụ, không có khu phụ, mái ngói hoặc tôn, nền lát gạch ceramic</option><option value="Nhà 01 tầng, tường 220, bổ trụ có khu phụ, mái ngói hoặc tôn, nền lát gạch ceramic">Nhà 01 tầng, tường 220, bổ trụ có khu phụ, mái ngói hoặc tôn, nền lát gạch ceramic</option><option value="Nhà 01 tầng, tường 220, bổ trụ không có khu phụ">Nhà 01 tầng, tường 220, bổ trụ không có khu phụ</option><option value="Nhà 02 đến 03 tầng, tường xây gạch, mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn hoặc mái ngói.">Nhà 02 đến 03 tầng, tường xây gạch, mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn hoặc mái ngói.</option><option value="Nhà 04 đến 05 tầng mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn">Nhà 04 đến 05 tầng mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn</option><option value="Nhà 04 đến 05 tầng mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn; móng gia cố bằng cọc BTCT.">Nhà 04 đến 05 tầng mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn; móng gia cố bằng cọc BTCT.</option><option value="Nhà 06 đến 08 tầng mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn; móng gia cố bằng cọc BTCT.">Nhà 06 đến 08 tầng mái bằng BTCT hoặc mái bằng BTCT trên lợp tôn; móng gia cố bằng cọc BTCT.</option><option value="Nhà kiểu biệt thự cao 2-3 tầng">Nhà kiểu biệt thự cao 2-3 tầng </option><option value="Đất Trống">Đất Trống </option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<br>

										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Đơn giá CTXD (VNĐ)</label>
												<div class="col-lg-6">
													<div class="row">
														<input style="color:#fb0000;" id="dongiactxd" name="dgiactxd" class="form-control input-sm m-bot15" placeholder="đơn vị VNĐ" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Chất lượng còn lại (%)</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="chatluongconctxd" name="chatluongconctxd" class="form-control input-sm m-bot15" placeholder="(vd: 90)" value="" type="number">
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="row">
												<button type="submit" style="background-color:#23527c; font-size:24px; COLOR:red" id="submit_thamdinh" class="btn btn-sm btn-block btn-default btn_dn2"><b>GỬI YÊU CẦU THẨM ĐỊNH</b></button>
											</div>
										</div>
							</div>
				</div>

	</form>
</div>