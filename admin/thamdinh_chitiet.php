<?php 
if(!$_SESSION['kt_login_level']==4){
	echo '<script type="text/javascript"> window.location = "/"; </script>';
}
if($_GET['id']!=''){
	$rowthamdinh=getRecord("tbl_thamdinh", "id=".$_GET['id']);
	if(!$rowthamdinh){
		echo '<script type="text/javascript"> window.location = "'.$linkroot.'/admin/admin.php?act=thamdinh"; </script>';
	}
}else{
	echo '<script type="text/javascript"> window.location = "'.$linkroot.'/admin/admin.php?act=thamdinh"; </script>';
}


?>
 <link rel="stylesheet" type="text/css" href="<?php echo $linkrootbds?>module/bootstrap.min.css">
 <style>
 .form-control, .form-group .alert, .form-group label {
    font-size: 12px;
}
.btn.btn-default:hover, .btn.btn-primary:hover {
    background-color: #fff;
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
 <script>
	$( document ).ready(function() {
		$('#province option[value="<?php echo $rowthamdinh['province'];?>"]').attr('selected','selected');
		$('#district option[value="<?php echo $rowthamdinh['district'];?>"]').attr('selected','selected');
		$('#kcduong_select option[value=<?php echo $rowthamdinh['vitrinhadat']=="Vị trí 1"?1:0;?>]').attr('selected','selected');
		$('#hinhdang option[value="<?php echo $rowthamdinh['hinhdang'];?>"]').attr('selected','selected');
		$('#vitri option[value="<?php echo $rowthamdinh['vitri'];?>"]').attr('selected','selected');
		$('#giaothong option[value="<?php echo $rowthamdinh['giaothong'];?>"]').attr('selected','selected');
		$('#kinhdoanh option[value="<?php echo $rowthamdinh['kinhdoanh'];?>"]').attr('selected','selected');
		$('#giaitoa option[value="<?php echo $rowthamdinh['giaitoa'];?>"]').attr('selected','selected');
		$('#sdchung option[value="<?php echo $rowthamdinh['sdchung'];?>"]').attr('selected','selected');
		$('#moitruong option[value="<?php echo $rowthamdinh['moitruong'];?>"]').attr('selected','selected');
		$('#phongthuy option[value="<?php echo $rowthamdinh['phongthuy'];?>"]').attr('selected','selected');
		$('#huong option[value="<?php echo $rowthamdinh['huong'];?>"]').attr('selected','selected');
		$('#mucdichsd option[value="<?php echo $rowthamdinh['mucdichsd'];?>"]').attr('selected','selected');
		$('#yeutokhac option[value="<?php echo $rowthamdinh['yeutokhac'];?>"]').attr('selected','selected');
		$('#ketcaunha option[value="<?php echo $rowthamdinh['ketcaunha'];?>"]').attr('selected','selected');
		$('#tienichkhac option[value="<?php echo $rowthamdinh['tienichkhac'];?>"]').attr('selected','selected');
		
	})
 </script>
 <div class="container">
	<form id="form-thamdinhnhadat" method="POST" class="form-horizontal">
		<h2 style="text-transform: uppercase;text-align:center">Thông tin thẩm định chi tiết</h2>
		<div class="col-md-10 ">
						   <div class="">
									<div class="col-lg-12">
											<div class="form-group">
												<label class=" col-lg-4" for="inputSuccess"> Địa chỉ tài sản thẩm định</label>
												 <div class="col-lg-6">
												   <div class="row">
													 <input id="address-td" name="address-td" class="form-control" type="text" maxlength="200" placeholder="..." value="<?php echo $rowthamdinh['address_td'];?>">
												   </div>
												 </div>
											</div>
											<div class="form-group">
												<label class="col-lg-4">Thành phố/ Tỉnh <span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-6">
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
												<div class="col-lg-6">
													<div class="row">
														<select id="district" name="district" class="form-control"><option value="">---Lựa chọn---</option><option value="Quận 1">Quận 1</option><option value="Quận 2">Quận 2</option><option value="Quận 3">Quận 3</option><option value="Quận 4">Quận 4</option><option value="Quận 5">Quận 5</option><option value="Quận 6">Quận 6</option><option value="Quận 7">Quận 7</option><option value="Quận 8">Quận </option><option value="Quận 9">Quận 9</option><option value="Quận 10">Quận 10</option><option value="Quận 11">Quận 11</option><option value="Quận 12">Quận 12</option><option value="Bình Chánh">Bình Chánh</option><option value="Bình Tân">Bình Tân</option><option value="Bình Thạnh">Bình Thạnh</option><option value="Cần Giờ">Cần Giờ</option><option value="Huyện Củ Chi">Huyện Củ Chi</option><option value="Huyện Hóc Môn">Huyện Hóc Môn</option><option value="Nhà Bè">Nhà Bè</option><option value="Phú Nhuận">Phú Nhuận</option><option value="Quận Gò Vấp">Quận Gò Vấp</option><option value="Tân Bình">Tân Bình</option><option value="Tân Phú">Tân Phú</option><option value="Thủ Đức">Thủ Đức</option></select>
													</div>
												</div>
											</div>
										</div>
										<br>

										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4">Đường/ Phố<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-6">
													<div class="row">
													 <input id="street" name="street" class="form-control" type="text" placeholder="(vd: Lê Hồng Phong)" value="<?php echo $rowthamdinh['street'];?>">
												   
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
														<div class="col-lg-6">
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
												 <div class="col-lg-6">
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
												<div class="col-lg-6">
													<div class="row">
														<input id="chieurongngo" name="chieurongngo" class="form-control" placeholder="(vd: 10)" value="<?php echo $rowthamdinh['chieurongngo'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess"><?php echo $rowthamdinh['vitrinhadat']!="Vị trí 1"?"3. Khoảng cách từ tài sản đến ngõ có tên đường ( m)":"3. Vị trí tài sản";?></label>
												<div class="col-lg-6">
													<div class="row">
														<p id="vitrinhadat_name" style="color:red;font-weight:bold;"><?php echo $rowthamdinh['vitrinhadat'];?></p>
														<input id="vitrinhadat" name="vitrinhadat" value="" type="hidden">
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">4. Mặt tiền( m)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-6">
													<div class="row">
														<input id="mattien" name="mattien" class="form-control" placeholder="(vd: 8)" value="<?php echo $rowthamdinh['mattien'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">5. Diện tích( m2)<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-6">
													<div class="row">
														<input id="dientich" name="dientich" class="form-control" placeholder="(vd: 1.000,00)" value="<?php echo $rowthamdinh['dientich'];?>" type="number">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">5.1 Diện tích đất phù hợp quy hoạch( m2)</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="dientich-ph" name="dientich-ph" class="form-control" placeholder="(vd: 1.000,00)" value="<?php echo $rowthamdinh['dientich_ph'];?>" type="number">
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">5.2 Diện tích đất vi phạm quy hoạch( m2)</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="dientich-vp" name="dientich-vp" class="form-control" placeholder="(vd: 1.000,00)" value="<?php echo $rowthamdinh['dientich_vp'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<br>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">6. Hình dạng<span title="Không được để trống" class="note-qtrong"> *</span></label>
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
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
												<div class="col-lg-6">
													<div class="row">
														<select id="yeutokhac" name="yeutokhac" class="form-control">
																	<option value="Không bị ảnh hưởng">Không bị ảnh hưởng</option><option value="Có ảnh hưởng">Có ảnh hưởng</option>                                                            </select>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">18. Thời hạn sử dụng</label>
												<div class="col-lg-6">
													<div class="row">
														<input maxlength="50" name="thoihansd" class="form-control input-sm m-bot15" placeholder="(vd: Lâu dài)" value="<?php echo $rowthamdinh['thoihansd'];?>" type="text">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-4" for="inputSuccess">19. Mô tả/Ghi chú các thông tin lưu ý khác</label>
												<div class="col-lg-6">
													<div class="row">
														<textarea maxlength="1000" name="note-other" class="form-control input-sm m-bot15" rows="3" placeholder="..."><?php echo $rowthamdinh['note_other'];?></textarea>
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
														<input min="0" max="999" name="sonam" class="form-control input-sm m-bot15" placeholder="(vd: 5)" value="<?php echo $rowthamdinh['sonam'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Diện tích xây dựng( m2)</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="dientichxd" name="dientichxd" class="form-control input-sm m-bot15" placeholder="(vd: 1.000,00)" value="<?php echo $rowthamdinh['dientichxd'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Số tầng</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="sotangxd" name="sotangxd" class="form-control input-sm m-bot15" placeholder="(vd: 6)" value="<?php echo $rowthamdinh['sotangxd'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Diện tích sàn XD( m2)</label>
												<div class="col-lg-6">
													<div class="row">
														<input readonly="" id="dientichsanxd" name="dientichsanxd" class="form-control input-sm m-bot15" placeholder="..." value="<?php echo $rowthamdinh['dientichsanxd'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="form-group">
												<label class="col-lg-3" for="inputSuccess">Kết cấu nhà</label>
												<div class="col-lg-12">
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
														<input style="color:#fb0000;" id="dongiactxd" name="dgiactxd" class="form-control input-sm m-bot15" placeholder="đơn vị VNĐ" value="<?php echo $rowthamdinh['dongiactxd'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label class="  col-lg-6" for="inputSuccess">Chất lượng còn lại (%)</label>
												<div class="col-lg-6">
													<div class="row">
														<input id="chatluongconctxd" name="chatluongconctxd" class="form-control input-sm m-bot15" placeholder="(vd: 90)" value="<?php echo $rowthamdinh['chatluongconctxd'];?>" type="number">
													</div>
												</div>
											</div>
										</div>
							</div>
				</div>

	</form>
</div>