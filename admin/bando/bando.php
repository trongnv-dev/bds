<?php
if(isset($frame)==true){
	if($_SESSION['kt_login_level']!=4 && $_SESSION['kt_login_level']!=-1){
		$row_tbl_users=getRecord('tbl_users',"id = '".$_SESSION['kt_login_id']."'");
		if(userPermissEdit($row_tbl_users['listEdit'],21,1)!=true) header("location: admin.php");
	}
 

	
}else{
	header("location:admin.php");
}


if (isset($_POST['tim'])==true)//isset kiem tra submit
{  
	if($_POST['tukhoa']!=""){$tukhoa=$_POST['tukhoa'];}else {$tukhoa="";}
	if($tukhoa=="Từ khóa...") $tukhoa="";
	$_SESSION['kt_tukhoa_bignew']=$tukhoa;
	$tukhoa = trim(strip_tags($tukhoa));
	if (get_magic_quotes_gpc()==false) 
	{
		$tukhoa = mysql_real_escape_string($tukhoa);
	}
	
	if($_POST['user']!=NULL){$user=$_POST['user'];}else {$user=-1;}
	$_SESSION['kt_user_data']=$user;
	
	if($_POST['datebegin']!=NULL){$datebegin=$_POST['datebegin'];}else {$datebegin="";}
	$_SESSION['kt_datebegin']=$datebegin;
	
 	if($_POST['dateend']!=NULL){$dateend=$_POST['dateend'];}else {$dateend="";}
	$_SESSION['kt_dateend']=$dateend;
	
		
}

if (isset($_POST['reset'])==true) {

	$_SESSION['kt_tukhoa_bignew']="";
	$_SESSION['kt_user_data']=-1;
	$_SESSION['kt_datebegin']=""; 
	$_SESSION['kt_dateend']="";
	
}
 
if($_SESSION['kt_user_data']==NULL){$user=-1;}
if($_SESSION['kt_user_data']!=NULL){$user=$_SESSION['kt_user_data'];}

if($tang==0){$ks='ASC';}//0 tang
elseif($tang==1){$ks='DESC';}//1 giam
else $ks='DESC';
 

 if(userPermissEdit($row_jbs_service['listEdit'],19,4)==true ||  $_SESSION['kt_login_level']==4  ||   $_SESSION['kt_login_level']==-1  ){
							switch ($_GET['action']){ // luu y lai viec xoa user: hinh anh, cac du lieu ve shop
								case 'del' :
									$id = $_GET['id'];
									$r = getRecord("tbl_thamdinh","id=".$id);
									 
									@$result = mysql_query("delete from tbl_thamdinh where id='".$id."'",$conn);
									if ($result){
										$errMsg = "Đã xóa thành công.";
									}else $errMsg = "Không thể xóa dữ liệu !";
									break;
								case 'active' :
									$id = $_GET['id'];									
									@$result = mysql_query("update tbl_thamdinh SET status=1 where id='".$id."'",$conn);
									break;
								case 'deactive' :
									$id = $_GET['id'];									
									@$result = mysql_query("update tbl_thamdinh SET status=0 where id='".$id."'",$conn);	
								break;
							}
 }
?>

  
<script>
$(document).ready(function() {
	$("#ddCat").change(function(){ 
		var id=$(this).val();//val(1) gan vao gia tri 1 dung trong form
		var table="tbl_rv_category";
		$("#ddCatch").load("getChild.php?table="+ table + "&id=" +id); //alert(idthanhpho)
	});
});
</script>

	<script src="../lib/autocomplete/jquery.select-to-autocomplete.js"></script>
	<script>
	 $(document).ready(function() {
	 
	      $('#user').selectToAutocomplete();
	    
	    
	  });
	</script>
	<style>
 
    .ui-autocomplete {
      padding: 0;
      list-style: none;
      background-color: #fff;
      width: 218px;
      border: 1px solid #B0BECA;
      max-height: 350px;
      overflow-x: hidden;
    }
    .ui-autocomplete .ui-menu-item {
      border-top: 1px solid #B0BECA;
      display: block;
      padding: 4px 6px;
      color: #353D44;
      cursor: pointer;
    }
    .ui-autocomplete .ui-menu-item:first-child {
      border-top: none;
    }
    .ui-autocomplete .ui-menu-item.ui-state-focus {
      background-color: #D5E5F4;
      color: #161A1C;
    }
	</style>
