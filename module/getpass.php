<?php 

		//error_reporting(E_ALL);
		//ini_set('display_errors', 1);
		$randomkey = $_GET['randomkey'];			
		$randomkey = trim(strip_tags($randomkey));
		if($randomkey!=''){
			if (check_table('tbl_pass_randomkey','randomkey='."'".$randomkey."'",'email')==true) {				
				$tblramdom=getRecord('tbl_pass_randomkey',"randomkey='".$randomkey."'");
				if($tblramdom){
					$matkhaumoi=chuoingaunhien(10);
					$md5_matkhaumoi=md5(md5(md5($matkhaumoi)));
					$query_update="update tbl_users set password='".$md5_matkhaumoi."' where email='".$tblramdom['email']."'";
					mysql_query($query_update);		
					$xoa = mysql_query("delete from tbl_pass_randomkey where email='".$tblramdom['email']."'");	
					
					echo "<h3>Mật khẩu mới của quý khách là: <b>$matkhaumoi</b></h3>";
					echo "<h3>Vui lòng thay đổi mật khẩu cho lần đăng nhập đầu tiên</h3><br/>";
					echo "<h3><a href='/dang-nhap.html'>Đăng Nhập</a></h3>";
				}else{
					header("location: /");
				} 
			}
			else{
					header("location: /");
				}
		}else{
			header("location: /");
		}

?>