<?php
	if( $errMsg !=""){ 
?>
<div class="alert alert-block no-radius fade in">
    <button type="button" class="close" data-dismiss="alert"><span class="mini-icon cross_c"></span></button>
    <h4>Warning!</h4>
     <? $errMsg =''?>
</div>
<?php }?>
<div class="row-fluid">
    <div class="span12">
        <div class="box-widget">
             
            <div class="widget-container">
                <div class="widget-block">

					<?

                    $pageSize = 50;
                    $pageNum = 1;
                    $totalRows = 0;
  
                    if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];
    
                    if ($pageNum<=0) $pageNum=1;
    
                    $startRow = ($pageNum-1) * $pageSize; 
    				if($datebegin!="") $datebegin=date("Y/m/d",strtotime($datebegin));
					if($dateend!="") $dateend=date("Y/m/d",strtotime($dateend));;
					
					$datebeginold=$datebegin;
					$dateendold=$dateend;
					$strDate='';
                	if($datebegin!="" && $dateend=="") {
						 $strDate=" and ( created >=  '$datebegin')";
					}
					
					if($datebegin=="" && $dateend!="") {
						 $strDate=" and ( created <=  '$dateend')";
					}
					
					if($datebegin!="" && $dateend!="") {
						 $strDate=" and ( created >= '$datebegin' and created <= '$dateend')";
					}
					$where="1=1 $strDate";
					if($tukhoa!=''){
						$where.=" AND (id='{$tukhoa}' OR address_td LIKE '%$tukhoa%' or street LIKE '%$tukhoa%' OR district LIKE '%$tukhoa%')";
					}
				
    
                    //echo $where;
    
                    $MAXPAGE=1;
    
                    $totalRows=countRecord("tbl_thamdinh",$where);
    
                    ?>
    
                    <form method="POST" action="admin.php?act=thamdinh" name="frmForm" enctype="multipart/form-data">
    
                    <input type="hidden" name="page" value="<?=$page?>">
    
                    <input type="hidden" name="act" value="thamdinh">
    
    
    
    					 
                         <table width="100%"  class="admin_table">

                            <thead>
    
                                <tr align="center" >
                                  <td valign="middle"  colspan="12">
                                    <center>
                                        <div class="table_chu_tieude"><strong>Thống kê Yêu cầu thẩm định</strong></div>
                                    </center>
                                   </td>
                                </tr>
                                <tr align="center" >
                                  <td valign="middle" style="background-color:#F0F0F0; height:40px; padding-left:20px" colspan="12">   
                                  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
									
                                    <input name="tukhoa" id="tukhoa" type="text" class="table_khungnho"  style="width:250px;" value="<? echo $tukhoa?>" placeholder="Tìm kiếm "/>
                                     
                                    <input name="tim" type="submit" class="nut_table" id="tim" value="Tìm kiếm"/>
                                    <input type="submit" name="reset" class="nut_table" value="Reset" title=" Reset " />
                                 
                                  
                                  </td>
                                </tr>
                               <tr>
                                  <td align="center" class="PageNum" colspan="12" height="30" >
                                    	<?php echo pagesListLimit($totalRows,$pageSize);?>   
                                  </td>
                                </tr>
                                <tr class="admin_tieude_table">
    
    
                                    <td width="25" align="center">
    
                                        STT
    
                                    </td>
    
                                    <td width="20" align="center"><span class="title"><a class="title" >ID</a></span></td>    
                                    <td align="center"><a class="title" href="#">Địa chỉ </a></td>
                                    <td width="73" align="center"><a class="title" href="#">Tỉnh/TP</a></td>
                                    <td width="92" align="center"><a class="title" href="#">Quận/Huyện </a></td>
                                    <td width="92" align="center"><a class="title" href="#">Đường/ Phố</a></td>
									<td width="92" align="center"><a class="title" href="#">Vị trí</a></td>
									<td align="center"><a class="title" href="#">Mặt tiền</a></td>
									<td align="center"><a class="title" href="#">Diện tích</a></td>
									<td align="center"><a class="title" href="#">Hình dạng</a></td>
									<td width="92" align="center"><a class="title" href="#">Xóa / Status</a></td>
									<td width="92" align="center"><a class="title" href="#">Info</a></td>
									    
                                </tr>
    
                            </thead>
    
                            <tbody>
    
                            <?
    
                            $sortby="order by id $ks";
    
                            if ($_REQUEST['sortby']!='') $sortby="order by ".(int)$_REQUEST['sortby'];
    
                            $direction=($_REQUEST['direction']==''||$_REQUEST['direction']=='0'?"desc":"");
    
                            
    
                          $sql="select * FROM tbl_thamdinh where  $where $sortby  limit ".($startRow).",".$pageSize;
    
                            $result=mysql_query($sql,$conn);
    
                            $i=0;
    
                            while($row=mysql_fetch_array($result)){
        
                            $color = $i++%2 ? "#d5d5d5" : "#e5e5e5";
    
                            ?>
    
                                <tr>
									<td align="center">
    
                                        <?=$i?>
    
                                    </td>
    
                                    <td align="center">
    
                                        <?=$row['id']?>
    
                                    </td>
    
                                    <td align="center">
    
                                        <?=$row['address_td']?>
    
                                    </td>
    
                                    <td align="center">
    
                                        <?=$row['province']?>
    
                                    </td>
									<td align="center">
    
                                        <?=$row['district']?>
    
                                    </td>
									<td align="center">
    
                                        <?=$row['street']?>
    
                                    </td>
									<td align="center">
    
                                        <?=$row['vitrinhadat']?>
    
                                    </td>
									<td align="center"><a class="title" href="#"><?=$row['mattien']?></a></td>
									<td align="center"><a class="title" href="#"><?=$row['dientich']?></a></td>
									<td align="center"><a class="title" href="#"><?=$row['hinhdang']?></a></td>
                                    <td align="center">
									<a title="Xóa" href="admin.php?act=thamdinh&amp;action=del&amp;page=&amp;id=<?=$row['id']?>" onclick="return confirm('Bạn có muốn xoá luôn không ?');"><img src="images/icon4.png" width="20" border="0"></a>  
									<?php if($row['status']==1){?>
										<a title="Tin mới chưa đọc" href="admin.php?act=thamdinh&amp;action=deactive&amp;page=&amp;id=<?=$row['id']?>" ><img src="images/cert_1.png" width="20" border="0"></a>
									<?php }else{
										?>
										<a title="Tin mới đã đọc" href="admin.php?act=thamdinh&amp;action=active&amp;page=&amp;id=<?=$row['id']?>" ><img src="images/cert_0.png" width="20" border="0"></a>
										<?php
									}?>
									</td>
                                    <td align="center">    
                                        <?=$row['created']?> <br />
                                        <?=$row['IP']?><br/>
							<a title="Xóa" href="admin.php?act=chitietthamdinh&amp;id=<?=$row['id']?>">Chi tiết</a>
                                    </td>                                        
    
                                </tr>
    
                             <?php }?>  
                                <tr>
                                    <td  class="PageNext" colspan="12" align="center" valign="middle">
                                        <div style="padding:5px;">
                                        <?php echo pagesLinks($totalRows,$pageSize);// Trang đầu,  Trang kế, tang trước, trang cuối ??>
                                        </div>
                                    </td>  							  
                                </tr>
                               
    
                            </tbody>
    
                            
    
                        </table>
                    </form>
                
             
                </div>
            </div>
        </div>
    </div>
</div>